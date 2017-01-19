<?php 

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{

	/**
	 * Page de connexion
	 */
	public function login()
	{
		$this->show('user/login');
	}

	/**
	 * Page d'inscription
	 */
	public function register()
	{
		$this->show('user/register');
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