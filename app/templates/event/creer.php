<?php $this->layout('layout', ['title' => 'Organiser un match']) ?>

<?php $this->start('main_content') ?>
<!-- Page de création d'événement -->
<main class="container-fluid">

	<div class="row">
		<div class="col-sm-9 col-sm-offset-2">
			<h1>Création d'événement</h1>
		</div>
	</div> <!-- End of row h1-->

	<div class="row">
		<!-- Formulaire de création d'événement -->
		<form class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
			
			<div class="form-group row">
				<label for="titre" class="col-sm-3 col-form-label">Titre de l'événement</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="titre" name="titre" placeholder="...">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="datetime-local" class="col-sm-3 col-form-label">Date</label>
				<div class="col-sm-9">
					<input type="date" class="form-control" id="date" name="date" placeholder="...">
				</div>
			</div>
			<!-- Lieu et Tarif -->
			<div class="form-group row row">
				<label for="lieu" class="col-xs-1 col-sm-3 col-form-label">Lieu</label>
				<div class="col-xs-7 col-sm-6">
					<input list="lieu" type="text" class="form-control" id="lieu" name="lieu" placeholder="...">
					<datalist id="lieu">
						<option value="75 - Paris">
						<option value="91 - Corbeil">
						<option value="92 - Sceaux">
						<option value="94 - Créteil">
					</datalist>
				</div>
				
				<label for="tarif" class="col-xs-1 col-form-label">Tarif</label>
				<div class="col-xs-3 col-sm-2">
					<input type="text" class="form-control" id="tarif" name="tarif" placeholder="...">
				</div>
			</div> <!-- End row -->
			
			<div class="form-group row">
				<label for="description" class="col-sm-3 col-form-label">Description</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="description" name="description" placeholder="...">
				</div>
			</div>
			<hr>
			<div class="form-group row">
				<label for="niveau" class="col-sm-3 col-form-label">Niveau</label>
				<div class="col-sm-9">
					<select class="form-control" id="niveau" name="niveau">
						<option>Débutant</option>
						<option>Intermédiaire</option>
						<option>Confirmé</option>
					</select>		  		 
				</div>
			</div>

			<div class="form-group row">
				<label for="sexe" class="col-sm-3 col-form-label">Sexe recherché</label>
				<div class="col-sm-9">
					<select class="form-control" id="sexe" name="sexe">
						<option>Mixte</option>
						<option>Homme</option>
						<option>Femme</option>
					</select>		  		 
				</div>
			</div>
			<div class="form-group row">
				<label for="duree" class="col-sm-3 col-form-label">Durée</label>
				<div class="col-sm-9">
					<select class="form-control" id="duree" name="duree">
						<option>1h</option>
						<option>2h</option>
					</select>		  		 
				</div>
			</div>
			<div class="col-sm-2 col-sm-offset-4">
				<button type="submit" name="create" class="btn btn-primary">Créer</button>
			</div> 

			<div class="col-sm-2 col-sm-offset-1">
				<button type="reset" class="btn btn-default">Annuler</button>
			</div> 
		</form>
	</div> <!-- End row -->
</main>
<?php $this->stop('main_content') ?>
