<?php $this->layout('layout', [ 'title' => $this->e($event['titre']) ]) ?>

<?php $this->start('main_content') ?>
<main class="container-fluid">
	<section class="row">
			<div class="imgBackground">
				<img src="<?= $this->assetUrl('salle/'.$this->e($salle['id']).'.jpg') ?>" alt="exemple">
				<h1 class="title"><?= $this->e($event['titre']) ?></h1>
			</div>
	</section>

	<!-- DETAIL EVENEMENTS -->
	<section class="row">
		<section class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-map-marker" aria-hidden="true"></i>Lieu</div>
					<div class="panel-body"><?= $this->e($salle['adresse']) ?></div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-calendar" aria-hidden="true"></i> Date</div>
					<div class="panel-body"><?= $this->e($event['date']) ?></div>
				</div>
			</div>
	
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-users" aria-hidden="true"></i> Nombre de joueurs inscrits</div>
					<div class="panel-body"><?= $this->e($nbrsJoueurs) ?> /10</div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"> Sexe des joueurs recherchés</div>
					<div class="panel-body"><?= $this->e($event['sexe']) ?></div>
				</div>
			</div>
		</section>

		<section class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-eur" aria-hidden="true"></i> tarif</div>
					<div class="panel-body">10€</div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-clock-o" aria-hidden="true"></i> durée</div>
					<div class="panel-body"><?= $this->e($event['duree']) ?></div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">Niveau recomendé</div>
					<div class="panel-body"><?= $this->e($event['niveau']) ?></div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">Site internet de la salle</div>
					<div class="panel-body"><i class="fa fa-futbol-o" aria-hidden="true"></i><a href="<?= $this->e($salle['ste_web']) ?>"><?= $this->e($salle['nom']) ?></a></div>
				</div>
			</div>
		</section>
	</section>

	<!-- DESCRIPTION ET MAP -->
	<section class="row">
			<div class="col-md-6">
				<section class="row">
					<h3>Score</h3>
					<div class="col-sm-6">
						<h3>Equipe 1</h3>
						<h2><?= $this->e($event['score_equipe_1']) ?></h2>
					</div>
					<div class="col-sm-6">
						<h3>Equipe 2</h3>
						<h2><?= $this->e($event['score_equipe_2']) ?></h2>
					</div>
					
				</section>
				<h2>Description</h2>
				<p><?= $this->e($event['description']) ?></p>

				<?php if ($retirer == false):?>
					<?php if($this->e($nbrsJoueurs) < 10): ?>
						<a href="<?= $this->url('participer', ['id' => $event['id']]) ?>" class="btn btn-primary" >Participer à l'événement</a>
					<?php else: ?>
						<p class="btn btn-danger">MATCH FULL !</p>
					<?php endif; ?>
				<?php else: ?>
				<a href="<?= $this->url('desinscrire', ['id' => $event['id']]) ?>" class="btn btn-danger" >Se désinscrire</a>
				<?php endif; ?>
			</div>

			<div class="col-md-6">
				<!-- Responsive Embeds voir: http://www.w3schools.com/bootstrap/bootstrap_images.asp -->
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d70660.21304508974!2d2.301146715383795!3d48.84055251038102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6724c27587c7d%3A0x9415be5e9053dcc3!2sUrbanSoccer+-+Porte+d&#39;Ivry!5e0!3m2!1sfr!2sfr!4v1482938030233"></iframe>
				</div>
			</div>
	</section>

	<section class="row">
		<!-- DEBUT DU TABLEAU DES JOUEURS INSCRITS -->
		<div class="col-md-7">
			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th>id</th>
						<th>Joueur</th>
						<th>Niveau</th>
						<th>Genre</th>
						<th>Statut</th>
						
						<?php if ($host == true): ?>
							<th>Edit (Admin)</th>
						<?php endif; ?>
						
					</tr>
				</thead>
				<tbody>
					<?php foreach ($joueurs as $joueur): ?>
					<tr>
						<td><?= $this->e($joueur['user_id'])?></td>
						<td><?= $this->e($joueur['prenom']).' '.$this->e($joueur['nom'])?></td>
						<td><?= $this->e($joueur['niveau'])?></td>
						<td><?= $this->e($joueur['sexe'])?></td>
						<td><?= $this->e($joueur['statut'])?></td>
						
						<?php if ($host == true): ?>
						<td>
							<a href="<?= $this->url('confirmer', ['userId' => $joueur['user_id'], 'eventId' => $event['id'] ]) ?>" class="btn btn-primary">Confirmer</a>
							<a href="<?= $this->url('retirer', ['userId' => $joueur['user_id'], 'eventId' => $event['id'] ]) ?>" class="btn btn-danger">Retirer</a>
						</td>	
					<?php endif; ?>
					</tr> 
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<!-- Boutton suppression événement -->
			<?php if ($host == true): ?>
				<a href="<?= $this->url('delete_event', ['id' => $event['id'] ] ) ?>" class="btn btn-danger">SUPPRIMER L'ÉVENEMENT</a>
			<?php endif; ?>

			<!-- Boutton vers feuille-de-match.php -->
			<?php if ( ($host == true) && ($this->e($event['date']) >= $this->e($event['date'])) ): ?>
				<a href="<?= $this->url('feuille_match', ['id' => $event['id'] ] ) ?>" class="btn btn-primary">FEUILLE DE MATCH</a>
			<?php endif; ?>
		</div>
		<!-- FIN DU TABLEAU DES JOUEURS INSCRITS -->

		<!-- DEBUT DU MINICHAT -->
		<aside id="miniChat" class="col-md-4 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>MiniChat</h3>
				</div>

				<div class="panel-body">
               		<div class="row">
               			<div class="col-xs-12">
               				<span class="text-muted small">Le 12/12/2016</span>
               			</div>
               		</div>

               		<div class="row">
               			<div class="col-xs-12">
               				<div class="media">
               					<div class="media-body">
               						<h4 class="media-heading">Alex
               							<span class="small pull-right">18:18</span>
               						</h4>
               						<p>Message de l'utilisateur</p>
               					</div>
               				</div>
               			</div>
               		</div>
               		<hr>
	            </div>

	           	<div class="panel-footer">
	               	<form action="" method="post" >

	               		<div class="form-group">
	               			<input class="form-control" name="pseudo" value="" placeholder="Votre Pseudo..." required>
	               		</div>

	               		<div class="form-group">
	               			<textarea class="form-control" name="message" placeholder="Votre message..." required></textarea>
	               		</div>

	               		<div class="form-group">
	               			<input type="submit" name="submit" value="Envoyer" class="btn btn-primary pull-right">
	               		</div>
	               		<div class="clearfix"></div>
	               	</form>
	            </div>
		    </div>
		</aside>
		<!-- FIN DU MINICHAT -->
	</section>
</main>
<?php $this->stop('main_content') ?>