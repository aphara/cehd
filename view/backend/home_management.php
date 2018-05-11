<?php $title = 'CeHD - Gestion maison';
@session_start();
ob_start(); ?>


<div id='nav_content'>
    <nav id='sidebar'>
        <ul>
            <li><a href="index.php?action=user_management&id=<?= $_SESSION['target_id']?>">Gestion Utilisateurs</a></li>
            <li><a href="index.php?action=home_management&id=<?= $_SESSION['target_id']?>">Gestion Maison</a></li>
        </ul>
    </nav>
</div>

<h1>Bienvenue</h1>
<?php $content = ob_get_clean(); ?>

<?php require('template_back.php'); ?>