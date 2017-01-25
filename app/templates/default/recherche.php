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
					<label for="lieu" class="col-sm-4 col-form-label">Département </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="lieu" name="departement" list="departement">
						<datalist id="departement">
							<option value="<?php if(isset($_GET['departement'])) echo $_GET['departement'] ; ?>"><?php if(isset($_GET['departement'])) echo $_GET['departement'] ; ?></option>
							<option value="Paris">75 - Paris</option>
							<option value="Val-d-Oise">95 - Val-d-Oise</option>
						</datalist>
					</div>	
				</div>

				<div class="form-group row">
					<label for="date" class="col-sm-4 col-form-label">Dates</label>
					<div class="col-sm-8">
						<input type="date" class="form-control" name="date_debut" placeholder="..." value="<?php if(isset($_GET['date_debut'])) echo $_GET['date_debut'] ; ?>">
						<input type="date" class="form-control" name="date_fin" placeholder="..." value="<?php if(isset($_GET['date_fin'])) echo $_GET['date_fin'] ; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="niveau" class="col-sm-4 col-form-label">Niveau</label>
					<div class="col-sm-8">
						<select class="form-control" id="niveau" name="niveau">
							<option value="<?php if(isset($_GET['niveau'])) echo $_GET['niveau'] ; ?>"><?php if(isset($_GET['niveau'])) echo $_GET['niveau'] ; ?></option>
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
							<option value="<?php if(isset($_GET['sexe'])) echo $_GET['sexe'] ; ?>"><?php if(isset($_GET['sexe'])) echo $_GET['sexe'] ; ?></option>
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
							<option></option>
							<option value="01:00">1h</option>
							<option value="02:00">2h</option>
						</select>		  		 
					</div>
				</div>

				<div class="form-group row">
						<button type="reset" class="btn btn-default">Reset</button>
						<button type="submit" name="search" class="btn btn-primary">Rechercher</button>
				</div>
			</form>
		</section> <!-- End col-md-5 -->

		<!-- Asides -->
		<aside class="col-md-5 col-md-offset-2">
			<div id="aside">
				<a href="index.php?page=creer" class="btn btn-primary">Créer Match</a>
				<!-- Premier Panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="list-group-item-heading">Résultats des Derniers Matchs :</h4>
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
						<h4 class="list-group-item-heading">Prochain(s) Rdv(s) :</h4>
					</div>
				
					<table class="table table-striped table-hover">
						<tbody data-link="row" class="rowlink">
							<tr> <!-- Fonction JQuery pour faire réagir la ligne au clique --> 
								<td><a href="index.php?page=detail">28/12/2016</a></td>
								<td>Paris</td>
							</tr>
						</tbody>
					</table> 
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
