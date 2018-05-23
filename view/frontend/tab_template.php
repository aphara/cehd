<?php @session_start();
ob_start(); ?>

<div id="menu_management_content">
    <div id="menu">
        <ul id="onglets">
            <li><a href="index.php?action=module_light" >Lumière</a></li>
            <li><a href="index.php?action=module_temp" >Température</a></li>
            <li><a href="index.php?action=module_shutter" >Volet</a></li>
        </ul>
    </div>
    <div id="content_menu_management">
        <?= $content_menu ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>