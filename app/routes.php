<?php
	
	$w_routes = array(
		['GET|POST', '/', 'Default#home', 'home'],
		['GET', '/plaquette', 'Default#plaquette', 'plaquette'],
		['GET', '/cgu', 'Default#cgu', 'cgu'],
		['GET', '/charte', 'Default#charte', 'charte'],
		['GET', '/contact', 'Default#contact', 'contact'],

		['GET|POST', '/connexion', 'user#connexion', 'connexion'],
		['GET|POST', '/inscription', 'user#inscription', 'inscription'],
		['GET', '/profil', 'user#profil', 'profil'],
		['GET|POST', '/profil-editer', 'user#profil_editer', 'profil_editer'],

		['GET|POST', '/creer', 'event#creer', 'creer'],
		['GET|POST', '/detail', 'event#detail', 'detail'],
		['GET', '/feuille-de-match', 'event#feuille_match', 'feuille_match'],




	);