<?php
	
	$w_routes = array(
		// Routes des pages de bases du site
		['GET|POST', '/', 'Default#home', 'home'],
		['GET|POST', '/recherche', 'Default#recherche', 'recherche'],
		['GET', '/cgu', 'Default#cgu', 'cgu'],
		['GET', '/charte', 'Default#charte', 'charte'],
		['GET|POST', '/contact', 'Default#contact', 'contact'],

		// Routes pour les pages concernant le compte utilisateur du site
		['GET|POST', '/login', 'user#login', 'login'],
		['GET|POST', '/logout', 'user#logout', 'logout'],
		['GET|POST', '/register', 'user#register', 'register'],
		['GET|POST', '/delete/[i:id]', 'user#delete', 'delete'],
		['GET', '/profil', 'user#profil', 'profil'],
		['GET|POST', '/profil-editer/[i:id]', 'user#profilEditer', 'profil_editer'],

		// Routes concernant les évenements du site
		['GET|POST', '/creer', 'event#creer', 'creer'],
		['GET|POST', '/salle-detail/[i:id]', 'event#salleDetail', 'salle_detail'],
		['GET|POST', '/detail/[i:id]', 'event#detail', 'detail'],
		['GET|POST', '/feuille-de-match/[i:id]', 'event#feuilleMatch', 'feuille_match'],

		// Routes concernant les utilisateurs participant à l'évenement du site
		['GET|POST', '/participer/[i:id]', 'joueur#participer', 'participer'],
		['GET|POST', '/desinscrire/[i:id]', 'joueur#desinscrire', 'desinscrire'],

		// Routes concernant les utilisateurs participant à l'évenement du site
		['GET|POST', '/confirmer/[i:userId]/[i:eventId]', 'host#confirmer', 'confirmer'],
		['GET|POST', '/retirer/[i:userId]/[i:eventId]', 'host#retirer', 'retirer'],
		['GET|POST', '/delete-event/[i:id]', 'host#deleteEvent', 'delete_event'],

	);