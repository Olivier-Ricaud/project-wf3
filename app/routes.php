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
		['GET', '/profil', 'user#profil', 'profil'],
		['GET|POST', '/profil-editer', 'user#profil_editer', 'profil_editer'],

		['GET|POST', '/creer', 'event#creer', 'creer'],
		['GET|POST', '/detail', 'event#detail', 'detail'],
		['GET', '/feuille-de-match', 'event#feuille_match', 'feuille_match'],




	);