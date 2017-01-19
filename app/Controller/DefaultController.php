<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\UtilisateurManager;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{	
		session_start();

		$this->show('default/home');

	}

	/**
	 * Page d'accueil par défaut
	 */
	public function plaquette()
	{
		$this->show('default/plaquette');
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