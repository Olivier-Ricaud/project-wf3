<?php $this->layout('layout', ['title' => 'feuille de match']) ?>

<?php $this->start('main_content') ?>
<main class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<h1>Feuille de match</h1>
		</div>
	</div> <!-- End of row h1-->
		
		<!-- action=" <?= $this->url('detail', ['id' => $event['id'] ] ) ?> " -->
	<form method="POST">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-sm-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Equipe 1</h3>
							</div> <!-- End of panel-title -->

							<div class="panel-body">
								<div class="form-group">
									<select name="j1" class="form-control">
										<?php foreach ($joueurs as $joueur): ?>
												<option value="1">- <?= $this->e($joueur['prenom']) ?> <?= $this->e($joueur['nom']) ?> -</option>   
										<?php endforeach; ?>   
									</select>
									<select name="j2" class="form-control">
										<?php foreach ($joueurs as $joueur): ?>
												<option value="1">- <?= $this->e($joueur['prenom']) ?> <?= $this->e($joueur['nom']) ?> -</option>   
										<?php endforeach; ?>   
									</select>
									<select name="j3" class="form-control">
										<?php foreach ($joueurs as $joueur): ?>
												<option value="1">- <?= $this->e($joueur['prenom']) ?> <?= $this->e($joueur['nom']) ?> -</option>   
										<?php endforeach; ?>   
									</select>
									<select name="j4" class="form-control">
										<?php foreach ($joueurs as $joueur): ?>
												<option value="1">- <?= $this->e($joueur['prenom']) ?> <?= $this->e($joueur['nom']) ?> -</option>   
										<?php endforeach; ?>   
									</select>
									<select name="j5" class="form-control">
										<?php foreach ($joueurs as $joueur): ?>
												<option value="1">- <?= $this->e($joueur['prenom']) ?> <?= $this->e($joueur['nom']) ?> -</option>   
										<?php endforeach; ?>   
									</select>
								</div> <!-- End of form-group -->
							</div> <!-- End of panel-body -->
						</div> <!-- End of panel-primary -->

						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Score 1</h3>
							</div> <!-- End of panel-title -->

							<div class="panel-body">
								<div class="col-lg-8 col-lg-offset-2">
									<input type="number" min="0" name="s1" class="form-control" id="score1" placeholder="Buts marqués par l'équipe 1">
								</div>
							</div> <!-- End of panel-body -->
						</div> <!-- End of panel-primary -->
					</div> <!-- End of col-sm-6 -->

					<div class="col-sm-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Equipe 2</h3>
							</div> <!-- End of panel-title -->

							<div class="panel-body">
								<div class="form-group">
									<select name="j6" class="form-control">
										<?php foreach ($joueurs as $joueur): ?>
												<option value="2">- <?= $this->e($joueur['prenom']) ?> <?= $this->e($joueur['nom']) ?> -</option>   
										<?php endforeach; ?>   
									</select>
									<select name="j7" class="form-control">
										<?php foreach ($joueurs as $joueur): ?>
												<option value="2">- <?= $this->e($joueur['prenom']) ?> <?= $this->e($joueur['nom']) ?> -</option>   
										<?php endforeach; ?>   
									</select>                
									<select name="j8" class="form-control">
										<?php foreach ($joueurs as $joueur): ?>
												<option value="2">- <?= $this->e($joueur['prenom']) ?> <?= $this->e($joueur['nom']) ?> -</option>   
										<?php endforeach; ?>   
									</select>
									<select name="j9" class="form-control">
										<?php foreach ($joueurs as $joueur): ?>
												<option value="2">- <?= $this->e($joueur['prenom']) ?> <?= $this->e($joueur['nom']) ?> -</option>   
										<?php endforeach; ?>   
									</select>
									<select name="j10" class="form-control">
										<?php foreach ($joueurs as $joueur): ?>
												<option value="2">- <?= $this->e($joueur['prenom']) ?> <?= $this->e($joueur['nom']) ?> -</option>   
										<?php endforeach; ?>   
									</select>
								</div> <!-- End of form-group -->
							</div> <!-- End of panel-body -->
						</div> <!-- End of panel-primary -->
						
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Score 2</h3>
							</div> <!-- End of panel-title -->

							<div class="panel-body">
								<div class="col-lg-8 col-lg-offset-2">
									<input type="number" min="0" name="s2" class="form-control" id="score2" placeholder="Buts marqués par l'équipe 2">
								</div>
							</div> <!-- End of panel-body -->
						</div> <!-- End of panel-primary -->
					</div> <!-- End of col-sm-6 -->
				</div> <!-- End of row -->
			</div> <!-- End of col-md-10 -->	
		</div> <!-- End Row -->
			
		</div> <!-- End Row -->
		</div> <!-- End of row Equipes-->

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<div class="col-md-4 col-md-offset-4">
						<button type="submit" name="send" class="btn btn-primary">Valider</button>	
						<button type="reset" class="btn btn-default">Annuler</button>
					</div>
				</div> <!-- End of from group-->

			</div> <!-- End of class 8-->

		</div> <!-- End of row button-->
	</form>	<!-- End of Form -->

</main> <!-- End main container -->
<?php $this->stop('main_content') ?>