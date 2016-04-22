<?php $this->layout('layout', ['title' => 'Contact Profil']) ?>

<?php $this->start('main_content') ?>
<div class="container center">
  <h3 id="marge-titre" class"container grey lighten-4 z-depth-1">Contact</h3>
  <div class="row ">
    <form method="POST" class="col s12 m12 l6 offset-l3">
        <div class="input-field">
            <label for="nom"></label>
            <i class="material-icons prefix">perm_identity</i>
            <input type="text" name="nom" placeholder="Votre nom">
        </div>
        <div class="input-field">
            <label for="objet"></label>
            <i class="material-icons prefix">picture_in_picture</i>
            <input type="text" name="objet" placeholder="Votre Objet">
        </div>
        <div class="input-field">
            <label for="email"></label>
            <i class="material-icons prefix">email</i>
            <input type="text" name="email" placeholder="Votre email">
        </div>
        <div class="input-field">
            <label for="email"></label>
            <i class="material-icons prefix">chat_bubble_outline</i>
            <textarea name="message" class="materialize-textarea" placeholder="Votre message"></textarea>
        </div>
        <div id="button-contact" class="input-field">
            <input type="submit" name="but" value="Envoyer" class="teal waves-effect waves-light btn">
        </div>
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
