<?php $this->layout('layout', ['title' => 'modification de mes infos']) ?>

<?php $this->start('main_content') ?>

	<h1 class="container center-align"></h1>
	<section class="container update-content">

		<div id="entete" class="row">

			<div class="col l4">
				<h6 class="center-align nom-prenom"><?php if(isset($w_user['nom'])){  echo $w_user['nom'];} ?></h6>

				<img class="profilePic" src="<?php if(isset($w_user['photo'])){ echo $this->assetUrl($w_user['photo']);} ?>" alt="">

				<form id="upload" action="<?= $this->url('updatePhoto') ?>" method="POST" enctype="multipart/form-data">
					<div class="file-field input-field">
						<div class="btn btn-add">
							<span class="add">photo </span>
							<input type="file"  id="photo" name="photo">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>
				</form>
				<p id='message'></p>


			</div>
			<div class="col l8 right  center-align">
				<h4 class="center-align grey lighten-4 z-depth-1 center-align teal-text text-lighten-2">Editer vos informations</h4>
				<div class="container center">
					<ul class="collapsible" data-collapsible="expandable">
    					<li>
      						<div class="collapsible-header active"><i class="material-icons">perm_identity</i>Modifier son profil</div>
      						<div class="collapsible-body">
	      						<div class="row">
				            		<form method="POST" class="col l8 offset-l2"  >
						                <div class="input-field">
						                    <i class="material-icons prefix">perm_identity</i>
						                    <input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($w_user['nom'])){  echo $w_user['nom'];} ?>">
						                </div>
						                <div class="input-field">
						                    <i class="material-icons prefix">perm_identity</i>
						                    <input type="text" name="prenom" placeholder="Votre Prénom" value="<?php if(isset($w_user['prenom'])){  echo $w_user['prenom'];} ?>">
						                </div>
						                <div class="input-field">
						                    <i class="material-icons prefix">email</i>
						                    <input type="email" name="email" placeholder="Votre email" value="<?php if(isset($w_user['email'])){  echo $w_user['email'];} ?>">
						                </div>
						                <div class="input-field">
						                    <i class="material-icons prefix">chat_bubble_outline</i>
						                    <textarea id="description" class="materialize-textarea" name="description" placeholder="Votre description" ><?php if(isset($w_user['description'])){  echo $w_user['description'];} ?></textarea>

						                </div>
						                <div class="input-field">
						                    <i class="material-icons prefix">supervisor_account</i>
						                    <input type="text" name="linkedin" placeholder="Votre linkedin" value="<?php if(isset($w_user['linkedin'])){  echo $w_user['linkedin'];} ?>">
						                </div>


										<div class="input-field">
											<button type="submit" name="submit" value="edit_profil" class="left waves-effect waves-light btn">Envoyer</button>
										</div>
										<br>
									    <div class="container center">
											<?php if(!empty($errors_updateprofil)) :?>
									        	<p class='red-text text-darken-1'>
									        	<?= implode('<br />', $errors_updateprofil)?>
									        	</p>
											<?php endif; ?>
											<?php if(!empty($success_updateprofil)) :?>
									        	<p class='green-text text-darken-1'><?=$success_updateprofil?></p>
											<?php endif; ?>
										</div>
				            		</form>
			        			</div>
      						</div>
    					</li>
    					<li>
		      				<div class="collapsible-header"><i class="material-icons">playlist_add</i>Ajouter un projet
		      				</div>
		      				<div class="collapsible-body">
		      					<div class="row">
	  								<form method="POST" class="col l8 offset-l2" action="<?= $this->url('updateProfil') ?>" method="POST" enctype="multipart/form-data">
	        							<div class="input-field">
															<i class="material-icons prefix">web</i>
	              							<label for="project_title">Titre projet</label>
	                  						<input type="text" name="project_title" placeholder="titre projet">
	        							</div>
								        <div class="input-field">
								            <i class="material-icons prefix">chat_bubble_outline</i>
								            <input type="text" name="description" placeholder="Votre description du projet">
								        </div>
										<div class="file-field input-field">
											<div class="btn btn-add">
												<span class="add">photo </span>
												<input type="file"  id="photo" name="photo">
											</div>
											<div class="file-path-wrapper">
												<input class="file-path validate" type="text">
											</div>
											<div class="input-field">
								            	<i class="material-icons prefix">perm_media</i>
								            	<input type="text" name="caption" placeholder="Votre description de la photo">
								        	</div>
											<div class="input-field margetop">
					      						<button type="submit" name="submit" value="add_project" class="waves-effect waves-light btn">Envoyer</button>
											</div>
										</div>
									</form>
        							<br>
								    <div class="container center">
										<?php if(!empty($errors_addprojet)) :?>
								        	<p class='red-text text-darken-1'>
								        	<?= implode('<br />', $errors_addprojet)?>
								        	</p>
										<?php endif; ?>
										<?php if(!empty($success_addprojet)) :?>
								        	<p class='green-text text-darken-1'><?=$success_addprojet?></p>
										<?php endif; ?>
									</div>
      							</div>
      						</div>
    					</li>

						<?php foreach ($projets as $projet) { ?>


	    					<li>
			      				<div class="collapsible-header"><i class="material-icons">loop</i>Modifier projet <?= $projet['project_title']  ?>
			      				</div>
			      				<div class="collapsible-body">
			      					<div class="row">
		  								<form method="POST" class="col l8 offset-l2" >
		        							<div class="input-field">
		              							<label for="project_title">Titre projet</label>
		                  						<input type="text" name="project_title" placeholder="titre projet" value="<?= $projet['project_title']?>" >
		        							</div>
									        <div class="input-field">
									            <label for="description">description projet</label>
									            <textarea name="description" placeholder="description" class="materialize-textarea" > <?= $projet['description']?></textarea>
									        </div>

									        <?php foreach ($projet['photos'] as $photo) { ?>

												<div class="file-field input-field">
													<img src="<?= $this->assetUrl($photo['photo']) ?>">
													<div class="btn btn-add">
														<span class="add">photo</span>
														<input type="file"  id="photo" name="photo">
													</div>
													<div class="file-path-wrapper">
														<input class="file-path validate" type="text">
													</div>
													<div class="input-field">
										            	<label for="caption">description photo</label>
										            	<input type="text" name="caption" placeholder="Votre description de la photo" value="<?= $photo['caption']?>">
										        	</div>

												</div>

											<?php } ?>
											<div class="input-field margetop">
				      							<button type="submit" name="submit" value="add_project" class="waves-effect waves-light btn">Envoyer</button>
											</div>
		        						</form>
		      							<br>
									    <div class="container center">
											<?php if(!empty($errors)) :?>
									        	<p class='red-text text-darken-1'>
									        	<?= implode('<br />', $errors)?>
									        	</p>
											<?php endif; ?>
											<?php if(!empty($success)) :?>
									        	<p class='green-text text-darken-1'><?=$success?></p>
											<?php endif; ?>
										</div>
	      							</div>
	      						</div>
	    					</li>
						<?php } ?>
  					</ul>
				</div>
		    </div>
		</div>
	</section>
<?php $this->stop('main_content') ?>
<?php $this->start('script') ?>
<script src="<?= $this->assetUrl('js/updateProfil.js') ?>"></script>
<?php $this->stop('script') ?>
