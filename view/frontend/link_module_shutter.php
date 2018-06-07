<?php @session_start();
$title = 'CeHD - Associer modules - shutter';
ob_start(); ?>

    <h1>Associasion des shutter de la maison de <?= htmlspecialchars($_SESSION['name']) ?></h1>


<?php $content_link = ob_get_clean(); ?>

<?php require('template_link.php'); ?>