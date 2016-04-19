<?php $this->layout('layout2',['title' => 'Ajouter un projet']) ?>
<?php $this->start('main_content') ?>
<div class="container center">
  <h4>Inserer un nouveaux projet</h4>
  <div class="row">
    <form method="POST" class="col s12 m12 l6 offset-l3" >
      <div class="input-field">
        <label for="project_title">Titre projet</label>
        <input type="text" name="project_title" placeholder="titre projet">
      </div>
      <div class="input-field">
        <label for="description">description projet</label>
        <input type="text" name="description" placeholder="description">
      </div>
      <div class="input-field">
        <label for="photo"><h5>inserer une photo de votre projet</h5></label>
        <input type="file" id="photo" name="photo">
      </div>
      <div class="input-field margetop">
        <input type="submit" name="but" value="Envoyer" class="waves-effect waves-light btn">
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
