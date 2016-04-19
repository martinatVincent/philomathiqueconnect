<?php if (!empty($error)) :?>
	<?=$this->layout('layout2', ['title' => 'Recherche'])?>
<?php endif;?>
<?php if (empty($error)) :?>
	<?=$this->layout('layout', ['title' => 'Recherche'])?>
<?php endif;?>

<?php $this->start('main_content') ?>

<section id="allworks" class="row section container">
<h2 class="center">Résultats :</h2>
<?php foreach ($resultatUser as $resuse):?>
	<article class="grey lighten-4 col s12 m6 l4">
		<div class="grey lighten-4">
			<div class=" contain-img">
				<?php if(empty($use['photo'])): ?>
					<img class="hov-zoom photo-work responsive-img" src="<?= $this->assetUrl('avatar/generic-avatar.png') ?>"/>
				<?php endif; ?>
				<?php if (!empty($use['photo'])): ?>
					<img class="hov-zoom photo-work responsive-img" src="<?= $this->assetUrl($resuse['photo']) ?>"/>
				<?php endif; ?>
				<div class="text-box ">
					<h2>Visiter le Profil</h2>
					<a class="link-metier" href="/philo_unity/public/profil/profiluser/<?= $resuse['id']?>"></a>
				</div>
			</div>
			<div class="text-works center">
				<h6><?= $resuse['prenom'].' '.$resuse['nom']?></h6>
				<p class="grey lighten-4"><?= mb_substr($resuse['description'], 0 , 400 )?></p>
			</div>
		</div>
	</article>
<?php endforeach;?>
<?php foreach ($resultatMetier as $resmet):?>
	<article class="col s12 m6 l4">
		<div class="grey lighten-4 z-depth-1">
			<div class=" contain-img">
				<img class="hov-zoom" src="<?= $resmet['photo']?>" alt="">
				<div class="text-box">
					<h2 class="lighten-4">Voir les profils</h2>
					<a class="link-metier" href="metiers/<?= $resmet['alias']?>/profilsall"></a>
				</div>
			</div>
			<div class="text-works center">
				<h6><?= $resmet['section']?></h6>
				<p class=""><?= mb_substr($resmet['description'], 0 , 400 ).'...'?></p>
			</div>
		</div>
	</article>
<?php endforeach;?>
</section>

<?php if(!empty($errors)) :?>
  <div class="section">
    <p class='red-text text-darken-1'>
    <?= implode('<br />', $errors)?>
    </p>
  </div>
<?php endif; ?>
<?php $this->stop('main_content') ?>
