<?php

namespace Manager;

class JoueurManager extends \W\Manager\Manager {
	/**
	 * Jointure multiple qui récupère les éléments des joueurs inscrit à un événement donné
	 * @param   $id => id de l'événement
	 * @return array Les données sous forme de tableau multidimensionnel
	 */
	public function infosJoueurs($id) {

		$sql = "SELECT u.nom, u.prenom, u.niveau, u.sexe, s.statut, j.user_id FROM joueurs j 
			INNER JOIN wusers w ON j.user_id = w.id 
			INNER JOIN utilisateurs u ON w.id = u.user_id 
			INNER JOIN statuts s ON s.id = j.statut_id 
			WHERE j.event_id= $id
			LIMIT 0,10";

		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();

	}

	/**
	 * Teste si un utilisateur est déja présent dans la table joueur (et donc inscrit à un événément)
	 * @param int $userId est l'id de l'utilisateur à tester
	 * @param int $eventId est l'id de l'événement sur lequelle est l'utilisateur dans son navigateur
	 * @return boolean true si présent en base de données, false sinon
	 */
	public function joueurExist($userId, $eventId)
	{

	    $sql = "SELECT user_id FROM joueurs WHERE user_id = $userId AND event_id = $eventId LIMIT 1";
	    
	    $sth = $this->dbh->prepare($sql);
	    
	    if ($sth->execute()){
	        $foundUser = $sth->fetch();
	        if ($foundUser){
	            return true;
	        }
	    }

	    return false;
	}

	/**
	 * Efface un joueur d'un événément en fonction de son identifiant
	 * @param mixed $userId L'identifiant de l'utilisateur de la ligne à effacer
	 * @param mixed $eventId L'identifiant de l'evenement de la ligne à effacer
	 * @return mixed La valeur de retour de la méthode execute()
	 */
	public function deleteJoueur($userId, $eventId)
	{
		if (!is_numeric($userId) && !is_numeric($eventId)){
			return false;
		}

		$sql = "DELETE FROM joueurs WHERE user_id = :userId AND event_id = :eventId LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":userId", $userId);
		$sth->bindValue(":eventId", $eventId);
		return $sth->execute();
	}

	/**
	 * Efface tous les joueurs d'un événément en
	 * @param mixed $eventId L'identifiant de l'evenement des lignes à supprimer
	 * @return mixed La valeur de retour de la méthode execute()
	 */
	public function deleteAllJoueur($id)
	{
		if ( !is_numeric($id) ){
			return false;
		}

		$sql = "DELETE FROM joueurs WHERE event_id = :id LIMIT 10";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		return $sth->execute();
	}


}