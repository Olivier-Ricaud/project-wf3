<?php 

namespace Controller;

use \W\Controller\Controller;

class EventController extends Controller
{

	/**
	 * Page de création d'événement
	 */
	public function creer()
	{
		$this->show('event/creer');
	}

	/**
	 * Page de détail d'événement
	 */
	public function detail()
	{
		$this->show('event/detail');
	}

	/**
	 * Page de feuille de match
	 */
	public function feuilleMatch()
	{
		$this->show('event/feuille-de-match');
	}


}