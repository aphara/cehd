<?php @session_start();
$title = 'CeHD - Gestion Maison';
ob_start(); ?>



<h1>gestion de la maison de <?= htmlspecialchars($_SESSION['name']) ?></h1>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
