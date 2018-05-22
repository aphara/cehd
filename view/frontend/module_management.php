<?php @session_start();
$title = 'CeHD - Gestion modules';
ob_start(); ?>

<div id="menu">
    <ul id="onglets">
        <li class="active"><a href=""></a></li>
        <li><a href="index.php?action=module_light" >Lumière</a></li>
        <li><a href="index.php?action=module_temp" >Température</a></li>
        <li><a href="index.php?action=module_shutter" >Volet</a></li>
    </ul>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

