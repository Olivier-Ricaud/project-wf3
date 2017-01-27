<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\UtilisateurManager;
use \Manager\EventManager; 
use \Manager\SalleManager;
use \Manager\ContactManager;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil du site par defaut
	 */
	public function home()
    {   
        if (isset($_SESSION['user'])) {
            $this->redirectToRoute('recherche');
        } else  {
            // Dans le cas de l'envoi d'un formulaire exterieur
            // Envoi et réception du mail destinataire 
            $destinataire = 'wefive.project@gmail.com';
            if (isset($_POST['envoyer'])) {
                $contact_manager = new ContactManager();
                $data = array_merge($_POST['form_contactExt'], ['date' => date('Y-m-d H:i:s')]);
                print_r($data);
                // traitement du formulaire
                $contact_manager->insert($data);
                // Traitement envoi du mail
                $expediteur = $_POST['form_contactExt'['nom']] . ' <'. $_POST['form_contactExt'['email']] .'>';
                $mail = mail($destinataire,$_POST['form_contactExt'['sujet']], $_POST['form_contactExt'['message']], $expediteur . ' : wefive.com : Mail de contact');
                $this->redirectToRoute('home');
            }
            $this->show('default/home');
        }
        
    }

	/**
	 * Page d'accueil du site pour un utilisateur connecté
	 */
	public function recherche()
	{
		if (isset($_SESSION['user'])) {
		
			$erreurs = [];

			if ( isset($_GET['search']) ) {
				
				$event_manager = new EventManager;
				$events = $event_manager->findEvents($_GET['departement'],
					$_GET['date_debut'],
					$_GET['date_fin'],
					$_GET['niveau'],
					$_GET['sexe'],
					$_GET['duree']);

				// Filtre et Validation

				// Departement
				if( empty($_GET['departement']) ||
					(strlen($_GET['departement']) <3) ||
					(strlen($_GET['departement']) > 100)) {

				    $erreurs[] = 'Le champ "département" doit être valide (entre 3 et 100 caractères).';
				} 

				// Date
				if ($_GET['date_debut'] > $_GET['date_fin'] ||
					 $_GET['date_debut'] < date("Y-m-d",time()) ) {
					$erreurs[] = 'Les champs de dates ne sont pas valides';
				}

				$this->show('default/recherche', ['events' => $events, 'erreurs' => $erreurs, 'nextRdvs' => $nextRdvs]);
			}

			$nextRdvs_manager = new EventManager();
			$nextRdvs = $nextRdvs_manager->userEvents($_SESSION['user']['id']);

			$this->show('default/recherche', ['nextRdvs' => $nextRdvs]);
		} else  {

			$this->redirectToRoute('login');
		}
	}

	/**
	 * Page de charte
	 */
	public function charte()
	{
		$this->show('default/charte');
	}

	/**
	 * Page de CGU
	 */
	public function cgu()
	{
		$this->show('default/cgu');
	}

	/**
	 * Page de contact
	 */
	public function contact()
	{

		if ( isset($_SESSION['user']) ) {

			// récuperer nom, prénom et email de l'user
	        $utilisateur_manageur = new UtilisateurManager();
	        $utilisateur = $utilisateur_manageur->find($_SESSION['user']['id']);

	        // Envoi et réception du mail destinataire 
	        $destinataire = 'wefive.project@gmail.com';

	        // Tableau d'erreur
	        $erreurs = [];
	        // Description
			$htmlScTa = htmlspecialchars($_POST['form_contact']['message']);

	        // Formulaire soumis par le user
	        if (isset($_POST['envoyer'])) {

	            $data = array_merge($_POST['form_contact'], ['date' => date('Y-m-d H:i:s'), 'user_id' => $_SESSION['user']['id'], 'nom' => $_SESSION['user']['infos']['nom'] , 'prenom' => $_SESSION['user']['infos']['prenom'], 'email' => $_SESSION['user']['email'] ]);

	            // Titre
				if ((strlen($_POST['form_contact']['sujet']) <3) ||
					(strlen($_POST['form_contact']['sujet']) > 100) ||
					!preg_match('/^[a-zA-Z0-9\s_]+$/', $_POST['form_contact']['sujet'])) {
					
					$erreurs[] = 'Le champ "sujet" doit être valide (entre 3 et 100 caractères).';
				}

				// Message
				if (empty($htmlScTa) || strlen($htmlScTa) < 5 ||
					 strlen($htmlScTa) > 5000) {
					$erreurs[] = 'Le champ "message" est requis et doit comporter moins de 5000 caractères.';
				}

		        if ( empty($erreurs) ) {
			            
		            // traitement du formulaire
	            	$contact_manager = new ContactManager();
		            $donne = $contact_manager->insert($data); 

		            // Traitement envoi du mail
		            $expediteur = $utilisateur['nom'] . ' <'. $_SESSION['user']['email'] .'>';
		            $mail = mail($destinataire,$_POST['form_contact'['sujet']], $_POST['form_contact'['message']], $expediteur . ' : wefive.com : Mail de contact');

	        		$this->redirectToRoute('home');
		        }
			} 
			
			$this->show('default/contact', ['utilisateur' => $utilisateur, 'erreurs' => $erreurs]);

		} else {
				
			$this->redirectToRoute('login');
		}
	}
}