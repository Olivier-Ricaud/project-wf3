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
					<div class="panel-heading"><i class="fa fa-venus-mars" aria-hidden="true"></i> Sexe des joueurs recherchés</div>
					<div class="panel-body"><?= $this->e($event['sexe']) ?></div>
				</div>
			</div>
		</section>

		<section class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-eur" aria-hidden="true"></i> Tarif</div>
					<div class="panel-body">10€</div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-clock-o" aria-hidden="true"></i> Durée</div>
					<div class="panel-body"><?= $this->e($event['duree']) ?></div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-level-up" aria-hidden="true"></i>Niveau recommandé</div>
					<div class="panel-body"><?= $this->e($event['niveau']) ?></div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-futbol-o" aria-hidden="true"></i>Site internet de la salle</div>
					<div class="panel-body"><a href="<?= $this->e($salle['site_web']) ?>"><?= $this->e($salle['nom']) ?></a></div>
				</div>
			</div>
		</section>
	</section>

	<!-- DESCRIPTION , MAP ET SCORE-->
	<section class="row">
			<div class="col-md-6">

				<?php if( isset($event['score_equipe_1']) && isset($event['score_equipe_2']) ): ?>
					<section class="row" id="score">
							<div class="col-sm-4 col-sm-offset-2">
								<h2>Score Equipe 1 </h2>
								<h3 value="<?= $this->e($event['score_equipe_1']) ?>"><?= $this->e($event['score_equipe_1']) ?></h3>
							</div>
							<div class="col-sm-4">
								<h2>Score Equipe 2</h2>
								<h3 value="<?= $this->e($event['score_equipe_2']) ?>"><?= $this->e($event['score_equipe_2']) ?></h3>
							</div>
					</section>
				<?php endif; ?>

				<h2>Description</h2>
				<p><?= $this->e($event['description']) ?></p>
				<?php if( !isset($event['score_equipe_1']) && isset($event['score_equipe_2']) ): ?>
					<?php if ($retirer == false):?>
						<?php if($this->e($nbrsJoueurs) < 10): ?>
							<a href="<?= $this->url('participer', ['id' => $event['id']]) ?>" class="btn btn-primary" >Participer à l'événement</a>
						<?php else: ?>
							<p class="btn btn-danger">MATCH FULL !</p>
						<?php endif; ?>
					<?php else: ?>
					<a href="<?= $this->url('desinscrire', ['id' => $event['id']]) ?>" class="btn btn-danger" >Se désinscrire</a>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<div class="col-md-6">
				<!-- Responsive Embeds voir: http://www.w3schools.com/bootstrap/bootstrap_images.asp -->
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="<?= $this->e($salle['map']) ?>"></iframe>
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
						
						<?php  if( isset($event['score_equipe_1']) && isset($event['score_equipe_2']) ): ?>
							<th>Equipe</th>
						<?php else: ?>
							<th>Statut</th>
						<?php endif; ?>
						
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
						
						<?php  if( isset($event['score_equipe_1']) && isset($event['score_equipe_2']) ): ?>
							<td><?= $this->e($joueur['equipe_id'])?></td>
						<?php else: ?>
							<?php if ($joueur['user_id'] == $event['host_id']): ?>
									<td>Hôte</td>
							<?php else: ?>
							<td><?= $this->e($joueur['statut'])?></td>
							<?php endif ?>
						<?php endif; ?>

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

			<!-- Boutton vers feuille-de-match.php -->
			
			<?php if ( ($host == true) && ($this->e($event['date']) >= $this->e($event['date'])) ): ?>
				<a href="<?= $this->url('feuille_match', ['id' => $event['id'] ] ) ?>" class="btn btn-primary">FEUILLE DE MATCH</a>
			<?php else: ?>
				<!-- Boutton suppression événement -->
				<a href="<?= $this->url('delete_event', ['id' => $event['id'] ] ) ?>" class="btn btn-danger">SUPPRIMER L'ÉVENEMENT</a>
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
               				<span class="text-muted small"><!-- date du message --> </span>
               			</div>
               		</div>

               		<div class="row">
               			<div class="col-xs-12">
               				<div class="media">
               					<div class="media-body">
               						<h4 class="media-heading"> Work in progress...
               							<span class="small pull-right"><!-- heure du message --></span>
               						</h4>
               						<!-- <p> message utilisateur</p> -->
               					</div>
               				</div>
               			</div>
               		</div>
               		<hr>
	            </div>

	           	<div class="panel-footer">
	               	<form action="" method="post" >

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