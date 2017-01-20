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
		if (isset($_SESSION['user'])) {
			$this->show('user/profil');
		} else  {

			$this->redirectToRoute('login');
		}
	}

	/**
	 * Page d'édition du profil
	 */
	public function profilEditer($id)
	{
		if (isset($_SESSION['user'])) {
			
			if(isset($_POST['update'])) {

				$_POST['form_update_user']['password'] = password_hash($_POST['form_update_user']['password'], PASSWORD_DEFAULT);
				$manager = new UserManager();
				$manager->update($_POST['form_update_user'],$id);

				$utilisateur = new UtilisateurManager();
				$utilisateur->update($_POST['form_update_util'],$id);

				// Enregistrement du fichier dans un dossier
				// Le nom du fichier de l'avatar sera l'id de l'utilisateur
  				$nom = $_SESSION['user']['id'];
  				// extrait le nom de l'extension du fichier du nom du fichier upload par l'utilisateur
				$extension_upload = strtolower( substr( strrchr($_FILES['avatar']['name'], '.') ,1) );
				$destination = 'assets/avatars/'.$nom.'.'.$extension_upload;
				$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$destination);

				// Rafraichi la session utilisateur pour récupérer les données modifiées
				$auth_manager = new AuthentificationManager();
				$auth_manager->refreshUser();
				$userInfos = $utilisateur->find($_SESSION['user']['id']);
				$_SESSION['user']['infos'] = $userInfos;
			}

			$this->show('user/profil-editer', ['id' => $_SESSION['user']['id']]);

		} else  {

			$this->redirectToRoute('login');
		}
		
	}

	/**
	 * Suppression d'utilisateur
	 */
	public function delete($id)
	{		
			$manager = new UserManager();
			$manager->delete($id);

			$utilisateur = new UtilisateurManager();
			$utilisateur->delete($id);

			$this->redirectToRoute('home');
 	
	}

}