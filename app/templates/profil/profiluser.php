<?php $this->layout('layout', ['title' => 'Profil d\'utilisateur']) ?>

<?php $this->start('main_content') ?>

  <!-- 1ère ligne de présentation -->
  <section id="presentation" class="container row grey lighten-4 z-depth-1 center-align teal-text text-lighten-2">
      <div class="col m6 l6 grey lighten-4 center-align teal-text text-lighten-2">
          <?php if(empty($profil['photo'])): ?>
            <img class="responsive-img" src="<?= $this->assetUrl('avatar/generic-avatar.png') ?>"/>
          <?php endif; ?>
          <?php if (!empty($profil['photo'])): ?>
            <img class="responsive-img" src="<?= $this->assetUrl($profil['photo']) ?>"/>
          <?php endif; ?>
      </div>
      <div class="col m6 l6">
        <h4><?= $profil['prenom'].' '.$profil['nom'] ?></h4>
        <h5><?= $section?></h5>
        <p class=""><?= $profil['description']?></p>
      </div>
      <div class="col m6 l6">
        <br>
        <a href="<?= $this->url('contact',['id' => $profil['id']])?>">Contacter</a>
      </div>
  </section>

  <!-- 2ème ligne titre -->
	<div id="gallery-title" class="container row">
		<div class="col s12 m12 l12">
			<span class="col s12 m12 l12 center-align grey lighten-4 z-depth-1 center-align teal-text text-lighten-2">Gallerie des projets de <h4><?= $profil['prenom'].' '.$profil['nom'] ?></h4></span>
		</div>
	</div>


	<!-- 3ème ligne gallerie -->

		<div id="cards-folio" class="container row isotope">
			<div id="col l12 cards-global-content"> <!-- div qui contient toutes mes cartes de projets -->

			<?php foreach($projets as $projet):?>
				<div class=" col m6 l4 ">
					<div class="card">
						<div class="card-content">
							<p class="area">
								<a href="<?= $this->url('projectsPage',['id' => $projet['id']])?>"><?= $projet['project_title']?>
							</p>
							<a href="<?= $this->url('projectsPage',['id' => $projet['id']])?>">
								<span class="card-title activator brown-text text-darken-4"><?= $projet['date_publish']?></span>
							</a>
						</div>
						<div class="card-image waves-block waves-light">
							<a href="<?= $this->url('projectsPage',['id' => $projet['id']])?>">
								<div>
									<p><?= mb_substr($projet['description'], 0 , 130)?>...</p>
									<div class="contain-img">
										<img width="640" height="480" src="<?= $this->assetUrl( $projet['photos'][0]['photo']) ?>" class=" hov-zoom responsive-img wp-post-image">
									</div>
								</div>
                            </a>
						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>



<?php $this->stop('main_content') ?>
