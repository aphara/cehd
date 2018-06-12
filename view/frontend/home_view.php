<?php @session_start();
$title = 'CeHD - Accueil';
ob_start(); ?>



<h1 id="acceuil">Bienvenue <?= htmlspecialchars($_SESSION['name']) ?></h1>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
