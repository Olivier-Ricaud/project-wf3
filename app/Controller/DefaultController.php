<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\UtilisateurManager;
use \Manager\EventManager; 
use \Manager\SalleManager; 

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


				$this->show('default/recherche', ['events' => $events, 'erreurs' => $erreurs]);
			}


			$this->show('default/recherche');
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

		if (isset($_SESSION['user'])) {
			$this->show('default/contact');
		} else  {
			
			$this->redirectToRoute('login');
		}
	}

}