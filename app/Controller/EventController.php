<?php 

namespace Controller;

use \W\Controller\Controller;
use \W\Manager\UserManager;

class EventController extends Controller
{

	/**
	 * Page de création d'événement
	 */
	public function creer()
	{
		if (isset($_SESSION['user'])) {

			$erreurs = [];
			
			if ( isset($_POST['create']) ) {

				$manager = new UserManager();

				// Date
				$whatDate = strtotime($_POST['form_event']['date']);
				$TimeReg = preg_match('/^[0-9-]+$/', $whatDate);

				// Heure
				$hour = $_POST['form_event']['heure'];
				$hourReg = preg_match('/^[0-9:]+$/', $hour);

				// Salle
				$salle = $_POST['form_event']['salle_id'];
				$depreg = preg_match('/^[a-zA-Z0-9\s-]+$/', $salle);
				
				// Description
				$htmlScTa = htmlspecialchars($_POST['form_event']['description']);

				// Validation et Filtrage [form_event]

				// Titre
				if ( empty( $_POST['form_event']['titre']) ||
					(strlen($_POST['form_event']['titre']) <3) ||
					(strlen($_POST['form_event']['titre']) > 100) ||
					!preg_match('/^[a-zA-Z\s_]+$/', $_POST['form_event']['titre'])) {
					
					$erreurs[] = 'Le champ "titre" doit être valide (entre 3 et 100 caractères).';
				}

				// Date
				if (!$TimeReg || date("U", $whatDate) < time()) {
					$erreurs[] = "La date entrée n'est pas valide.";
				}
				// Heure
				$hour = $_POST['form_event']['heure'];
				$hourReg = preg_match('/^[0-9:]+$/', $hour);
				if (!$hourReg) {
					$erreurs[] = "L'heure entré n'est pas valide.";
				}
				// Salle
				if (!$depreg || strlen($salle) > 100) {
					$erreurs[] = "Le champ salle n'est pas valide.";
				}

				// Durée
				if( ! ($_POST['duree'] == '01:00' ||
					 $_POST['duree'] == '02:00'))  {

				    $erreurs[] = 'Le champ "durée" doit correspondre aux choix proposés.';
				}

				// Déscription
				if (empty($htmlScTa) || strlen($htmlScTa) < 5 ||
					 strlen($htmlScTa) > 5000) {
					$erreurs[] = "Le champ de description est requis et doit comporter moins de 5000 caractères.";
				}

				// Niveau
				if ( ! ($_POST['form_event']['niveau'] == 'Débutant' ||
					 $_POST['form_event']['niveau'] == 'Intermediaire' ||
					 $_POST['form_event']['niveau'] == 'Confirmé' ||
					 $_POST['form_event']['niveau'] == 'Tous niveaux'
				 )) {
					$erreurs[] = 'Le champ "niveau" doit correspondre aux choix proposés.';
				}

				// Sexe
				if( ! ($_POST['form_event']['sexe'] == 'Mixte' ||
					 $_POST['form_event']['sexe'] == 'Homme' || 
				 	$_POST['form_event']['sexe'] == 'Femme'))  {

				    $erreurs[] = 'Le champ "sexe" doit correspondre aux choix proposées.';
				}

				$this->show('event/creer', ['erreurs' => $erreurs]);
			}

			$this->show('event/creer', ['erreurs' => $erreurs]);
		} else  {

			$this->redirectToRoute('login');
		}
	}

	/**
	 * Page de détail d'événement
	 */
	public function detail()
	{
		$this->show('event/detail');
	}

	/**
	 * Page de feuille de match
	 */
	public function feuilleMatch()
	{
		$this->show('event/feuille-de-match');
	}


}