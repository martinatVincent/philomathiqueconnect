<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/materialize.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php $this->insert('partials/header') ?>
	<main>
		<section>
			<?= $this->section('main_content') ?>
		</section>
	</main>
	<?php $this->insert('partials/footer') ?>

	<script type="text/javascript" src="<?= $this->assetUrl('js/jquery-2.2.0.js') ?>"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/materialize.js') ?>"></script>
	<?= $this->section('script') ?>
	<script type="text/javascript" src="<?= $this->assetUrl('js/script.js') ?>"></script>

</body>
</html>
