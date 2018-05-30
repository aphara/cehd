<?php @session_start();
$title = 'CeHD - programme';
ob_start(); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

