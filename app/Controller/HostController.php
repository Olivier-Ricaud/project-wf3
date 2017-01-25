<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\HostManager;
use \Manager\EventManager;
use \Manager\JoueurManager;


class HostController extends Controller
{
	/**
	 * Fonction permettant d'update le statut du joueur comme étant confirmé pour le match
	  * @param $userId = id de l'utilisateur à confirmé
	  * @param $eventId = id de l'événement 
	 */
	public function confirmer($userId, $eventId){

		$host_manager = new HostManager();

		$host_manager->changeStatutToConfirme($userId, $eventId);

		$this->redirectToRoute('detail', [ 'id' => $eventId]);
			
	}

	/**
	 * Fonction permettant de supprimer un événenement
	  * @param id de l'événenement à supprimer
	 */
	public function deleteEvent($id){
		// efface dans un premier temps les joueurs de l'événement 
		$joueur_manager = new JoueurManager();
		
		if($joueur_manager->deleteAllJoueur($id)){
			//Si les joueurs sont supprimé alors efface l'événement
			$event_manager = new EventManager();
			$event_manager->delete($id);

			$this->redirectToRoute('home');
		}

	}

	/**
	 * Page de détail d'événement : Fonction permettant à l'host de retirer un joueur de l'événement
	 * @param userId = id de l'utilisateur à retirer
	 * @param eventId = id de l'événement actuellement affiché dans le navigateur
	 */
	public function retirer($userId, $eventId) {

		$joueur_manager = new JoueurManager();

		$joueur_manager->deleteJoueur($userId, $eventId);

		$this->redirectToRoute('detail', [ 'id' => $eventId]);
	}

}