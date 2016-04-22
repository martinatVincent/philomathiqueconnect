<?php $this->layout('layout', ['title' => 'Deconnect']) ?>

<?php $this->start('main_content') ?>
<?php if($vue == true ):?>
<div class="container section center margetop">
  <div class="row center">
    <div class="col s8 offset-s2  m8 offset-m2 l6 offset-l3 center align card-panel grey lighten-3 box shadow-effect">
      <h3 class="teal-text text-lighten-2">Déconnexion</h3>
      <p class="teal-text text-lighten-2 grey lighten-3">Etes vous sur de vouloir vous déconnecter ?</p>
    </div>
  <form method="POST" class="s6 offset-s3 col m6 offset-m3 col l6 offset-l3 margetop">
    <div class="input-field">
        <input type="submit" name="but" value="deconnexion" class="waves-effect waves-light btn deco-btn">
    </div>
  </form>
</div>
  <div class="center">
      <a class="btn waves-effect waves-light red darken-1 deco-btn2" name="action" href="<?= $this->url('index') ?>">Retour à l'accueil</a>
  </div>

<?php endif;?>
<?php if($vue == false): ?>

  <div class="container section center">
    <div class="row center">
      <div class="col s8 offset-s2  m8 offset-m2col l6 offset-l3 center align card-panel grey lighten-3 box shadow-effect">
        <h3 class="teal-text text-lighten-2">Vous êtes déconnecté(e) </h3>
        <p class="teal-text text-lighten-2">Philomathique Unity vous souhaite une excellente Journée :) </p>
      </div>
    </div>
      <div class="center">

        <a class="btn waves-effect waves-light red darken-1" name="action" href="<?= $this->url('index') ?>">Retour à l'accueil</a>
      </div>
  </div>

<?php endif; ?>
<?php $this->stop('main_content') ?>
