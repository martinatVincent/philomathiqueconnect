<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<div id="mainphoto" class="z-depth-1">
	<div class="row">
		<p class="center white-text">Propulsé par la</p>
		<img id="resp-logo" class="col s12" src="<?= $this->assetUrl('img/LogoPhilomathique.png') ?>" alt="" />
	</div>
</div>
<div id="titre-index" class="row section center container">
	<p class="grey lighten-4 z-depth-1 center-align teal-text text-lighten-2">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</p>
</div>
<div class="container">
	<div class="slider louil z-depth-1 shadow-effect">
	    <ul class="slides louil" >
			<?php foreach ($users as $use): ?>
				<li class="row">
				  <img class="col l5" src='<?= $this->assetUrl($use['photo']);?>'>
			    <div class="grey lighten-4 z-depth-1 col l7 slida valign-wrapper">
					<div class="valign">
						<h3 class="teal-text text-lighten-2"><?= ucfirst($use['nom']).' '.ucfirst($use['prenom']);?></h3>
						<?php if (strlen($use['description']) > 50): ?>

							<h5 class="light teal-text text-lighten-2"><?=chunk_split($use['description'])?></h5>

							<?php else: ?>
								<h5 class="light black-text text-lighten-3"><?= $use['description'];?></h5>
						<?php endif; ?>
					</div>
				</div>
				</li>
			<?php endforeach; ?>
	    </ul>
	  </div>
</div>


<?php $this->stop('main_content') ?>
