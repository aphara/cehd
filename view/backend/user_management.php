<?php $title = 'CeHD - Gestion utilisateur'; ?>
<?php @session_start(); ?>
<?php ob_start(); ?>


<div id='nav_content'>
<nav id='sidebar'>
    <ul>
        <li><a href="index.php?action=user_management.">Gestion Utilisateurs</a></li>
        <li><a href="index.php?action=home_management">Gestion Maison</a></li>
    </ul>
</nav>
</div>

<div>
    <div>
        <h1>Domicile de <?= $user[0]['first_name'];?> <?= $user[0]['last_name'];?></h1>
    </div>

    <div class="ref_table">
        <table>
            <thead>
            <tr>
                <th>Référence</th>
                <th>Adresse Mail</th>
                <th>Statut</th>
                <th>Nom et prénom</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $row => $userList){ ?>
                    <tr>
                        <td> <?= $userList['id_user'];?> </td>
                        <td> <?= $userList['mail'];?> </td>
                        <td> <?= $userList['status'];?> </td>
                        <td> <?= $userList['last_name'];?> <?= $userList['first_name'];?></td>
                        <td> <?= $userList['phone'];?> </td>
                        <td> <a href="#"><img src="public/img/user_img.png" name="user"/></a>
                            <a href="#"><img src="public/img/home_img.png" name="home"/></a> </td>
                    </tr>
                <?php
                }
                ?>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('template_back.php'); ?>