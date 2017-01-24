<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\UtilisateurManager;
use \Manager\EventManager; 

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
		
			// $erreurs = [];

			if ( isset($_POST['search']) ) {
				
				$event_manager = new EventManager;
				$events = $event_manager->findAll();

				// Filtre et Validation

				// Departement
				// if( empty($_POST['formRecherche']['departement']) ||
				// 	(strlen($_POST['formRecherche']['departement']) <3) ||
				// 	(strlen($_POST['formRecherche']['departement']) > 100)) {

				//     $erreurs[] = 'Le champ "département" doit être valide (entre 3 et 100 caractères).';
				// } 



				




				$this->show('default/recherche', ['events' => $events]);
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