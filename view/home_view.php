<?php $title = 'CeHD - Accueil'; ?>
<?php ob_start(); ?>


<body>
<h1>Bienvenue <?= htmlspecialchars($_SESSION['name']) ?></h1>
</body>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
