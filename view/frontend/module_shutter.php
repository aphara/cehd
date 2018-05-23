<?php @session_start();
$title = 'CeHD - Gestion modules - Volets';
ob_start(); ?>

<h1>gestion des volets de la maison de<?= htmlspecialchars($_SESSION['name']) ?></h1>


<?php $content_menu = ob_get_clean(); ?>

<?php require('tab_template.php'); ?>
