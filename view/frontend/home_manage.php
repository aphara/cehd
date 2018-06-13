<?php @session_start();
$title = 'CeHD - Gestion Maison';
ob_start(); ?>



    <h1>gestion de la maison de <?= htmlspecialchars($_SESSION['name']) ?></h1>
    <div id="nav_home_management">
        <div>
            <h2>Température</h2>
            <h2>Lumière</h2>
            <h2>Alarme</h2>
        </div>

        <hr id="bare_vertical"/>

        <div>
            <h2>Volet</h2>
        </div>
    </div>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
