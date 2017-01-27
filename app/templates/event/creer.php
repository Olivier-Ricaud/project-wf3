    <?php $this->layout('layout', ['title' => 'Organiser un match']) ?>
<?php $this->start('main_content') ?>
<!-- Page de création d'événement -->
<main class="container-fluid">

    <div class="row">
        <div class="col-sm-9 col-sm-offset-2">
            <h1>Création d'événement</h1>
            <?php var_dump($_POST['duree']) ?>
            <?php var_dump($_POST['form_event']['heure']) ?>
            <?php if (!empty($erreurs)): ?>
				<ul class="alert alert-danger">
					<?php foreach ($erreurs as $erreur): ?>
						<li> <?= $erreur ?> </li>
					<? endforeach; ?>
				</ul>
			<? endif; ?>
        </div>
    </div> <!-- End of row h1-->
    
    <div class="row">
        <!-- Formulaire de création d'événement -->
        <form class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2" method="POST" >
            <input type="hidden" name="form_event[host_id]" value="<?= $this->e($_SESSION['user']['infos']['user_id']) ?>">
            
            <div class="form-group row">
                <label for="titre" class="col-sm-3 col-form-label">Titre de l'événement</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="titre" name="form_event[titre]" placeholder="..." value="<?php if(isset($_POST['form_event']['titre'])) echo $_POST['form_event']['titre'] ; ?>">
                </div>
            </div>
            <!-- Date et heure -->
            <div class="form-group row">
                <label for="date" class="col-xs-1 col-sm-3 col-form-label">Date</label>
                <div class="col-xs-5 col-sm-6">
                    <input type="date" class="form-control" id="date" name="form_event[date]" placeholder="..." value="<?php if(isset($_POST['form_event']['date'])) echo $_POST['form_event']['date'] ; ?>">
                </div>
                <label for="time" class="col-xs-1 col-form-label">Heure</label>
                <div class="col-xs-3 col-sm-2">
                    <input type="time" class="form-control" id="time" name="form_event[heure]" placeholder="..." value="<?php if(isset($_POST['form_event']['heure'])) echo $_POST['form_event']['heure'] ; ?>">
                </div>
            </div> <!-- End row -->
            <div class="form-group row">
                <label for="duree" class="col-sm-3 col-form-label">Durée</label>
                <div class="col-sm-9">
                    <select class="form-control" id="duree" name="form_event[duree]">
                        <option value="01:00">1h</option>
                        <option value="02:00">2h</option>
                    </select>              
                </div>
            </div>
            <!-- Lieu et Tarif -->
            <div class="form-group row">
                <label for="salle" class="col-sm-3 col-form-label">Salle</label>
                <div class="col-sm-9">
	               <select class="form-control" id="salle" name="form_event[salle_id]" onchange="showSalle(this.value)">
   						<option value="">Choisissez votre salle...</option>
   						
   						<?php foreach($salles as $salle): ?>		
   							<option value="<?= $this->e($salle['id'])?>"> <?= $this->e($salle['nom']).' - '.$this->e($salle['ville'])?></option>
   						<?php endforeach; ?>
	               	</select>

	               	<div id="txtSalle"><b>Salle info will be listed here...</b></div>
                </div>
            </div> <!-- End row -->
            
            <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea type="message" class="form-control" id="description" name="form_event[description]" placeholder="Description de l'événement..." rows="10" maxlength="5000"> <?php if(isset($_POST['form_event']['description'])) echo $_POST['form_event']['description'] ; ?> </textarea>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label for="niveau" class="col-sm-3 col-form-label">Niveau</label>
                <div class="col-sm-9">
                    <select class="form-control" id="niveau" name="form_event[niveau]">
                    	<option value="<?php if(isset($_POST['form_event']['niveau'])) echo $_POST['form_event']['niveau'] ; ?>"><?php if(isset($_POST['form_event']['niveau'])) echo $_POST['form_event']['niveau'] ; ?></option>
                        <option value="Débutant"> Débutant</option>
                        <option value="Intermediaire"> Intermédiaire</option>
                        <option value="Confirmé">Confirmé</option>
                        <option value="Tous niveaux">Tous niveaux</option>
                    </select>              
                </div>
            </div>
            <div class="form-group row">
                <label for="sexe" class="col-sm-3 col-form-label">Sexe recherché</label>
                <div class="col-sm-9">
                    <select class="form-control" id="sexe" name="form_event[sexe]">
                    	<option value="<?php if(isset($_POST['form_event']['sexe'])) echo $_POST['form_event']['sexe'] ; ?>"><?php if(isset($_POST['form_event']['sexe'])) echo $_POST['form_event']['sexe'] ; ?></option>
                        <option value="Mixte">Mixte</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
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