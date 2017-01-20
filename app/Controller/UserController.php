<?php 

namespace Controller;

use \W\Controller\Controller;
use \Manager\UtilisateurManager;
use \W\Security\AuthentificationManager;
use \W\Manager\UserManager;

class UserController extends Controller
{

	/**
	 * Page de connexion
	 */
	public function login()
	{
		if ( isset($_POST['login']) ) {
			$auth_manager = new AuthentificationManager();
			$util_manager = new UtilisateurManager();


			if ( $auth_manager->isValidLoginInfo($_POST['form_login']['email'], $_POST['form_login']['password']) ) {
				
				$user = $util_manager->getUserByUsernameOrEmail($_POST['form_login']['email']);

				$auth_manager->logUserIn($user);
				// Inclus les données de la table utilisateur dans la variable $_SESSION.
				$userInfos = $util_manager->find($_SESSION['user']['id']);
				$_SESSION['user']['infos'] = $userInfos;

				$this->redirectToRoute('recherche');
			}

		} else {

			$this->show('user/login');
		}
	}

	/**
	 * Page d'inscription
	 */
	public function register()
	{
		if ( isset($_POST['sign-up']) ) {
			
			$manager = new UserManager();

			$wuser = $manager->insert(['email' => $_POST['form_register_user']['email'],
										// Hash le password pour crypter les données
										'password' => password_hash($_POST['form_register_user']['password'], PASSWORD_DEFAULT)]);
			$_POST['form_register_util']['user_id'] = $wuser['id'];

			$utilisateur = new UtilisateurManager();
			$utilisateur->insert($_POST['form_register_util']);
			$this->redirectToRoute('login');

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