<?php 

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationManager;
use GUMP;

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
		$errors = [];
		$form = [];
		
		if(isset($_POST['Signin'])) {

			$gump = new GUMP();
			$_POST['myform'] = $gump->sanitize($_POST['myform']); // You don't have to sanitize, but it's safest to do so.
			$gump->validation_rules(array(
				'nom'    => 'required|alpha_numeric|valid_name|min_len,2 |max_len,50',
				'prenom'    => 'required|alpha_numeric|valid_name|min_len,2 |max_len,50',
				'email'    => 'required|valid_email',
				'sexe'    => 'exact_len,5|contains,Homme Femme',
				'lieu'    => 'required',
				'password'    => 'required|max_len,50|min_len,6',
				'confirm_password'    => 'equalfield,password'
			));

			$gump->filter_rules(array(
				'nom' => 'trim|sanitize_string',
				'prenom'    => 'trim|sanitize_string',
				'email'    => 'trim|sanitize_email',
				'sexe'    => 'trim',
				'lieu'    => 'trim',
				'password'    => 'trim|base64_encode',
				'confirm_password'    => 'trim'
			));

			$validated_data = $gump->run($_POST['myform']);	

			if($validated_data === false) {
	    		//echo $gump->get_readable_errors(true);
				$errors = $gump->get_errors_array();
				$form = $_POST['myform'];
			} else {
	    		//print_r($validated_data); // validation successful
				$manager = new PostManager();
				$manager->insert($_POST['myform']);
				$this->redirectToRoute('home');
			}
		}
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