<?php $this->layout('layout', ['title' => 'Profils par métier']) ?>

<?php $this->start('main_content') ?>
	<div id="mainphoto3" class="z-depth-1">
		<div class="row">
			<p class="center white-text">Propulsé par la</p>
			<img class="col s12 col m8 offset-m2 col l6 offset-l3" src="<?= $this->assetUrl('img/LogoPhilomathique.png') ?>" alt="" />
		</div>
	</div>
	<h3 id="marge-titre" class="container grey lighten-4 z-depth-1 center-align"><?= implode('', $sectionchoix);?></h1>
	<div class="container">
		<ul class="pagination center">
			<?php for($i=1; $i<=$totalpages; $i++):?>
				<li class="waves-effect btn">
					<a class="paginations paginprofil white-text" href="<?= $i?>"><?= $i?></a>
				</li>
			<?php endfor;?>
		</ul>
	</div>
	<section id="allworks" class="row section container">
	<!-- les articles ne doivent être cliquables que si il y a du contenu généré(voir avec js) -->
		<?php foreach ($users as $use):?>
			<article class="col s12 m6 l4">
				<div class="grey lighten-4 z-depth-1">
					<div class=" contain-img">
						<?php if(empty($use['photo'])): ?>
	            <img class="hov-zoom photo-work responsive-img" src="<?= $this->assetUrl('avatar/generic-avatar.png') ?>"/>
	          <?php endif; ?>
	          <?php if (!empty($use['photo'])): ?>
	            <img class="hov-zoom photo-work responsive-img" src="<?= $this->assetUrl($use['photo']) ?>"/>
	          <?php endif; ?>
						<div class="text-box ">
							<h2>Visiter le Profil</h2>
							<a class="link-metier" href="/philo_unity/public/profil/profiluser/<?= $use['id']?>"></a>
						</div>
					</div>
					<div class="text-works center">
						<h6><?= $use['prenom'].' '.$use['nom']?></h6>
						<p class="grey lighten-4"><?= mb_substr($use['description'], 0 , 400 )?></p>
					</div>
				</div>
			</article>
		<?php endforeach;?>
	</section>
<?php $this->stop('main_content') ?>

<?php $this->start('script') ?>
	<script type="text/javascript">
		var pageUrl = '<?= $this->url('paginationprofils', ['section' => $section]) ?>';
	</script>
<?php $this->stop('script') ?>
