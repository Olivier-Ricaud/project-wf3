<?php $this->layout('layout', ['title' => 'Contact']) ?>

<?php $this->start('main_content') ?>
<main class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<h1>Contact</h1>
			<!-- Affichage des erreurs -->
			<!-- <?php if (!empty($erreurs)): ?>
				<ul class="alert alert-danger">
					<?php foreach ($erreurs as $erreur): ?>
						<li> <?= $erreur ?> </li>
					<? endforeach; ?>
				</ul>
			<? endif; ?> -->
		</div>
	</div> <!-- End of row h1-->
	
	<div class="row">
        <form method="POST" class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
            <div class="form-group row">
                <label for="nom" class="col-xs-12 col-sm-3 col-form-label">Nom </label>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" class="form-control" id="nom" name="form_contact[nom]" value="<?= (isset($utilisateur['nom'])) ? $utilisateur['nom'] : "" ?>"  placeholder="Nom de l'utilisateur">
                </div>
            </div>
            <div class="form-group row">
                <label for="prenom" class="col-xs-12 col-sm-3 col-form-label">Prenom </label>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" class="form-control" id="prenom" name="form_contact[prenom]" value="<?= (isset($utilisateur['prenom'])) ? $utilisateur['prenom'] : "" ?>"  placeholder="Prenom de l'utilisateur">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-xs-12 col-sm-3 col-form-label">Adresse E-mail </label>
                <div class="col-xs-12 col-sm-8">
                    <input type="email" class="form-control" id="email" name="form_contact[email]" value="<?= (isset($_SESSION['user']['email'])) ? $_SESSION['user']['email'] : "" ?>"  placeholder="Votre Email...">
                </div>
            </div>
            <div class="form-group row">
                <label for="sujet" class="col-xs-12 col-sm-3 col-form-label">Sujet du message </label>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" class="form-control" id="sujet" name="form_contact[sujet]" placeholder="Sujet du message">
                </div>
            </div>
            <div class="form-group row">
                <label for="message" class="col-xs-12 col-sm-3 col-form-label">Message </label>
                <div class="col-xs-12 col-sm-8">
                    <textarea type="message" class="form-control" id="message" name="form_contact[message]" placeholder="Votre message..." rows="10" maxlength="5000"></textarea>
                </div>
            </div>
 
            <div class="col-md-2 col-md-offset-4">
                <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
            </div> 

            <div class="col-md-2">
                <button type="reset" class="btn btn-default">Annuler</button>
            </div> 
        </form>
    </div>
</main> <!-- End of main -->
<?php $this->stop('main_content') ?>