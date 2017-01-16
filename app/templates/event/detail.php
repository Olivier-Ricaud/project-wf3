<?php $this->layout('layout', ['title' => 'Détail d\'événement']) ?>

<?php $this->start('main_content') ?>
<main class="container-fluid">
	<section class="row">
			<div class="imgBackground">
				<img src="assets/img/futsal2.jpg" alt="exemple"> 
				<h1 class="title">Titre de l'événement</h1>
			</div>
	</section>

	<!-- DETAIL EVENEMENTS -->
	<section class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-map-marker" aria-hidden="true"></i> lieu</div>
					<div class="panel-body">chez moi</div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-calendar" aria-hidden="true"></i> date</div>
					<div class="panel-body">12/12/2016</div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-users" aria-hidden="true"></i> nombre de joueurs inscrits</div>
					<div class="panel-body">10</div>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">sexe des joueurs recherché</div>
					<div class="panel-body">Mixte</div>
				</div>
			</div>

			<div class="col-xs-6 col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-eur" aria-hidden="true"></i> tarif</div>
					<div class="panel-body">10€</div>
				</div>
			</div>

			<div class="col-xs-6 col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading"><i class="fa fa-clock-o" aria-hidden="true"></i> durée</div>
					<div class="panel-body">1 heures</div>
				</div>
			</div>

			<div class="col-xs-6 col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">niveau recomendé</div>
					<div class="panel-body">Amateur</div>
				</div>
			</div>
	</section>

	<!-- DESCRIPTION ET MAP -->
	<section class="row">
			<div class="col-md-6">
				<h2>Example body text</h2>
				<p>Nullam quis risus eget <a href="#">urna mollis ornare</a> vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod nemo similique doloremque fuga nesciunt rerum illum, tenetur illo nobis dolor molestias nihil ea tempora necessitatibus, expedita dolorum omnis, aspernatur ad.</p>
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
						<th>#</th>
						<th>Username</th>
						<th>Level</th>
						<th>Gender</th>
						<th>Edit (Admin)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td><a href="#">Alex</a></td>
						<td>Intermediaire</td>
						<td>M</td>
						<!-- Bouton START -->
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								Status <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">En attente</a></li>
									<li><a href="#">Validée</a></li>
								</ul>
							</div>
							<a href="#" class="btn btn-danger">Retirer</a>
						</td>
						<!-- Bouton END -->	
					</tr> 

					<tr>
						<td>2</td>
						<td><a href="#">Alex</a></td>
						<td>Intermediaire</td>
						<td>M</td>
						<td>
						<div class="btn-group">
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							Status <span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">En attente</a></li>
								<li><a href="#">Validée</a></li>
							</ul>
						</div>
						<a href="#" class="btn btn-danger">Retirer</a></td>
					</tr>
					
					<tr>
								
						<td>3</td>
						<td><a href="#">Alex</a></td>
						<td>Intermediaire</td>
						<td>M</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								Status <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">En attente</a></li>
									<li><a href="#">Validée</a></li>
								</ul>
							</div>
							<a href="#" class="btn btn-danger">Retirer</a>
						</td>
					</tr>
					
					<tr>
						<td>4</td>
						<td><a href="#">Alex</a></td>
						<td>Intermediaire</td>
						<td>M</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								Status <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">En attente</a></li>
									<li><a href="#">Validée</a></li>
								</ul>
							</div>
							<a href="#" class="btn btn-danger">Retirer</a>
						</td>
					</tr>
					
					<tr>
						<td>5</td>
						<td><a href="#">Alex</a></td>
						<td>Intermediaire</td>
						<td>M</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								Status <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">En attente</a></li>
									<li><a href="#">Validée</a></li>
								</ul>
							</div>
							<a href="#" class="btn btn-danger">Retirer</a>
						</td>
					</tr>
						
					<tr>
						<td>6</td>
						<td><a href="#">Alex</a></td>
						<td>Intermediaire</td>
						<td>M</td>
						<td>
							<div class="btn-group">
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								Status <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">En attente</a></li>
									<li><a href="#">Validée</a></li>
								</ul>
							</div>
							<a href="#" class="btn btn-danger">Retirer</a>
						</td>
					</tr>

					<tr>
						<td>7</td>
						<td><a href="#">Alex</a></td>
						<td>Intermediaire</td>
						<td>M</td>
						<td>
							<div class="btn-group">
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							Status <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">En attente</a></li>
									<li><a href="#">Validée</a></li>
								</ul>
							</div>
							<a href="#" class="btn btn-danger">Retirer</a>
						</td>
					</tr>
					
					<tr>
						<td>8</td>
						<td><a href="#">Alex</a></td>
						<td>Intermediaire</td>
						<td>M</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								Status <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">En attente</a></li>
									<li><a href="#">Validée</a></li>
								</ul>
							</div>
							<a href="#" class="btn btn-danger">Retirer</a>
						</td>
					</tr>

					<tr>
						<td>9</td>
						<td><a href="#">Alex</a></td>
						<td>Intermediaire</td>
						<td>M</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								Status <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">En attente</a></li>
									<li><a href="#">Validée</a></li>
								</ul>
							</div>
							<a href="#" class="btn btn-danger">Retirer</a>
						</td>
					</tr>

					<tr>
						<td>10</td>
						<td><a href="#">Alex</a></td>
						<td>Intermediaire</td>
						<td>M</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								Status <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">En attente</a></li>
									<li><a href="#">Validée</a></li>
								</ul>
							</div>
							<a href="#" class="btn btn-danger">Retirer</a>
						</td>
					</tr>

				</tbody>
			</table>
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