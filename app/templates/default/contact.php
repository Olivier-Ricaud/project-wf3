<?php $this->layout('layout', ['title' => 'Contact']) ?>

<?php $this->start('main_content') ?>
<main class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<h1>Contact</h1>
			<!-- Affichage des erreurs -->
			<?php if (!empty($erreurs)): ?>
				<ul class="alert alert-danger">
					<?php foreach ($erreurs as $erreur): ?>
						<li> <?= $erreur ?> </li>
					<? endforeach; ?>
				</ul>
			<? endif; ?>

            <!-- Message de Validation  -->
            <?php if (!empty($validation)): ?>
                <ul class="alert alert-success">
                        <li> <?= $validation ?> </li>
                </ul>
            <? endif; ?>
		</div>
	</div> <!-- End of row h1-->
	
	<div class="row">
        <form method="POST" class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
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