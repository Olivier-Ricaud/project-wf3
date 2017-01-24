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

		
		//SELECT * FROM events e INNER JOIN salles s ON e.salle_id = s.id WHERE s.departement='Val-d-Oise' AND (date BETWEEN '2017-01-01' AND '2017-01-31') AND e.niveau='Intermédiaire' AND e.sexe='Homme' AND e.duree='02:00'


		$sql = "SELECT * FROM events e INNER JOIN salles s ON e.salle_id = s.id WHERE ";

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
		
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

}