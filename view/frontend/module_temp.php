<?php @session_start();
$title = 'CeHD - Gestion modules - Température';
ob_start(); ?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
