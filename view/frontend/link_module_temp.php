<?php @session_start();
$title = 'CeHD - Associer modules - temperature';
ob_start(); ?>

    <h1>Associer les capteur de température de la maison de <?= htmlspecialchars($_SESSION['name']) ?></h1>


<?php $content_link = ob_get_clean(); ?>

<?php require('template_link.php'); ?>