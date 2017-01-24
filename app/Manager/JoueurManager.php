<?php

namespace Manager;

class JoueurManager extends \W\Manager\Manager {
	/**
	 * Jointure multiple qui récupère les éléments des joueurs inscrit à un événement donné
	 * @param   $id => id de l'événement
	 * @return array Les données sous forme de tableau multidimensionnel
	 */
	public function infosJoueurs($id) {

		$sql = "SELECT u.nom, u.prenom, u.niveau, u.sexe, s.statut FROM joueurs j 
			INNER JOIN wusers w ON j.user_id = w.id 
			INNER JOIN utilisateurs u ON w.id = u.user_id 
			INNER JOIN statuts s ON s.id = j.statut_id 
			WHERE j.event_id= $id";

		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();

	}

	/**
	 * Teste si un utilisateur est déja présent dans la table joueur (et donc inscrit à un événément)
	 * @param string $id est l'id de l'utilisateur à tester
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

}