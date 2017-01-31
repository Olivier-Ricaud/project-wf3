<?php 

namespace Controller;

use \W\Controller\Controller;
use \Manager\EventManager;
use \Manager\SalleManager;
use \Manager\JoueurManager;
use \Manager\HostManager;


class EventController extends Controller
{

	/**
	 * Page de création d'événement
	 */
	public function creer()
	{
		if (isset($_SESSION['user'])) {

			// tableau liste d'erreurs
			$erreurs = [];

			//Rechercher toutes les salles pour les insérer dans le formulaire de création
			$salle_manager = new SalleManager();
			$salles = $salle_manager->findAll();
			
			if ( isset($_POST['create']) ) {

				$event_manager = new EventManager();

				// Date
				$whatDate = strtotime($_POST['form_event']['date']);
				$TimeReg = preg_match('/^[0-9-]+$/', $whatDate);

				// Heure
				$hour = $_POST['form_event']['heure'];
				$hourReg = preg_match('/^[0-9:]+$/', $hour);

				// Salle
				$salle = $_POST['form_event']['salle_id'];
				$depreg = preg_match('/^[0-9]+$/', $salle);

				
				// Description
				$htmlScTa = htmlspecialchars($_POST['form_event']['description']);

				// Validation et Filtrage [form_event]

				// Titre
				if ((strlen($_POST['form_event']['titre']) <3) ||
					(strlen($_POST['form_event']['titre']) > 100) ||
					!preg_match('/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s_-]+$/', $_POST['form_event']['titre'])) {
					
					$erreurs[] = 'Le champ "titre" doit être valide (entre 3 et 100 caractères).';
				}

				// Date
				if (!$TimeReg || date("Y-m-d", $whatDate) < date("Y-m-d", time()) ) {
					$erreurs[] = "La date ne peut pas être antérieure à aujourd'hui";
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
				if( ! ($_POST['form_event']['duree'] == '01:00' ||
					 $_POST['form_event']['duree'] == '02:00'))  {

				    $erreurs[] = 'Le champ "durée" doit correspondre aux choix proposés.';
				}

				// Déscription
				if (empty($htmlScTa) || strlen($htmlScTa) < 5 ||
					 strlen($htmlScTa) > 5000) {
					$erreurs[] = "Le champ de description est requis et doit comporter entre 5 et 5000 caractères.";
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

				    $erreurs[] = 'Le champ "sexe" doit correspondre aux choix proposés.';
				}

				if ( empty($erreurs) ) {

					$event = $event_manager->insert($_POST['form_event']);


					$this->redirectToRoute('detail', ['id' => $event['id']]);

				}

				$this->show('event/creer', ['erreurs' => $erreurs, 'salles' => $salles]);
			}

			$this->show('event/creer', ['erreurs' => $erreurs, 'salles' => $salles]);

		} else  {

			$this->redirectToRoute('login');
		}
	}

	/**
	 * Fonction du détail des salles dans la page création d'événement en Ajax
	 */
	public function salleDetail($id)
	{
		$salle_manager = new SalleManager();
		$salle = $salle_manager->find($id); 

		$this->show('event/salle-detail', ['salle' => $salle]);

	}

	/**
	 * Page de détail d'événement
	  * @param id de l'événement souhaité
	 */
	public function detail($id)
	{
		if (isset($_SESSION['user'])) {


			// Requete pour aller chercher les données de l'événenement
			$event_manager = new EventManager();
			//Execute les fonctions uniquement si l'id de l'événement existe, autrement renvoi à la page de recherche
			if($event = $event_manager->find($id)) {

				//Vérifier si la personne présente sur la page est l'administrateur de l'événement
				$host_manager = new HostManager();
				$host = false;
				if ( $host_manager->getHost($_SESSION['user']['id'],$event['id']) ) {
					$host = true;
				}

				// Requete pour aller chercher les données de la salle correspondant à l'événement
				$salle_manager = new SalleManager();
				$salle = $salle_manager->find($event['salle_id']);

				$joueurs_manager = new JoueurManager();
				$joueurs = $joueurs_manager->infosJoueurs($id);

				// Compter le nombre de joueurs inscrits
				$nbrsJoueurs = $joueurs_manager->countJoueurs($id);
				//update table events pour afficher le nombre de joueurs dans la recherche events
				$event_manager->update(['nbrs_joueurs' => $nbrsJoueurs],$id);

				// Gérer l'apparition du boutton d'inscription ou de désinscription à un événénement
				$retirer = false;
				if ( $joueurs_manager->joueurExist($_SESSION['user']['id'],$event['id'] ) ) {
					$retirer = true;
				}

				$this->show('event/detail', [ 'id' => $event['id'], 'event' => $event, 'salle' => $salle, 'joueurs' => $joueurs, 'retirer' => $retirer, 'host' => $host, 'nbrsJoueurs' => $nbrsJoueurs]);
			} else {
				$this->redirectToRoute('recherche');
			}

		} else {
			$this->redirectToRoute('login');
		}
	}

	/**
	 * Page de feuille de match
	 */
	public function feuilleMatch($id)
	{
		if (isset($_SESSION['user'])) {

			// tableau liste d'erreurs
			$erreurs = [];

			// Requete pour aller chercher les données de l'événenement
			$event_manager = new EventManager();
			//Execute les fonctions uniquement si l'id de l'événement existe, autrement renvoi à la page de recherche
			if($event = $event_manager->find($id)) {

				//Vérifier si la personne présente sur la page est l'administrateur de l'événement
				$host_manager = new HostManager();
				$host = false;
				if ( $host_manager->getHost($_SESSION['user']['id'],$event['id']) ) {
					$host = true;
				}

				// Requete pour aller chercher les données joueurs correspondant à l'événement				
				$joueurs_manager = new JoueurManager();
				$joueurs = $joueurs_manager->infosJoueurs($id);

				// Validation du formulaire de Resultat
				if ( isset($_POST['send']) ) {

					$event_manager = new EventManager();

					if (  ) {

						$erreurs[] = 'Un joueur ne peut être selectionner qu\'une seule fois.';
					}

					if ( empty($erreurs) ) {

						$event = $event_manager->resultatMatch($id);
						$equipe_1 = $event_manager->equipe_1_Match();
						$equipe_2 = $event_manager->equipe_2_Match();


						$this->redirectToRoute('detail', [ 'id' => $id, 'event' => $event, 'joueurs' => $joueurs, 'erreurs' => $erreurs]);
					}

				}

				$this->show('event/feuille-de-match', [ 'id' => $event['id'], 'joueurs' => $joueurs, 'erreurs' => $erreurs]);	
			}

			$this->show('event/feuille-de-match', [ 'id' => $event['id'], 'joueurs' => $joueurs]);	

		} else {
			$this->redirectToRoute('login');
		}
		
	}

}