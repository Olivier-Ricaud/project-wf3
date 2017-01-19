<?php 

namespace Controller;

use \W\Controller\Controller;
use \Manager\UtilisateurManager;
use \W\Manager\UserManager;
use \W\Security\AuthentificationManager;
use GUMP;

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
		$errors = [];
		$form = [];

		if ( isset($_POST['sign-up']) ) {

			$validator = new GUMP();
			$manager = new UserManager();

			// Validation et Filtrage

			$_POST['form_register_util'] = $validator->sanitize($_POST['form_register_util']); // You don't have to sanitize, but it's safest to do so.
			$validator->validation_rules(array(
				'nom'    => 'required|alpha_numeric|valid_name|min_len,2 |max_len,50',
				'prenom'    => 'required|alpha_numeric|valid_name|min_len,2 |max_len,50',
				'email'    => 'required|valid_email',
				'sexe'    => 'required|exact_len,5|contains_list,Homme;Femme',
				'lieu'    => ' required|alpha_dash|min_len,5|max_len,50',
				'password'    => 'required|max_len,50|min_len,6',
				'confirm_password'    => 'required|equalfield,password'
			));

			$validator->filter_rules(array(
				'nom' => 'sanitize_string|whole_number|trim',
				'prenom'    => 'sanitize_string|whole_number|trim',
				'email'    => 'trim|sanitize_email',
				'sexe'    => ' trim|santize_string',
				'lieu'    => 'sanitize_string|whole_number|trim',
				'password'    => 'trim|base64_encode',
				'confirm_password'    => 'trim|base64_encode'
			));

			$_POST = $validator->filter($_POST);

			// You can run filter() or validate() first

			$validated = $validator->validate(
				$_POST, $rules
			);

			// Si validation Ok

			if($validated === TRUE)
			{
				echo "Successful Validation\n\n";
				
				print_r($_POST); // You can now use POST data safely
				
				$wuser = $manager->insert(['email' => $_POST['form_register_user']['email'],
											// Hash le password pour crypter les données
											'password' => password_hash($_POST['form_register_user']['password'], PASSWORD_DEFAULT)]);
				$_POST['form_register_util']['user_id'] = $wuser['id'];

				$utilisateur = new UtilisateurManager();
				$utilisateur->insert($_POST['form_register_util']);
				$this->redirectToRoute('home');
			}
			else
			{
				print_r($_POST); 
					
				print_r($validated); // Shows all the rules that failed along with the data
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