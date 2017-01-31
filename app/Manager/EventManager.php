<?php

namespace Manager;

class EventManager extends \W\Manager\Manager {

	/**
	 * Récupère toutes les lignes de la table
	 * @param   $departement 
	 * @param   $d_Date La date de début
	 * @param   $f_Date La date de fin
	 * @param   $niveau (Débutant, Intermédiaire, Confirmé, Tout niveaux)
	 * @return $sexe
	 * @return $durée
	 */
	function findEvents($departement, $d_Date, $f_Date, $niveau, $sexe, $duree) {

		
		//SELECT *, e.id FROM events e INNER JOIN salles s ON e.salle_id = s.id WHERE s.departement='Val-d-Oise' AND (date BETWEEN '2017-01-01' AND '2017-01-31') AND e.niveau='Intermédiaire' AND e.sexe='Homme' AND e.duree='02:00'


		$sql = "SELECT *, e.id FROM events e INNER JOIN salles s ON e.salle_id = s.id WHERE ";

		if (!empty($departement) && preg_match('/^[a-zA-Z0-9-]+$/', $departement)){

			$sql .= "s.departement='$departement' ";
			
		}

		if (!empty($d_Date) && !empty($f_Date) && preg_match('/^[0-9-]+$/', $d_Date) && preg_match('/^[0-9-]+$/', $f_Date)){

				$sql .= "AND (date BETWEEN '$d_Date' AND '$f_Date') " ;	
		}


		if (!empty($niveau) && preg_match('/^[a-zA-Z]+$/', $niveau)) {

			$sql .= "AND e.niveau='$niveau' " ;

		}

		if (!empty($sexe) && preg_match('/^[a-zA-Z]+$/', $sexe)) {

			$sql .= "AND e.sexe='$sexe' " ;

		}

		if (!empty($duree) && preg_match('/^[0-9:]+$/', $duree)) {

			$sql .= "AND e.duree='$duree' " ;

		}
		if ( !(empty($departement) && empty($d_date) && empty($f_date)) ){
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
		}
	}

	public function userEvents($id)
	{	
		$sql = "SELECT * FROM events e INNER JOIN joueurs j ON e.id = j.event_id INNER JOIN salles s ON e.salle_id = s.id WHERE j.user_id = $id AND e.match_over = 0";
		
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function userEvents_over($id)
	{
		
		$sql = "SELECT * FROM events e INNER JOIN joueurs j ON e.id = j.event_id INNER JOIN salles s ON e.salle_id = s.id WHERE j.user_id = $id AND e.match_over = 1";
		
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}


	public function resultatMatch($id)
	{

		$sql = "UPDATE events, joueurs 
			SET events.match_over = 1, 
				events.score_equipe_1 = :s1, 
				events.score_equipe_2 = :s2
			WHERE events.id = :id";

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->bindValue(":s1", $_POST['s1']);
		$sth->bindValue(":s2", $_POST['s2']);

		return $sth->execute();
	}

	public function equipe_1_Match()
	{

		$sql_eq1 = "UPDATE joueurs 
			SET joueurs.equipe_id = 1 
			WHERE joueurs.user_id 
			IN (:j1, :j2, :j3, :j4, :j5)";

		$sth1 = $this->dbh->prepare($sql_eq1);		
		$sth1->bindValue(":j1", $_POST['j1']);
		$sth1->bindValue(":j2", $_POST['j2']);
		$sth1->bindValue(":j3", $_POST['j3']);
		$sth1->bindValue(":j4", $_POST['j4']);
		$sth1->bindValue(":j5", $_POST['j5']);

		return $sth1->execute();
	}

	public function equipe_2_Match()
	{

		$sql_eq2 = "UPDATE joueurs 
			SET joueurs.equipe_id = 2 
			WHERE joueurs.user_id 
			IN (:j6, :j7, :j8, :j9, :j10)";

		$sth2 = $this->dbh->prepare($sql_eq2);
		$sth2->bindValue(":j6", $_POST['j6']);
		$sth2->bindValue(":j7", $_POST['j7']);
		$sth2->bindValue(":j8", $_POST['j8']);
		$sth2->bindValue(":j9", $_POST['j9']);
		$sth2->bindValue(":j10", $_POST['j10']);

		return $sth2->execute();
	}
}