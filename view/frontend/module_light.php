<?php @session_start();
$title = 'CeHD - Gestion modules - Lumières';
ob_start(); ?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
