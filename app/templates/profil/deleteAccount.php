<?php $this->layout('layout', ['title' => 'Suppression de compte']) ?>

<?php $this->start('main_content') ?>
<div class="container center">
  <h3 id="marge-titre" class"container grey lighten-4 z-depth-1">Êtes Vous sûr de vouloir supprimer votre profil ?</h3>
  <div class="row ">
    <form method="POST" class="col s12 m12 l6 offset-l3">
        <div class="input-field">
          <i class="material-icons prefix">email</i>
          <label for="email">E-mail</label>
          <input type="text" name="email" placeholder="Votre email">
        </div>
        <div class="input-field">
          <i class="material-icons prefix">verified_user</i>
          <label for="pass">Veuillez entrer votre mot de passe</label>
          <input type="password" name="pass" placeholder="Votre mot de passe">
        </div>
        <div class="input-field">
          <input type="submit" name="but" value="SUPPRIMER MON COMPTE" class="teal waves-effect waves-light btn">
        </div>
        <br>
        <div class="center">
          <a class="btn waves-effect waves-light red darken-1" name="action" href="<?= $this->url('profiluser', ['id' => $id]) ?>">Retour au profil</a>
        </div>
    </form>
  </div>
</div>

<?php if(!empty($errors)) :?>
  <div class="section">
    <p class='red-text text-darken-1'>
    <?= implode('<br />', $errors)?>
    </p>
  </div>
<?php endif; ?>
<?php if(!empty($success)) :?>
  <div class="section">
    <p class='green-text text-darken-1'><?=$success?></p>
  </div>
<?php endif; ?>

<?php $this->stop('main_content') ?>
