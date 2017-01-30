<?php $this->layout('layout', ['title' => 'Home']) ?>

<?php $this->start('main_content') ?>
<main class="container-fluid">
	<div class="row">
		<h1>Recherche d'Evénements</h1>
        <?php if (!empty($erreurs)): ?>
			<ul class="alert alert-danger">
				<?php foreach ($erreurs as $erreur): ?>
					<li> <?= $erreur ?> </li>
				<? endforeach; ?>
			</ul>
		<? endif; ?>
	</div>

		<!-- Formulaire -->
	<div class="row">
		<section class="col-md-5">
			<form class="form-horizontal" id="formRecherche" method="GET">
				<div class="form-group row">
					<label for="departement" class="col-sm-4 col-form-label">Département </label>
					<div class="col-sm-8">
						<select class="form-control"  name="departement" id="departement">
							<?php 	if(isset($_GET['departement'])): ?>
								<option value="<?= $_GET['departement'] ; ?>"> <?= $_GET['departement'] ; ?></option>
							<?php 	endif; ?>
							<option value="">Choisissez un département...</option>
							<option value="Paris">75 - Paris</option>
							<option value="Val-d-Oise">95 - Val-d-Oise</option>
						</select>
					</div>	
				</div>

				<div class="form-group row">
					<label for="date" class="col-sm-4 col-form-label">Date de début</label>
					<div class="col-sm-8">
						<input type="date" class="form-control" name="date_debut" value="<?php if(isset($_GET['date_debut'])) echo $_GET['date_debut'] ; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="date" class="col-sm-4 col-form-label">Date de fin</label>
					<div class="col-sm-8">
						<input type="date" class="form-control" name="date_fin" value="<?php if(isset($_GET['date_fin'])) echo $_GET['date_fin'] ; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="niveau" class="col-sm-4 col-form-label">Niveau</label>
					<div class="col-sm-8">
						<select class="form-control" id="niveau" name="niveau">
							<?php 	if(isset($_GET['niveau'])): ?>
								<option value="<?= $_GET['niveau'] ; ?>"> <?= $_GET['niveau'] ; ?></option>
							<?php 	endif; ?>
							<option value="">Selectionnez un niveau... </option>
							<option value="Débutant">Débutant</option>
							<option value="Intermédiaire">Intermédiaire</option>
							<option value="Confirmé">Confirmé</option>
							<option value="Tout niveaux">Tout niveaux</option>
						</select>		  		 
					</div>
				</div>

				<div class="form-group row">
					<label for="sexe" class="col-sm-4 col-form-label">Sexe</label>
					<div class="col-sm-8">
						<select class="form-control" id="sexe" name="sexe">
							<?php 	if(isset($_GET['sexe'])): ?>
								<option value="<?= $_GET['sexe'] ; ?>"> <?= $_GET['sexe'] ; ?></option>
							<?php 	endif; ?>
							<option value="">Choisissez un genre...</option>						
							<option value="Homme">Homme</option>
							<option value="Femme">Femme</option>
							<option value="Mixte">Mixte</option>
						</select>		  		 
					</div>
				</div>

				<div class="form-group row">
					<label for="duree" class="col-sm-4 col-form-label">Durée</label>
					<div class="col-sm-8">
						<select class="form-control" id="duree" name="duree">
							<option value="">Choisissez une durée...</option>
							<option value="01:00">1h</option>
							<option value="02:00">2h</option>
						</select>		  		 
					</div>
				</div>

				<div class="form-group row">
						<button type="submit" name="search" class="btn btn-primary">Rechercher</button>
				</div>
			</form>
		</section> <!-- End col-md-5 -->

		<!-- Asides -->
		<aside class="col-md-5 col-md-offset-2">
			<div id="aside">
				<a href="<?= $this->url('creer')?>" class="btn btn-primary">Créer Match</a>
				<!-- Premier Panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="list-group-item-heading">Résultats des derniers matchs :</h4>
					</div>
					
					<table class="table table-striped table-hover">
						<tbody>
							<tr>
								<td>28/12/2016</td>
								<td>Paris</td>   
								<td>3-2</td>
					 			<td>Gagné</td> 
							</tr>
						</tbody>
					</table> 
				</div> <!-- End div panel-->
				<!-- Deuxième Panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="list-group-item-heading">Prochain(s) rdv(s) :</h4>
					</div>

					<!-- Affichage par événement -->
					<!-- Fonction JQuery pour faire réagir la ligne au clique -->
					<?php foreach ($nextRdvs as $nextRdv): ?>
						<table class="table table-striped table-hover">
							<tbody data-link="row" class="rowlink">	
							<tr>
								<td><a href="<?= $this->url('detail', ['id' => $nextRdv['event_id']])?>"><?= $this->e($nextRdv['titre']) ?></a></td>
								<td><?= $this->e($nextRdv['date']) ?></td>
								<td><?= $this->e($nextRdv['heure']) ?></td>
								<td><?= $this->e($nextRdv['ville']) ?></td>
							</tr>
							</tbody>
						</table> 
					<?php endforeach; ?>
				</div> <!-- End div panel -->
			</div>
		</div> <!-- End col-sm-5 End col-sm-offset-2 -->
	</div> <!-- End row -->

	<!-- Liste événement(s) -->
	<div class="row">
		<section class="col-sm-10 col-sm-offset-1">
			<h2>Liste des résultats</h2>
			
			<?php if(isset($_GET['search']) && empty($erreurs)): ?>
				
				<!-- Affichage par événement -->
				<?php foreach ($events as $event): ?>	
					<div class="row">
						<figure class="col-sm-10 col-sm-offset-1">
							<div class="col-xs-4">
								<a href="<?= $this->url('detail', ['id' => $event['id']])?>">
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
			<?php endif; ?>
		</section>
	</div> <!-- End row Liste événement(s) -->

	<!-- Debut Pagination -->
	<div class="row">
			<ul class="pagination pagination-sm">
				<li><a href="#">&laquo;</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">&raquo;</a></li>
			</ul>
	</div> <!-- End Pagination row -->
</main>
<?php $this->stop('main_content') ?>
