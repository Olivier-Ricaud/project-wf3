<?php

namespace Manager;

class JoueurManager extends \W\Manager\Manager {
	/**
	 * Jointure multiple qui récupère les éléments des joueurs inscrit à un événement donné
	 * @param   $id => id de l'événement
	 * @return array Les données sous forme de tableau multidimensionnel
	 */
	public function infosJoueurs($id) {

		$sql = "SELECT u.nom, u.prenom, u.niveau, u.sexe, s.statut, j.user_id, j.equipe_id FROM joueurs j 
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
	 * Compte le nombre de joueurs inscrit à un événement
	 * @param int $eventId est l'id de l'événement sur lequelle est l'utilisateur dans son navigateur
	 * @return int total du nombre de joueurs inscrit
	 */
	public function countJoueurs($eventId)
	{

	    $sql = "SELECT COUNT(user_id) AS nb FROM joueurs WHERE event_id = $eventId LIMIT 10";
	    
	    $sth = $this->dbh->query($sql);
	    
	    $result = $sth->fetch(); 

	    $nb = $result['nb'];
		
		return $nb;
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

	
	/* (sous) JoueurManager.php 
	-	Supprimer les données de l'utilisateur FROM table "joueurs" (via user_id)
	- 	Uj = user / joueurs
	*/
	public function del_Uj($userId) {

	$sql = "DELETE events, joueurs FROM events INNER JOIN joueurs WHERE events.host_id = joueurs.user_id AND events.host_id = $userId";
	$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":userId", $userId);
		return $sth->execute();
	}

}