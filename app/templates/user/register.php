<?php $this->layout('layout2', ['title' => 'inscription']) ?>

<?php $this->start('main_content') ?>
<main class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-2">
			<h1>Inscription</h1>
		</div>
	</div> <!-- End of row h1-->
	
	<div class="row">
		<form class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2" method="POST">
			
			<div class="form-group row">
				<label for="nom" class="col-sm-3 col-form-label">Nom </label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="nom" name="form_register_util[nom]"  placeholder="Votre nom..." value="<?php echo(isset($_POST['form_register_util[nom]']))? htmlspecialchars($_POST['form_register_util[nom]']):'';?>" />
        <?php echo $erreurs['nom']; ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="prenom" class="col-sm-3 col-form-label">Prenom </label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="prenom" name="form_register_util[prenom]"  placeholder="Votre prenom..." value="<?php echo(isset($_POST['form_register_util[prenom]']))? htmlspecialchars($_POST['form_register_util[prenom]']):'';?>" />
        <?php echo $erreurs['prenom']; ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="email" class="col-sm-3 col-form-label">Adresse E-mail </label>
				<div class="col-sm-8">
					<input type="email" class="form-control" id="email" name="form_register_user[email]" placeholder="Votre Email..." value="<?php echo(isset($_POST['form_register_util[email]']))? htmlspecialchars($_POST['form_register_util[email]']):'';?>" />
        <?php echo $erreurs['email']; echo $erreurs['valeurMail'];?>
				</div>
			</div>

			<fieldset class="form-group row">
				<label for="sexe" class="col-sm-3 col-form-label">Sexe</label>
				<label class="form-check-inline col-sm-4">
					<input type="radio" class="form-check-input" id="sexe" name="form_register_util[sexe]" value="Homme" checked> Homme  
				</label>
				<label class="form-check-inline col-sm-4">
					<input type="radio" class="form-check-input" id="sexe" name="form_register_util[sexe]" value="Femme"> Femme
				</label>
			</fieldset>

			<div class="form-group row">
				<label for="lieu" class="col-sm-3 col-form-label">Département </label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="lieu" name="form_register_util[departement]" list="departement" value="<?php echo(isset($_POST['form_register_util[departement]']))? htmlspecialchars($_POST['form_register_util[departement]']):'';?>" />
        <?php echo $erreurs['departement']; ?>
					<datalist id="departement">
						<option value="75 - Paris"></option>
						<option value="95 - Val-d-Oise"></option>
					</datalist>
				</div>	
			</div> <!-- End form-group row-->

			<div class="form-group row">
				<label for="password" class="col-sm-3 col-form-label">Mot de Passe </label>
				<div class="col-sm-8">
					<input type="password" class="form-control" id="password" name="form_register_user[password]" aria-describedby="Champ mot de passe de l'utilisateur" placeholder="Votre mot de passe..." value="<?php echo(isset($_POST['form_register_util[password]']))? htmlspecialchars($_POST['form_register_util[password]']):'';?>" />
        <?php echo $erreurs['password']; ?>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="confirm_password" class="col-sm-3 col-form-label">Confirmation</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" id="confirm_password" name="form_register_user[confirm_password]" placeholder="Confirmation de votre mot de passe... " value="<?php echo(isset($_POST['form_register_util[confirm_password]']))? htmlspecialchars($_POST['form_register_util[confirm_password]']):'';?>" />
        <?php echo $erreurs['confirm_password']; ?>
				</div>
			</div>
			
			<div class="col-sm-2 col-sm-offset-4">
				<button type="submit" name="sign-up" class="btn btn-primary">S'inscrire</button>
			</div> 

			<div class="col-sm-2 col-sm-offset-1">
				<button type="reset" class="btn btn-default">Annuler</button>
			</div> 
		</form>
	</div>  <!-- End of row form-->
</main> <!-- End of main-->
<?php $this->stop('main_content') ?>