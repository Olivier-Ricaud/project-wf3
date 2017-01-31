<?php 

namespace Controller;

use \W\Controller\Controller;
use \Manager\UtilisateurManager;
use \W\Security\AuthentificationManager;
use \W\Manager\UserManager;
use \Manager\JoueurManager;
use \Manager\EventManager;

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

			if (empty($_POST['form_login']['email']) ||
				empty($_POST['form_login']['password'])) {
				
				$erreurs[] = "Tous les champs sont requis";
			}

			// Si Filtrage Ok
			if ( ( empty($erreurs) ) AND
				 ( $auth_manager->isValidLoginInfo($_POST['form_login']['email'], $_POST['form_login']['password']) ) ) {
				
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
		// Tableau d'erreur
		$erreurs = [];

		// Message de validation
		$validation = "";

		if ( isset($_POST['sign-up']) ) {
		

			$manager = new UserManager();
			

			// Validation et Filtrage [form_register_util]
			
			// Nom
			if( empty( $_POST['form_register_util']['nom']) ||
				 (strlen($_POST['form_register_util']['nom']) <3) ||
				 (strlen($_POST['form_register_util']['nom']) > 100) ||
				 !preg_match('/^[a-zA-Z_]+$/', $_POST['form_register_util']['nom']) ) {
				
	            $erreurs[] = 'Le champ "nom" doit être valide (entre 3 et 100 caractères).';
	   
	        }

	        // Prenom
	        if( empty($_POST['form_register_util']['prenom']) ||
	         	(strlen($_POST['form_register_util']['prenom']) <3) ||
	          	(strlen($_POST['form_register_util']['prenom']) > 100) ||
	          	!preg_match('/^[a-zA-Z_]+$/', $_POST['form_register_util']['prenom'])) {
				
	            $erreurs[] = 'Le champ "prénom" doit être valide (entre 3 et 100 caractères).';
	        }

	        // Departement
	        if( empty($_POST['form_register_util']['departement']) ||
	        	(strlen($_POST['form_register_util']['departement']) <3) ||
	        	(strlen($_POST['form_register_util']['departement']) > 100)) {

	            $erreurs[] = 'Le champ "département" doit être valide (entre 3 et 100 caractères).';
	        } 


	        // Sexe
	        if( ! ($_POST['form_register_util']['sexe'] == 'Homme' ||
	        	$_POST['form_register_util']['sexe'] == 'Femme'))  {

	        	$erreurs[] = 'Le champ "sexe" doit correspondre à homme ou femme.';
	        }

	        // Validation et Filtrage [form_register_user]

	        // Email
	        if (empty($_POST['form_register_user']['email']) ||
	        	 strlen($_POST['form_register_user']['email']) > 255 ||
	        	 !filter_var($_POST['form_register_user']['email'], FILTER_VALIDATE_EMAIL)) {

	        	$erreurs[] = "Votre email n'est pas valide.";

	        } 
	        elseif ($manager->emailExists($_POST['form_register_user']['email'])) {

	        	$erreurs[] = "Cet email existe déja.";

	        }

	        // Password
	        if (empty($_POST['form_register_user']['password']) ||
	        	strlen($_POST['form_register_user']['password']) < 6 ||
	        	strlen($_POST['form_register_user']['password']) > 300) {
	        	$erreurs[] = "Champ mot de passe requis (plus de 6 caractères).";
	        }

	        // Confirm password
	        if ($_POST['form_register_user']['confirm_password'] != $_POST['form_register_user']['password']) {
	        	$erreurs[] = "Le mot de passe ne correspond pas.";
	        }
	        
	       // Si $erreurs vide, Validation OK
	       if ( empty($erreurs)) {
	            
	            $wuser = $manager->insert(['email' => $_POST['form_register_user']['email'],
											// Hash le password pour crypter les données
											'password' => password_hash($_POST['form_register_user']['password'], PASSWORD_DEFAULT)]);
				$_POST['form_register_util']['user_id'] = $wuser['id'];

				$utilisateur = new UtilisateurManager();
				$utilisateur->insert($_POST['form_register_util']);

				$validation = 'Votre Inscription a été validé.';

				$this->redirectToRoute('login');

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

			// Affichage événements
			$events_manager = new EventManager();

			// match(s) à venir
			$events = $events_manager->userEvents($_SESSION['user']['id'], 0);

			// match(s) terminé(s)
			$matchs_over = $events_manager->userEvents($_SESSION['user']['id'], 1);
			print_r($matchs_over);


			$this->show('user/profil',['events' => $events, 'matchs_over' => $matchs_over]);
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

			// Tableau d'erreur
			$erreurs = [];

			// Message de validation
			$validation = "";
			
			if(isset($_POST['update'])) {
				
				$manager = new UserManager();

				// Validation et Filtrage [form_update_util]
				
				// Nom
				if( empty( $_POST['form_update_util']['nom']) ||
					 (strlen($_POST['form_update_util']['nom']) < 3) ||
					 (strlen($_POST['form_update_util']['nom']) > 100) ||
					 !preg_match('/^[a-zA-Z_]+$/', $_POST['form_update_util']['nom']) ) {
					
		            $erreurs[] = 'Le champ "nom" doit être valide (entre 3 et 100 caractères).';
		   
		        }

		        // Prenom
		        if( empty($_POST['form_update_util']['prenom']) ||
		         	(strlen($_POST['form_update_util']['prenom']) <3) ||
		          	(strlen($_POST['form_update_util']['prenom']) > 100) ||
		          	!preg_match('/^[a-zA-Z_]+$/', $_POST['form_update_util']['prenom'])) {
					
		            $erreurs[] = 'Le champ "prénom" doit être valide (entre 3 et 100 caractères).';
		        }

		        // Username ou pseudo
		        if( empty($_POST['form_update_user']['username']) ||
		         	(strlen($_POST['form_update_user']['username']) <5) ||
		          	(strlen($_POST['form_update_user']['username']) > 100) ||
		          	!preg_match('/^[a-zA-Z0-9_]+$/', $_POST['form_update_user']['username'])) {
		        
		            $erreurs[] = 'Le champ "pseudo" doit être valide (entre 5 et 100 caractères alphanumériques).';
		        }

		        // Departement
		        if( empty($_POST['form_update_util']['departement']) ||
		        	(strlen($_POST['form_update_util']['departement']) <3) ||
		        	(strlen($_POST['form_update_util']['departement']) > 100)) {

		            $erreurs[] = 'Le champ "département" doit être valide (entre 3 et 100 caractères).';
		        } 


		        // Sexe
		        if( ! ($_POST['form_update_util']['sexe'] == 'Homme' ||
		        	$_POST['form_update_util']['sexe'] == 'Femme'))  {

		        	$erreurs[] = 'Le champ "sexe" doit correspondre à homme ou femme.';
		        }

		        // Email
		        if (empty($_POST['form_update_user']['email']) ||
		        	 strlen($_POST['form_update_user']['email']) > 255 ||
		        	 !filter_var($_POST['form_update_user']['email'], FILTER_VALIDATE_EMAIL)) {

		        	$erreurs[] = "Votre email n'est pas valide.";

		        }

		        // Password
		        if (empty($_POST['form_update_user']['password']) || empty($_POST['confirm_password'])) {
		        	$erreurs[] = "Veuillez saisir votre mot de passe pour valider la modification du profil";
		        }
		        if(!empty($_POST['form_update_user']['password'])) {
			        if (strlen($_POST['form_update_user']['password']) < 6 ||
			        	strlen($_POST['form_update_user']['password']) > 300) {
			        	$erreurs[] = "Champ mot de passe requis (plus de 6 caractères).";
			        }

			        // Confirm password
			        if ($_POST['confirm_password'] != $_POST['form_update_user']['password']) {
			        	$erreurs[] = "Le mot de passe ne correspond pas.";
			        }
		        }
		        // Si $erreurs vide, Validation OK
		        if ( empty($erreurs)) {

					$_POST['form_update_user']['password'] = password_hash($_POST['form_update_user']['password'], PASSWORD_DEFAULT);

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

					// Message de validation
					$validation = 'Votre Profil a été mis à jour.';

					$this->show('user/profil-editer', ['id' => $_SESSION['user']['id'], 'validation' => $validation]);
				}
			}

			$this->show('user/profil-editer', ['id' => $_SESSION['user']['id'], 'erreurs' => $erreurs]);

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
			$utilisateur->deleteUtil($id);

			$this->redirectToRoute('home');
 	
	}

}