<?php 

namespace Controller;

use \W\Controller\Controller;
use \Manager\EventManager;
use \Manager\SalleManager;

class EventController extends Controller
{

	/**
	 * Page de création d'événement
	 */
	public function creer()
	{
		if (isset($_SESSION['user'])) {

			if( isset($_POST['create'])) {
				$event_manager = new EventManager();
				$event_manager->insert($_POST['form_event']);
				$this->redirectToRoute('detail');

			} 

			//Rechercher toutes les salles pour les insérer dans le formulaire de création
			$salle_manager = new SalleManager();
			$salles = $salle_manager->findAll();

			$this->show('event/creer', ['salles' => $salles]);

		} else {
			$this->redirectToRoute('user/login');
		}
	}

	/**
	 * Page de détail d'événement
	 */
	public function detail($id)
	{
		$event_manager = new EventManager();
		$event = $event_manager->find($id);

		$salle_manager = new SalleManager();
		$salle = $salle_manager->find($event['salle_id']);

		$this->show('event/detail', [ ['id' => $event['id']], 'event' => $event, 'salle' => $salle ]);
	}

	/**
	 * Page de feuille de match
	 */
	public function feuilleMatch()
	{
		$this->show('event/feuille-de-match');
	}


}