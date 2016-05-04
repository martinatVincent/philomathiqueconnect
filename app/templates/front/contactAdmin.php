<?php $this->layout('layout', ['title' => 'Contact Admin']) ?>

<?php $this->start('main_content') ?>
<div class="container section center margetop">
    <div class="col s8 offset-s2 m8 offset-m2 l6 offset-l3 center align card-panel teal lighten-4">
        <h2>Contacter l'administrateur</h2>
    </div>
    <div class="row">
        <form method="POST" class="col s6 offset-s3 col m6 offset-m3 col l6 offset-l3 margetop">
            <div class="row">
                <div class="input-field col s12 m12 l6">
                  <i class="material-icons prefix">perm_identity</i>
                    <input placeholder="Prénom"  name="prenom" type="text" class="validate">
                </div>
                <div class="input-field col s12 m12 l6">
                  <i class="material-icons prefix">perm_identity</i>
                    <input placeholder="Nom"  name="nom"type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <i class="material-icons prefix">email</i>
                    <input type="text" name="email" placeholder="Votre email">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                  <i class="material-icons prefix">info_outline</i>
                    <input placeholder="Objet du message" name="objet" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <i class="material-icons prefix">chat_bubble_outline</i>
                    <textarea name="message" class="materialize-textarea"placeholder="Votre message"></textarea>
                </div>
            </div>
            <div class="input-field">
                <input type="submit" value="Envoyer" class="teal waves-effect waves-light btn">
            </div>
        </form>
    </div>
    <div class="center">
      <a class="btn waves-effect waves-light red darken-1" name="action" href="<?= $this->url('index') ?>">Retour à l'accueil</a>
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
