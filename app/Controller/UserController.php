<?php 

namespace Controller;

use \W\Controller\Controller;
use \Manager\UtilisateurManager;
use \W\Security\AuthentificationManager;
use \W\Manager\UserManager;
use GUMP;

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

			$erreurs = [];

			// Validation et Filtrage

			if ( $auth_manager->isValidLoginInfo($_POST['form_login']['email'], $_POST['form_login']['password']) == 0 ) {

				$erreurs[] = "Mauvais email ou mot de passe.";
			} 

			if (empty($_POST['form_login']['email']) || empty($_POST['form_login']['password'])) {
				
				$erreurs[] = "Tous les champs sont requis";
			}

			// Si Filtrage Ok
			if ( ( empty($erreurs) ) AND ( $auth_manager->isValidLoginInfo($_POST['form_login']['email'], $_POST['form_login']['password']) )) {
				
				$user = $util_manager->getUserByUsernameOrEmail($_POST['form_login']['email']);

				$auth_manager->logUserIn($user);
				// Inclus les données de la table utilisateur dans la variable $_SESSION.
				$userInfos = $util_manager->find($_SESSION['user']['id']);
				$_SESSION['user']['infos'] = $userInfos;

				$this->redirectToRoute('recherche');
			} 

			$this->show('user/login', ['erreurs' => $erreurs]);

			// Fin Validation et Filtrage

		} else {

			$this->show('user/login', ['erreurs' => $erreurs]);
		}
	}

	/**
	* Déconnexion de l'utilisateur
	*/
	public function logout()
	{
		$logout_user = new AuthentificationManager();
		$logout_user->logUserOut();
		$this->redirectToRoute('home');
	}

	/**
	 * Page d'inscription
	 */
	public function register()
	{
		$erreurs = [];
		if ( isset($_POST['sign-up']) ) {
		

			$manager = new UserManager();
			

			// Validation et Filtrage [form_register_util]
			if( empty( $_POST['form_register_util']['nom']) || (strlen($_POST['form_register_util']['nom']) <3) || (strlen($_POST['form_register_util']['nom']) > 100) || !preg_match('/^[a-zA-Z_]+$/', $_POST['form_register_util']['nom']) ) {
				
	            $erreurs[] = 'Le champ "nom" doit être valide (entre 3 et 100 caractères).';
	   
	        }

	        if( empty($_POST['form_register_util']['prenom']) || (strlen($_POST['form_register_util']['prenom']) <3) || (strlen($_POST['form_register_util']['prenom']) > 100) || !preg_match('/^[a-zA-Z_]+$/', $_POST['form_register_util']['prenom'])) {
				
	            $erreurs[] = 'Le champ "prénom" doit être valide (entre 3 et 100 caractères).';
	        }

	        if( empty($_POST['form_register_util']['departement']) || (strlen($_POST['form_register_util']['departement']) <3) || (strlen($_POST['form_register_util']['departement']) > 100)) {

	            $erreurs[] = 'Le champ "département" doit être valide (entre 3 et 100 caractères).';
	        } 

	        if( $_POST['form_register_util']['sexe'] != 'Homme' || $_POST['form_register_util']['sexe'] != 'Femme')  {

	            $erreurs[] = 'Le champ "sexe" doit correspondre à homme ou femme.';
	        }

	        // Validation et Filtrage [form_register_user]

	        if (empty($_POST['form_register_user']['email']) ||  strlen($_POST['form_register_user']['email']) > 255 || !filter_var($_POST['form_register_user']['email'], FILTER_VALIDATE_EMAIL)) {

	        	$erreurs[] = "Votre email n'est pas valide.";

	        } 
	        elseif ($manager->emailExists($_POST['form_register_user']['email'])) {

	        	$erreurs[] = "Cet email existe déja.";

	        }

	        if (empty($_POST['form_register_user']['password']) || strlen($_POST['form_register_user']['password']) > 300) {
	        	$erreurs[] = "Champ mot de passe requis.";
	        }

	        if ($_POST['form_register_user']['confirm_password'] != $_POST['form_register_user']['password']) {
	        	$erreurs[] = "Le mot de passe ne correspond pas.";
	        }
	        
	       if ( empty($erreurs)) {
	            
	            $wuser = $manager->insert(['email' => $_POST['form_register_user']['email'],
											// Hash le password pour crypter les données
											'password' => password_hash($_POST['form_register_user']['password'], PASSWORD_DEFAULT)]);
				$_POST['form_register_util']['user_id'] = $wuser['id'];

				$utilisateur = new UtilisateurManager();
				$utilisateur->insert($_POST['form_register_util']);
				$this->redirectToRoute('home');

	        }

	        $this->show('user/register', ['erreurs' => $erreurs]);
	        // Fin Validation et Filtrage

        } else {
			$this->show('user/register',['erreurs' => $erreurs]);
		}
	} 
	

	/**
	 * Page d'accueil du profil
	 */
	public function profil()
	{
		if (isset($_SESSION['user'])) {
			$this->show('user/profil');
		} else  {

			$this->redirectToRoute('login');
		}
	}

	/**
	 * Page d'édition du profil
	 */
	public function profil_editer()
	{
		if (isset($_SESSION['user'])) {
			$this->show('user/profil-editer');
		} else  {

			$this->redirectToRoute('login');
		}
		
	}

}