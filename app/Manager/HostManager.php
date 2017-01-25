<?php

namespace Manager;

class HostManager extends \W\Manager\Manager {

	/**
	 * Teste si un utilisateur est le créateur et donc l'administrateur de l'événement.
	 * @param int $userId est l'id de l'utilisateur à tester
	 * @param int $eventId est l'id de l'évenement sur lequelle se trouve l'utilisateur
	 * @return boolean true si présent en base de données, false sinon
	 */
	public function getHost($userId, $eventId)
	{

	    $sql = "SELECT host_id FROM events WHERE host_id = $userId AND id = $eventId LIMIT 1";
	    
	    $sth = $this->dbh->prepare($sql);
	    
	    if ($sth->execute()){
	        $foundHost = $sth->fetch();
	        if ($foundHost){
	            return true;
	        }
	    }

	    return false;
	}

	/**
	* Modifie le statut de l'utilisateur dans la table joeuurs
	* @param array $data Un tableau associatif de valeurs à insérer
	* @param mixed $id L'identifiant de la ligne à modifier
	* @param boolean $stripTags Active le strip_tags automatique sur toutes les valeurs
	* @return mixed false si erreur, les données mises à jour sinon
	*/
	public function changeStatutToConfirme($userId, $eventId) {

		if (!is_numeric($userId) && !is_numeric($eventId)){
			return false;
		}
		
		$sql = "UPDATE joueurs SET statut_id = :statutId WHERE user_id = :userId AND event_id = :eventId";

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":statutId", strip_tags(2));

		$sth->bindValue(":userId", $userId);
		$sth->bindValue(":eventId", $eventId);

		if (!$sth->execute()){
			return false;
		}
		return $this->find($id);
	}

}