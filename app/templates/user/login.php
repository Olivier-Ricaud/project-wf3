<?php $this->layout('layout2', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
<main class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<h1>Connexion</h1>
		</div>
	</div> <!-- End of row h1-->
	
	<div class="row">
		<form class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2" method="POST">
			<div class="form-group row">
				<label for="email" class="col-xs-12 col-sm-2 col-form-label">Adresse E-mail </label>
				<div class="col-xs-12 col-sm-8">
					<input type="email" class="form-control" id="email" name="form_login[email]" aria-describedby="Champ email de l'utilisateur" placeholder="Votre Email...">
				</div>
			</div>

			<div class="form-group row">
				<label for="password" class="col-xs-12 col-sm-2 col-form-label">Mot de Passe </label>
				<div class="col-xs-12 col-sm-8">
					<input type="password" class="form-control" id="password" name="form_login[password]" aria-describedby="Champ mot de passe de l'utilisateur" placeholder="Votre mot de passe...">
				</div>
			</div>

			<div class="form-group">
				<div class="checkbox">
					<input type="checkbox" name="form_login[remember]"> Se souvenir de moi
				</div>
			</div>

			<div class="col-md-2 col-md-offset-4">
				<button type="submit" name="login" class="btn btn-primary">Se connecter</button>
			</div> 

			<div class="col-md-2">
				<button type="reset" class="btn btn-default">Annuler</button>
			</div> 
		</form>
	</div>  <!-- End of row form-->
</main> <!-- End of main-->
<?php $this->stop('main_content') ?>


