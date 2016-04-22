<?php $this->layout('layout', ['title' => 'Page de projet']) ?>

<?php $this->start('main_content') ?>
<style>
div > h7, div > h7 +p{
   word-wrap: break-word;
}
</style>
  <!-- 1ère ligne titre -->
  <div id="gallery-title" class="container row">
    <div class="col s12 m12 l12">
      <div class="center">
      <h3 class="col offset-s1 s10 offset-m1 m10 offset-l1 l10 grey lighten-4 z-depth-1 center-align teal-text text-lighten-2">Projet n° <?= $projets['id']?></h3></div>
      <!-- <div class="cote-titre"></div> -->
    </div>
  </div>
<!-- 2ème ligne ZONE présentation de projet (description projet à gauche et slide projet à droite) -->

<section id="description" class="container section">
  <div class="row">
    <div id="titleprojet" class="col s12 m12 l4">
      <h4><?= $projets['project_title']?></h4>
      <p><?= $projets['description']?></p>
    </div>

    <div id="slideprojet" class="col s12 m12 l8 slider">
      <ul class="slides">
        <?php foreach($photos as $picture):?>
          <li>
            <img src="<?= $this->assetUrl($picture['photo'])?>" alt="essai"> <!-- random image -->
            <div class="caption center-align">
              <h3><?= $picture['caption']?></h3>
              <h5 class="light grey-text text-darken-2">Projet<?= $projets['project_title']?></h5>
              </div>
          </li>
        <?php endforeach;?>
      </ul>
    </div>
  </div>
</section>


  <!-- ZONE de commentaires où j'afficherai 'commentaire et formulaire' si je suis inscrit-->
<section class="container comments-bloc">
    <div id="form-com"class="">
      <div class="row">

      <!-- Gauche : commentaires des utilisateurs -->
        <div class="comments affich-com col s12 m12 <?php if($w_user) { echo 'l4'; } else { echo 'l12';} ?>">
          <?php foreach($commentaires as $coms):?>
            <?php if (!empty($coms['prenomUser']) && !empty($coms['nomUser'])): ?>
              <h5 class="center-align">Commentaire de <?= $coms['prenomUser'].' '.$coms['nomUser']?></h5>
            <?php endif; ?>
            <?php if (empty($coms['prenomUser']) && empty($coms['nomUser'])): ?>
              <h5 class="center-align">Commentaire de Anonyme</h5>
            <?php endif; ?>

            <div id="com-project" class="grey lighten-2 ">
                <h7><?= $coms['titre']?></h7>
                <p><?= $coms['comments']?></p>
                <p class="date-publi">publié le<?= $coms['date']?></p>
            </div>
          <?php endforeach;?>
        </div>

      <?php if($w_user) :?>
        <!-- Droite : formulaire apparant pour les utilisateurs-->
        <form class="col s12 m12 l8" method="POST">
          <?php if($formError):?>
            <p class="error"><?= $erreurs ?></p>
          <?php endif;?>

          <?php if($formValid):?>
            <p class="valid">Votre commentaire a bien été envoyé !</p>
          <?php endif;?>

          <h5 class="container center-align ">Publier un commentaire </h5>
          <div class="row">
            <div class="input-field col s12 m12 l12">
              <i class="material-icons prefix">chat_bubble_outline</i>
              <input id="titre" type="text" class="validate" name="titre">
              <label for="titre">Titre de votre commentaire</label>
            </div>
            <div id="line-postcom" class="input-field col s12 m12 l12">
                <i class="material-icons prefix">comment</i>
                <textarea id="comments" type="text" class="materialize-textarea validate" name="comments"></textarea>
                <label for="comments">Votre commentaire</label>
                <p class="left">0/400 caractères</p>
            </div>
          </div>
          <div class="col s12 m12 l12">
              <button type="submit" class="waves-effect waves-light btn right">Envoyer</button>
          </div>

        </form>
      </div>
    </div>
  <?php endif;?>

  <div class="container">
      <ul class="pagination center">
          <?php for($i=1; $i<=$totalpages; $i++):?>
              <li class="waves-effect btn">
                  <a class="paginations pagincomms white-text" href="<?=$i?>"><?= $i?></a>
              </li>
          <?php endfor;?>
      </ul>
  </div>
</section>

<?php $this->stop('main_content') ?>

<?php $this->start('script') ?>
	<script type="text/javascript">
		var pageUrl = '<?= $this->url('ajaxprojectspagepagin', ["id" => $projets['id']]) ?>';
	</script>
<?php $this->stop('script') ?>
