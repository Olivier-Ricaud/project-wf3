<?php $this->layout('layout', ['title' => 'Accueil Profil']) ?>

<?php $this->start('main_content') ?>
<main class= container-fluid>
	
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3">
          <h1>Mes événements</h1>
        </div>
    </div>
	
	<div class="row">
		<!-- SECTION RESUME DE PROFIL -->
		<aside class="col-sm-3" id="profil">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="list-group-item-heading">Profil</h4>
				</div>
				
				<div class="panel-body">
					 <img src="<?= $this->assetUrl('avatars/'.$this->e($_SESSION['user']['id']).'.jpg') ?>" alt="photo de profil" class="img-circle" data-toggle="dropdown" width="150" height="150">
					 <p><i class="fa fa-user" aria-hidden="true"></i> <?= $this->e($_SESSION['user']['username']) ?> </p>
					 <p><?= $this->e($_SESSION['user']['infos']['prenom']) ?> <?= $this->e($_SESSION['user']['infos']['nom']) ?></p>
					 <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $this->e($_SESSION['user']['infos']['departement']) ?></p>
					 <p><?= $this->e($_SESSION['user']['infos']['niveau']) ?></p>
					 <p><a href="<?= $this->url('profil')?>">Mes événements</a></p>
					 <p><a href="<?= $this->url('profil_editer', ['id' => $_SESSION['user']['id']])?>">Editer mon profil</a></p>
				</div>
			</div> <!-- End div panel-->		
		</aside>
		<!-- FIN DE SECTION RESUME DE PROFIL -->
			
		<!-- SECTION EVENEMENTS A VENIR -->
		<section class="col-sm-9">
			<h2>Mes événements à venir</h2>
				<!-- Affichage par événement -->
				<?php foreach ($events as $event): ?>	
					<figure class="col-sm-10 col-sm-offset-1">
						<div class="row">
							<a href="<?= $this->url('detail', ['id' => $event['id']])?>">
								<div class="col-xs-6">
									<img src="assets/img/arena3.png" alt="image de l'event">
								</div>
							</a>
							<div class="col-xs-6">
								<p>Titre : <?= $this->e($event['titre']) ?></p>
								<p>Date : <?= $this->e($event['date']) ?></p>
								<p>Catégorie : <?= $this->e($event['sexe']) ?></p>
								<p>Niveau demandé : <?= $this->e($event['niveau']) ?></p>
								<p>Adresse : <?= $this->e($event['adresse']) ?></p>
								<p>Ville : <?= $this->e($event['ville']) ?></p>
								<p>Code postal : <?= $this->e($event['cp']) ?></p>
								<p><a href="<?= $this->e($event['site_web'])?>" target="_blank">Site internet de la salle</a></p>
							</div> 
						</div>
					</figure>
				<?php endforeach; ?>
		</section>
	</div> <!-- end of row -->
	<!-- FIN SECTION EVENEMENTS A VENIR -->
	
	<!-- SECTION EVENEMENTS TERMINES -->
	<div class="row">
		<section class="col-sm-9 col-sm-offset-3">
			<h2>Mes événements terminés</h2>

				<figure class="col-sm-10 col-sm-offset-1">
					<div class="row">
						<a href="index.php?page=detail">
							<div class="col-xs-6">
								<img src="assets/img/terrainExterieur.jpg" alt="image de l'event">
							</div>
						</a>
						<div class="col-xs-6">
							<p>Titre de l'événement</p>
							<p>Lieu / date </p>
							<p>Nombre de joueurs inscrits 1/10</p>
						</div> 
					</div>
				</figure>

				<figure class="col-sm-10 col-sm-offset-1">
					<div class="row">
						<a href="index.php?page=detail">
							<div class="col-xs-6">
								<img src="assets/img/arena3.png" alt="image de l'event">
							</div>
						</a>
						<div class="col-xs-6">
							<p>Titre de l'événement</p>
							<p>Lieu / date </p>
							<p>Nombre de joueurs inscrits 1/10</p>
						</div> 
					</div>
				</figure>

				<figure class="col-sm-10 col-sm-offset-1">
					<div class="row">
						<a href="index.php?page=detail">
							<div class="col-xs-6">
								<img src="assets/img/terrainExterieur.jpg" alt="image de l'event">
							</div>
						</a>
						<div class="col-xs-6">
							<p>Titre de l'événement</p>
							<p>Lieu / date </p>
							<p>Nombre de joueurs inscrits 1/10</p>
						</div> 
					</div>
				</figure>
		</section>
	</div> <!-- end of row -->
	<!-- FIN SECTION EVENEMENTS TERMINES -->
	

</main> <!-- End of container-fluid-->
<?php $this->stop('main_content') ?>