<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\UtilisateurManager;

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