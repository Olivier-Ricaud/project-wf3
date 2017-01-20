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

			$gump = new GUMP();
			$manager = new UserManager();

			// Validation et Filtrage

			$_POST['form_register_util'] = $gump->sanitize($_POST['form_register_util']); // You don't have to sanitize, but it's safest to do so.
			$gump->validation_rules(array(
				'nom'                 => 'required|alpha_numeric|valid_name|max_len,50',
				'prenom'              => 'required|alpha_numeric|valid_name|max_len,50',
				'email'               => 'valid_email',
				'sexe'                => 'required|exact_len,5|contains_list,Homme;Femme',
				'lieu'                => 'alpha_dash|min_len,5|max_len,50',
				'password'            => 'max_len,50|min_len,6',
				'confirm_password'    => 'equalsfield,password'
			));

			$gump->filter_rules(array(
				'nom'                 => 'sanitize_string|whole_number',
				'prenom'              => 'sanitize_string|whole_number',
				'email'               => 'sanitize_email',
				// 'sexe'                => 'santize_string',
				// 'lieu'                => 'sanitize_string|whole_number',
				'password'            => 'base64_encode',
				'confirm_password'    => 'base64_encode'
			));

			$validated_data = $gump->run($_POST['form_register_util']);

			// Si validation non Ok
			if($validated_data === false) {
			    echo $gump->get_readable_errors(true);
			} else {
			    print_r($validated_data); // validation successful

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