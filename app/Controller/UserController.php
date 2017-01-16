<?php 

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{

	/**
	 * Page de connexion
	 */
	public function connexion()
	{
		$this->show('user/connexion');
	}

	/**
	 * Page d'inscription
	 */
	public function inscription()
	{
		$this->show('user/inscription');
	}

	/**
	 * Page d'accueil du profil
	 */
	public function profil()
	{
		$this->show('user/profil');
	}

	/**
	 * Page d'édition du profil
	 */
	public function profil_editer()
	{
		$this->show('user/profil-editer');
	}

}