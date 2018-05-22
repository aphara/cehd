<?php @session_start();
$title = 'CeHD - Gestion modules - Volets';
ob_start(); ?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
