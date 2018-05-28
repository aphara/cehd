<?php @session_start();
$title = 'CeHD - Stats Générales';
ob_start();?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
