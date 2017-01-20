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

		$this->show('default/home');

	}

	/**
	 * Page d'accueil du site pour un utilisateur connecté
	 */
	public function recherche()
	{
		session_start();

		$this->show('default/recherche');
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
		$this->show('default/contact');
	}

}