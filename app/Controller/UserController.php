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
			$gump = new GUMP();

			// Validation et Filtrage

			$_POST['form_login'] = $gump->sanitize($_POST['form_login']); // You don't have to sanitize, but it's safest to do so.
			$gump->validation_rules(array(
				'email'               => 'required|valid_email',
				'password'            => 'required|max_len,50|min_len,6'
			));

			$gump->filter_rules(array(
				'email'               => 'sanitize_email',
				'confirm_password'    => 'base64_encode'
			));

			$validated_data = $gump->run($_POST['form_login']);

			// Si Filtrage Ok
			if ( ($validated_data == true) AND ( $auth_manager->isValidLoginInfo($_POST['form_login']['email'], $_POST['form_login']['password']) )) {
				
				$user = $util_manager->getUserByUsernameOrEmail($_POST['form_login']['email']);

				$auth_manager->logUserIn($user);
				// Inclus les données de la table utilisateur dans la variable $_SESSION.
				$userInfos = $util_manager->find($_SESSION['user']['id']);
				$_SESSION['user']['infos'] = $userInfos;

				$this->redirectToRoute('recherche');
			} else {

				echo $gump->get_readable_errors(true);
			}

			// Fin Validation et Filtrage

		} else {

			$this->show('user/login');
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
		$errors = [];
		$form = [];

		if ( isset($_POST['sign-up']) ) {

			$gumpUtil = new GUMP();
			$gumpUser = new GUMP();
			$manager = new UserManager();

			// Validation et Filtrage

			// nom, prenom, departement

			$_POST['form_register_util'] = $gumpUtil->sanitize($_POST['form_register_util']);

			$gumpUtil->validation_rules(array(
				// 'nom'                 => 'min_len,2|max_len,50',	// Bug GUMP!
				// 'prenom'              => 'min_len,2|max_len,50', // Bug GUMP!
				'sexe'                => 'required|exact_len,5|contains_list,Homme;Femme',
				'departement'         => 'required|max_len,50'
			));

			$gumpUtil->filter_rules(array(
				'nom'                 => 'sanitize_string|whole_number',
				'prenom'              => 'sanitize_string|whole_number',
			));

			$validated_dataUtil = $gumpUtil->run($_POST['form_register_util']);


			// email, password, confirm_password

			$_POST['form_register_user'] = $gumpUser->sanitize($_POST['form_register_user']); 

			$gumpUser->validation_rules(array(
				'email'               => 'required|valid_email',
				'password'            => 'max_len,50|min_len,6',
				'confirm_password'    => 'equalsfield,password'
			));

			$gumpUser->filter_rules(array(
				'email'               => 'sanitize_email',
				'password'            => 'base64_encode',
				'confirm_password'    => 'base64_encode'
			));

			$validated_dataUser = $gumpUser->run($_POST['form_register_user']); // email, password, confirm_password

			// Si Validation non Ok

			if( $validated_dataUtil && $validated_dataUser ) {

				$wuser = $manager->insert(['email' => $_POST['form_register_user']['email'],
											// Hash le password pour crypter les données
											'password' => password_hash($_POST['form_register_user']['password'], PASSWORD_DEFAULT)]);
				$_POST['form_register_util']['user_id'] = $wuser['id'];

				$utilisateur = new UtilisateurManager();
				$utilisateur->insert($_POST['form_register_util']);
				$this->redirectToRoute('home');
			} else {
				echo "Util = ".$gumpUtil->get_readable_errors(true);
				echo "User = ".$gumpUser->get_readable_errors(true);
			}
			// Fin Validation et Filtrage	

		} else {
			$this->show('user/register');
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