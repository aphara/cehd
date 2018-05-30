<?php @session_start();
$title = 'CeHD - Associer modules';
ob_start(); ?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
