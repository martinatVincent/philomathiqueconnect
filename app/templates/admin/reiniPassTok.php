<?php $this->layout('layout2', ['title' => 'ReiniToken']) ?>

<?php $this->start('main_content') ?>
<div class="container section center">
  <div class="row center">
    <div class="s8 offset-s2 col m8 offset-m2 l6 offset-l3 center align card-panel teal lighten-2 margetop">
      <h3 class="white-text">Reinitialiser votre mot de passe</h3>
    </div>
      <form method="POST" class="col s6 offset-s3 col m6 offset-m3 col l6 offset-l3 margetop">
        <div class="input-field">
            <i class="material-icons prefix">verified_user</i>
            <input type="password" name="pass" placeholder="Votre mot de passe" value="<?php if(isset($_POST['pass'])){  echo $_POST['pass'];} ?>">
        </div>
          <div class="input-field">
              <i class="material-icons prefix">verified_user</i>
              <input type="password" name="confirm_pass" placeholder="Saisissez de nouveau votre mot de passe" value="<?php if(isset($_POST['pass'])){  echo $_POST['pass'];} ?>">
          </div>
          <div class="input-field">
              <input type="submit" name="but" value="Envoyer" class="waves-effect waves-light btn">
          </div>
      </form>
  </div>
  <div class="center">
      <a class="btn waves-effect waves-light red darken-1" name="action" href="<?= $this->url('index') ?>">Retour à l'accueil </a>
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
