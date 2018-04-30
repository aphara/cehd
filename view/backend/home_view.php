<?php $title = 'CeHD - Administateur'; ?>
<?php ob_start(); ?>



    <h1>Bienvenue <?= htmlspecialchars($_SESSION['name']) ?></h1>


<?php $content = ob_get_clean(); ?>

<?php require('template_back.php'); ?>