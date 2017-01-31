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
					<img src="<?= ( file_exists('assets/avatars/'.$this->e($_SESSION['user']['id']).'.jpg') )? $this->assetUrl('avatars/'.$this->e($_SESSION['user']['id']).'.jpg') : $this->assetUrl('avatars/default.jpg') ?>" alt="profile picture" class="img-circle dropdown-toggle" data-toggle="dropdown" height="150" width="150"></a>
					<i class="fa fa-user fa-2x" aria-hidden="true"></i> 
					<p><?= $this->e($_SESSION['user']['username']) ?></p>
					<p><?= $this->e($_SESSION['user']['infos']['prenom']) ?> <?= $this->e($_SESSION['user']['infos']['nom']) ?></p>
					<i class="fa fa-map-marker fa-2x" aria-hidden="true"></i> 
					<p><?= $this->e($_SESSION['user']['infos']['departement']) ?></p>
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
					<div class="row">
						<figure class="col-sm-10 col-sm-offset-1">
							<div class="col-xs-4">
								<a href="<?= $this->url('detail', ['id' => $event['event_id']])?>">
									<img class="img-circle img-responsive" src="<?= $this->assetUrl('salle/'.$this->e($event['salle_id']).'.jpg') ?>">
								</a>
								<p><a href="<?= $this->e($event['site_web'])?>" target="_blank"><?= $this->e($event['nom'])?></a></p>
							</div>

							<div class="col-xs-8">
								<h3><?= $this->e($event['titre']) ?></h3>
							</div>

							<div class="col-xs-4">
								<p>Adresse : <?= $this->e($event['adresse']) ?> <?= $this->e($event['cp']) ?> - <?= $this->e($event['ville']) ?></p>
								<p>Places : <span><?= ($this->e($event['nbrs_joueurs'] == 10))? 'FULL !' : $this->e($event['nbrs_joueurs']).'</span> / 10' ?></p>
							</div>
							<div class="col-xs-4">
								<p>Le <?= $this->e($event['date']) ?></p>
								<p>Catégorie : <?= $this->e($event['sexe']) ?></p>
								<p>Niveau demandé : <?= $this->e($event['niveau']) ?></p>
							</div> 
						</figure>
					</div>
				<?php endforeach; ?>
		</section>
	</div> <!-- end of row -->
	<!-- FIN SECTION EVENEMENTS A VENIR -->
	
	<!-- SECTION EVENEMENTS TERMINES -->
	<div class="row">
		<section class="col-sm-9 col-sm-offset-3">
			<h2>Mes événements terminés</h2>
				<!-- Affichage par événement -->
				<?php foreach ($matchs_over as $match_over): ?>	
					<figure class="col-sm-10 col-sm-offset-1">
						<div class="row">
							<a href="<?= $this->url('detail', ['id' => $matchs_over['0']['id']])?>">
								<div class="col-xs-6">
									<img src="<?= $this->assetUrl('salle/'.$this->e($matchs_over['0']['photo']).'.jpg') ?>">
								</div>
							</a>
							<div class="col-xs-6">
								<p>Titre : <?= $this->e($matchs_over['0']['titre']) ?></p>
								<p>Date : <?= $this->e($matchs_over['0']['date']) ?></p>
								<p>Catégorie : <?= $this->e($matchs_over['0']['sexe']) ?></p>
								<p>Niveau demandé : <?= $this->e($matchs_over['0']['niveau']) ?></p>
								<p>Adresse : <?= $this->e($matchs_over['0']['adresse']) ?></p>
								<p>Ville : <?= $this->e($matchs_over['0']['ville']) ?></p>
								<p>Code postal : <?= $this->e($matchs_over['0']['cp']) ?></p>
								<p><a href="<?= $this->e($matchs_over['0']['site_web'])?>" target="_blank">Site internet de la salle</a></p>
							</div> 
						</div>
					</figure>
				<?php endforeach; ?>
		</section>
	</div> <!-- end of row -->
	<!-- FIN SECTION EVENEMENTS TERMINES -->
	

</main> <!-- End of container-fluid-->
<?php $this->stop('main_content') ?>