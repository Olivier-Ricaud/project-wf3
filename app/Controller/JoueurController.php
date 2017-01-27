<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\JoueurManager;


class JoueurController extends Controller
{

	/**
	 * Page de détail d'événement : Fonction de participation à un événenement.
	 * @param id de l'événement actuellement affiché dans le navigateur
	 */
	public function participer($id)
	{

		$joueur_manager = new JoueurManager();

		$retirer = false;
			
		$joueur = $joueur_manager->insert([ 'user_id' => $_SESSION['user']['id'], 'event_id' => $id, 'statut_id' => 1 ]);

		$this->redirectToRoute('detail', [ 'id' => $id]);

	}

	/**
	 * Page de détail d'événement : Fonction de désinscription à un événenement.
	 * @param id de l'événement actuellement affiché dans le navigateur
	 */
	public function desinscrire($id)
	{

		$joueur_manager = new JoueurManager();
			
		$joueur = $joueur_manager->deleteJoueur($_SESSION['user']['id'], $id);

		$this->redirectToRoute('detail', [ 'id' => $id]);

	}
	
}