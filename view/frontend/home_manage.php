<?php @session_start();
$title = 'CeHD - Gestion Maison';
ob_start(); ?>



    <h1>gestion de la maison de <?= htmlspecialchars($_SESSION['name']) ?></h1>
    <div id="nav_home_management">
        <div id="light">
            <h2>Température</h2>
            <h2>Lumière</h2>
            <!--<img src="public/img/.png"-->

            <h2>Alarme</h2>
        </div>
        <div id="volet">
            <h2>Volet</h2>
            <input type="range" orient="vertical" id="range_volet" list="tickmarks">
            <datalist id="tickmarks">
                <option value="0">
                <option value="10">
                <option value="20">
                <option value="30">
                <option value="40">
                <option value="50">
                <option value="60">
                <option value="70">
                <option value="80">
                <option value="90">
                <option value="100">
            </datalist>
        </div>
    </div>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
