<?php
	
	$w_routes = array(
		['GET|POST', '/', 'Default#home', 'home'],
		['GET|POST', '/recherche', 'Default#recherche', 'recherche'],
		['GET', '/cgu', 'Default#cgu', 'cgu'],
		['GET', '/charte', 'Default#charte', 'charte'],
		['GET', '/contact', 'Default#contact', 'contact'],

		['GET|POST', '/login', 'user#login', 'login'],
		['GET|POST', '/logout', 'user#logout', 'logout'],
		['GET|POST', '/register', 'user#register', 'register'],
		['GET|POST', '/delete/[i:id]', 'user#delete', 'delete'],
		['GET', '/profil', 'user#profil', 'profil'],
		['GET|POST', '/profil-editer/[i:id]', 'user#profilEditer', 'profil_editer'],

		['GET|POST', '/creer', 'event#creer', 'creer'],
		['GET|POST', '/salle-detail/[i:id]', 'event#salleDetail', 'salle_detail'],
		['GET|POST', '/detail/[i:id]', 'event#detail', 'detail'],
		['GET|POST', '/participer/[i:id]', 'event#participer', 'participer'],
		['GET', '/feuille-de-match', 'event#feuilleMatch', 'feuille_match']

	);