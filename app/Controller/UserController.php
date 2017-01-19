<?php 

namespace Controller;

use \W\Controller\Controller;
use \W\Manager\UserManager;

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
		if ( isset($_POST['sign-up']) ) {

			print_r($_POST['form_register']);
			die;
			$manager = new UserManager();
			$wuser = $manager->insert($_POST['form_register']);
			$manager_complement = new UtilisateurManager();
			$wuser['id'];
			$this->redirectToRoute('home');

		} else {
			$this->show('user/register');
		}

			

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