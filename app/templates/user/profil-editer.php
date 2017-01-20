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
		
		<!-- SECTION FORMULAIRE DE MODIFICATION DES DONNEES UTILISATEUR -->
		<section class="col-sm-9">
			<form class="col-sm-10 col-sm-offset-1" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="form_update_util[user_id]" value="<?= $this->e($_SESSION['user']['infos']['user_id']) ?>">

				<div class="form-group row">
					<label for="nom" class="col-md-2 col-form-label">Nom </label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="nom" name="form_update_util[nom]" placeholder="Nom de l'utilisateur" value="<?= $this->e($_SESSION['user']['infos']['nom']) ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="prenom" class="col-md-2 col-form-label">Prenom </label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="prenom" name="form_update_util[prenom]" placeholder="Prenom de l'utilisateur" value="<?= $this->e($_SESSION['user']['infos']['prenom']) ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="pseudo" class="col-md-2 col-form-label">Pseudo</label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="pseudo" name="form_update_user[username]" placeholder="Pseudo de l'utilisateur" value="<?= $this->e($_SESSION['user']['username']) ?>">
					</div>
				</div>
 
				<div class="form-group row">
					<label for="photo" class="col-md-2 col-form-label">Photo de profil</label>
					<div class="col-md-10">
						<input type="file" class="form-control-file" id="photo" name="avatar" aria-describedby="Champ file pour insérer une photo de profil">
					</div>
					<small name="photo" class="form-text text-muted col-md-6 col-md-offset-2">Détails concernant la photo de profil</small>
				</div> 

				<div class="form-group row">
					<label for="email" class="col-md-2 col-form-label">Email </label>
					<div class="col-md-10">
						<input type="email" class="form-control" id="email" name="form_update_user[email]" placeholder="Email de l'utilisateur" value="<?= $this->e($_SESSION['user']['email']) ?>">
					</div>
					<small name="email" class="form-text text-muted col-md-6 col-md-offset-4">On ne partage votre Email avec personne.</small>
				</div>

				<div class="form-group row">
					<label for="lieu" class="col-md-2 col-form-label">Votre département </label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="lieu" name="form_update_util[departement]" list="departement" value="<?= $this->e($_SESSION['user']['infos']['departement']) ?>">
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
						<select class="form-control" id="level" name="form_update_util[niveau]">
							<option value="debutant">Débutant</option>
							<option value="intermediaire">Intermédiaire</option>
							<option value="confirme">Confirmé</option>
						</select>
					</div>
				</div>
				
				<fieldset class="form-group row">
					<label for="sexe" class="col-md-2 col-form-label">Sexe</label>
					<label class="form-check-inline col-md-4 col-md-offset-1">
						<input type="radio" class="form-check-input" id="sexe" name="form_update_util[sexe]" value="Homme" checked> Homme  
					</label>
					<label class="form-check-inline col-md-4 col-md-offset-1">
						<input type="radio" class="form-check-input" id="sexe" name="form_update_util[sexe]" value="Femme"> Femme
					</label>
				</fieldset>


			    <div class="form-group row">
					<label for="password" class="col-md-2 col-form-label">Nouveau mot de Passe</label>
					<div class="col-md-10">
						<input type="password" class="form-control" id="password" name="form_update_user[password]" placeholder="Votre nouveau mot de passe">
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
			  		<a class="btn btn-primary" href="<?= $this->url('delete', ['id' => $_SESSION['user']['id']] )?>">Supprimer votre compte</a>
			  	</div>	
			</form>
		</section>
		<!-- FIN DU FORMULAIRE DE MODIFICATION -->
	</div> <!-- End of row -->

</main> <!-- End of container-fluid-->
<?php $this->stop('main_content') ?>