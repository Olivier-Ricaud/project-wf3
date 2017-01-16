<?php $this->layout('layout', ['title' => 'Editer Profil']) ?>

<?php $this->start('main_content') ?>
<main class= container-fluid>
	
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3">
          <h1>Détails du profil</h1>
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
					 <img src="assets/img/Anais1.jpg" alt="photo de profil" class="img-circle" data-toggle="dropdown" width="150" height="150">
					 <p><i class="fa fa-user" aria-hidden="true"></i> Pseudo</p>
					 <p>Nom / Prénom</p>
					 <p><i class="fa fa-map-marker" aria-hidden="true"></i> Lieu</p>
					 <p>Niveau de joueur</p>
					 <p>Sexe / Age</p>
					 <p><a href="<?= $this->url('profil')?>">Mes événements</a></p>
					 <p><a href="<?= $this->url('profil_editer')?>">Editer mon profil</a></p>
				</div>
			</div> <!-- End div panel-->		
		</aside>
		<!-- FIN DE SECTION RESUME DE PROFIL -->
		
		<!-- SECTION FORMULAIRE DE MODIFICATION DES DONNEES UTILISATEUR -->
		<section class="col-sm-9">
			<form class="col-sm-10 col-sm-offset-1">
				<div class="form-group row">
					<label for="nom" class="col-md-2 col-form-label">Nom </label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="nom" name="nom" aria-describedby="Champ nom de l'utilisateur" placeholder="Nom de l'utilisateur">
					</div>
				</div>

				<div class="form-group row">
					<label for="prenom" class="col-md-2 col-form-label">Prenom </label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="Champ prenom de l'utilisateur" placeholder="Prenom de l'utilisateur">
					</div>
				</div>

				<div class="form-group row">
					<label for="pseudo" class="col-md-2 col-form-label">Pseudo</label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="pseudo" name="pseudo" aria-describedby="Champ pseudo de l'utilisateur" placeholder="Pseudo de l'utilisateur">
					</div>
				</div>

				<div class="form-group row">
					<label for="photo" class="col-md-2 col-form-label">Photo de profil</label>
					<div class="col-md-10">
						<input type="file" class="form-control-file" id="photo" name="photo" aria-describedby="Champ file pour insérer une photo de profil">
					</div>
					<small name="photo" class="form-text text-muted col-md-6 col-md-offset-2">Détails concernant la photo de profil</small>
				</div>

				<div class="form-group row">
					<label for="date_naissance" class="col-md-2 col-form-label">Date de naissance </label>
					<div class="col-md-10">
						<input type="date" class="form-control" id="date_naissance" name="date_naissance" aria-describedby="Champ date de naissance de l'utilisateur">
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-md-2 col-form-label">Email </label>
					<div class="col-md-10">
						<input type="email" class="form-control" id="email" name="email" aria-describedby="Champ Email de l'utilisateur" placeholder="Email de l'utilisateur">
					</div>
					<small name="email" class="form-text text-muted col-md-6 col-md-offset-4">On ne partage votre Email avec personne.</small>
				</div>

				<div class="form-group row">
					<label for="lieu" class="col-md-2 col-form-label">Votre département </label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="lieu" name="lieu" list="departement">
						<datalist id="departement">
							<option value="75 - Paris"></option>
							<option value="95 - Val-d-Oise"></option>
						</datalist>
					</div>	
					<small name="lieu" class="form-text text-muted col-md-6 col-md-offset-2">Renseigner votre département nous permet de vous afficher les événements dans votre région.</small>
				</div>


				<div class="form-group row">
					<label for="level" class="col-md-2 col-form-label">Niveau du joueur</label>
					<div class="col-md-10">
						<select class="form-control" id="level" name="level">
							<option value="debutant">Débutant</option>
							<option value="intermediaire">Intermédiaire</option>
							<option value="confirme">Confirmé</option>
						</select>
					</div>
				</div>
				
				<fieldset class="form-group row">
					<label for="sexe" class="col-md-2 col-form-label">Sexe</label>
					<label class="form-check-inline col-md-4 col-md-offset-1">
						<input type="radio" class="form-check-input" id="sexe" name="sexe" value="Homme" checked> Homme  
					</label>
					<label class="form-check-inline col-md-4 col-md-offset-1">
						<input type="radio" class="form-check-input" id="sexe" name="sexe" value="Femme"> Femme
					</label>
				</fieldset>


			    <div class="form-group row">
					<label for="password" class="col-md-2 col-form-label">Nouveau mot de Passe</label>
					<div class="col-md-10">
						<input type="password" class="form-control" id="password" name="password" placeholder="Votre nouveau mot de passe">
					</div>
			    </div>

			    <div class="form-group row">
				  	<label for="confirm_password" class="col-md-2 col-form-label">Confirmation</label>
				  	<div class="col-md-10">
				  		<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmation du nouveau mot de passe">
				  	</div>
			    </div>

			  	<div class="col-md-4 col-md-offset-3">
			  		<button type="submit" name="update" class="btn btn-primary">Mettre à jour votre profil</button>
			  	</div>

			  	<div class="col-md-4">
			  		<button type="submit" class="btn btn-primary">Supprimer votre compte</button>
			  	</div>	
			</form>
		</section>
		<!-- FIN DU FORMULAIRE DE MODIFICATION -->
	</div> <!-- End of row -->

</main> <!-- End of container-fluid-->
<?php $this->stop('main_content') ?>