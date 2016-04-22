<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php $this->start('main_content') ?>

<div class="container section center">
    <div class="row center">
        <div class="s8 offset-s2 col m8 offset-m2 l6 offset-l3 center align card-panel grey lighten-3 margetop box shadow-effect">
            <h3 class="teal-text text-lighten-2">Connexion</h3>
        </div>
        <form method="POST" class="col s6 offset-s3 col m6 offset-m3 col l6 offset-l3 margetop">
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <label for="login">Login</label>
                <input type="text" name="login" placeholder="Votre login" value="<?php if(isset($_POST['login'])){  echo $_POST['login'];} ?>">
            </div>
            <div class="input-field">
                <i class="material-icons prefix">verified_user</i>
                <label for="pass">Mot de passe</label>
                <input type="password" name="pass" placeholder="Votre mot de passe" value="<?php if(isset($_POST['pass'])){  echo $_POST['pass'];} ?>">
                <a href="<?= $this->url('reiniPass') ?>">Vous avez perdu votre mot de passe ?</a>
            </div>
            <div class="input-field">
                <input type="submit" name="but" value="Envoyer" class="waves-effect waves-light btn">
            </div>
        </form>
    </div>
</div>

<div class="center">
    <a class="btn waves-effect waves-light red darken-1" name="action" href="<?= $this->url('index') ?>">Retour à l'accueil </a>
</div>

<?php if(!empty($errors)) :?>
  <div class="section">
    <p class='red-text text-darken-1'>
    <?= implode('<br />', $errors)?>
    </p>
  </div>
<?php endif; ?>

<?php $this->stop('main_content') ?>
