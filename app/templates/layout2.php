<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/materialize.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style2.css') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	<?php $this->insert('partials/header') ?>

	<div>
		<section>
			<?= $this->section('main_content') ?>
		</section>
	</div>

	<?php $this->insert('partials/footer') ?>

	<script type="text/javascript" src="<?= $this->assetUrl('js/jquery-2.2.0.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/materialize.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/script.js') ?>"></script>

	<?= $this->section('scripts') ?>
</body>
</html>
