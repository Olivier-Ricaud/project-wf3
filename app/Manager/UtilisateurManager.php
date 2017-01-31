<?php

namespace Manager;

class UtilisateurManager extends \W\Manager\UserManager {

	public function  deleteUtil($id) {

		if (!is_numeric($id)){
			return false;
		}

		$sql = "DELETE FROM utilisateurs u, joueurs j, events e WHERE j.user_id = :id AND u.user_id = :id AND e.host_id = :id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		return $sth->execute();
	}
	
}