<!DOCTYPE html>
<html lang="fr">
<head>

	<meta charset="UTF-8">

	<title>header Template W5</title>
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar">
	<header>
		<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#page-top">WeFive</a>
				</div> <!-- EndNavbar header-->

				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="#accueil">Accueil</a></li>
						<li><a href="#service">Fonctionnalités</a></li>
						<li><a href="#equipe">Qui sommes-nous ?</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?= $this->url('register')?>"> <span class="glyphicon glyphicon-user"></span> je m'inscris</a></li>
						<li><a href="<?= $this->url('login')?>"> <span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
					</ul>
				</div> <!-- End collapse navbar-->
			</div> <!-- End container-fluid-->
		</nav>
	</header>

	<main  id="plaquette" class="container-fluid">
		<section id="accueil" class="row">
			<div class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" role="listbox">	
					<div class="item active">
						<img src="assets/img/futsal1.jpg" alt="Football field one">
					</div>

					<div class="item">
						<img src="assets/img/futsal2.jpg" alt="Football field two">
					</div>

					<div class="item">
						<img src="assets/img/futsal3.jpg" alt="Football field three">
					</div>
				</div> <!-- End carousel inner-->
			</div> <!-- End  carousel slide-->
			
			<div class="title">
				<div class="col-xs-12">
					<h1>WeFive</h1>
				</div>

				<div class="col-xs-12">
					<button class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Je m'inscris</button>
				</div>

				<div class="col-xs-12">
					<button class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Je me connecte</button>
				</div>
			</div>	
		</section>

		<section id="service" class="row">
			<h2>Services</h2>

			<div class="col-sm-4">
				<h3><i class="fa fa-sign-in" aria-hidden="true"></i> Créer ou participer</h3>
				<p>Créer ou participe à un match de futsal.</p>
			</div>

			<div class="col-sm-4">
				<h3><i class="fa fa-street-view" aria-hidden="true"></i></i> Localisation</h3>
				<p>Localise un événément qui est dans ta région.</p>
			</div>

			<div class="col-sm-4">
				<h3><i class="fa fa-newspaper-o" aria-hidden="true"></i> Discutez</h3>
				<p>Chat avec les autres membres d'un événement pour vous organisez.</p>
			</div>
		</section>

		<section id="equipe" class="row">
			<h2>L'équipe</h2>

			<div class="col-sm-6">
				<img class="img-circle" src="" alt="photo de profil de l'equipe">
				<p>Olivier Ricaud</p>
				<a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i> Profil LinkedIn</a>
			</div>

			<div class="col-sm-6">
				<img class="img-circle" src="" alt="photo de profil de l'equipe">
				<p>Alexandre Hak</p>
				<a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i> Profil LinkedIn</a>
			</div>

			<div class="col-sm-6">
				<img class="img-circle" src="" alt="photo de profil de l'equipe">
				<p>Julien Lombard</p>
				<a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i> Profil LinkedIn</a>
			</div>

			<div class="col-sm-6">
				<img class="img-circle" src="" alt="photo de profil de l'equipe">
				<p>Thomas Piussan</p>
				<a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i> ProfilLinkedIn</a>
			</div>
		</section>
		
		<section id="contact" class="row">
			<h2>Contact</h2>

			<form class="col-xs-10 col-xs-offset-1">
				<fieldset class="col-md-6">
					<div class="form-group row">
						<label for="nom" class="col-xs-12 col-sm-2 col-form-label">Nom </label>
						<div class="col-xs-12 col-sm-8">
							<input type="text" class="form-control" id="nom" name="nom" aria-describedby="Champ nom de l'utilisateur" placeholder="Votre nom...">
						</div>
					</div>

					<div class="form-group row">
						<label for="prenom" class="col-xs-12 col-sm-2 col-form-label">Prenom </label>
						<div class="col-xs-12 col-sm-8">
							<input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="Champ prenom de l'utilisateur" placeholder="Votre prenom...">
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-xs-12 col-sm-2 col-form-label">E-mail </label>
						<div class="col-xs-12 col-sm-8">
							<input type="email" class="form-control" id="email" name="email" aria-describedby="Champ email de l'utilisateur" placeholder="Votre Email...">
						</div>
					</div>
				</fieldset>

				<fieldset class="col-md-6">
					<div class="form-group row">
						<label for="sujet" class="col-xs-12 col-sm-2 col-form-label">Sujet</label>
						<div class="col-xs-12 col-sm-8">
							<input type="text" class="form-control" id="sujet" name="sujet" aria-describedby="Champ mot de passe de l'utilisateur" placeholder="Sujet du message">
						</div>
					</div>

					<div class="form-group row">
						<label for="message" class="col-xs-12 col-sm-2 col-form-label">Message </label>
						<div class="col-xs-12 col-sm-8">
							<textarea type="message" class="form-control" id="message" name="message" placeholder="Votre message..." rows="10" maxlength="5000"></textarea>
						</div>
					</div>

					<div class="col-sm-2 col-sm-offset-4 col-md-offset-3">
						<button type="submit" name="send" class="btn btn-primary">Envoyer</button>
					</div> 

					<div class="col-sm-2 col-md-offset-1">
						<button type="reset" class="btn btn-default">Annuler</button>
					</div> 
				</fieldset>
			</form>
		</section>
	</main>

	<!-- Footer -->
	<footer class="footer text-center">
		<div class="footer-above">
			<div class="container">
				<div class="row">
					<div class="footer-col col-sm-4">
						<p><a href="#">CGU</a></p>
						<p><a href="#">Charte de confidentialité</a></p>
					</div>

					<div class="footer-col col-sm-4">
						<p><a href="#">Mentions légales</a></p>
						<p><a href="#">Nous contacter</a></p>
					</div>

					<div class="footer-col col-sm-4">
						<p>Nombre d'inscrits</p>
						<p>Nombre d'événements</p>
					</div>
				</div> <!-- End Row -->
			</div> <!-- End container -->
		</div>  <!-- End Footer-above -->

		<div class="footer-below">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<a href="#" class="btn-social btn-outline"> <i class="fa fa-fw fa-facebook fa-3x"></i></a>
						<a href="#" class="btn-social btn-outline"> <i class="fa fa-fw fa-google-plus fa-3x"></i></a>          
						<a href="#" class="btn-social btn-outline"> <i class="fa fa-fw fa-twitter fa-3x"></i></a>              
						<a href="#" class="btn-social btn-outline"> <i class="fa fa-fw fa-linkedin fa-3x"></i></a>
						<a href="#" class="btn-social btn-outline"> <i class="fa fa-fw fa-dribbble fa-3x"></i></a>
						<p>Copyright &copy; 2016 - Webforce3 Project</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- JQuery CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- BootStrap JS CDN -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="assets/js/script.js"></script>

</body>
</html>