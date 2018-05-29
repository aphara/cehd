<?php @session_start();
$title = 'CeHD - Gestion utilisateurs';
ob_start(); ?>


<div class="add_user">
    <h3>Ajouter un utilisateur</h3>
    <form action="index.php?action=add_user_front" method="post">
        <input type="image" name="add_user_btn" src="public/img/rounded-add-button.png">
    </form>
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
                <td> <a href="index.php?action=modify_user_form&id=<?= $userList['id_user'];?>"><button>Modifier</button></a>
                    <a href="index.php?action=delete&id=<?= $userList['id_user'];?>"><img src="public/img/bin.png" name="home"/></a> </td>
            </tr>
            <?php
        }
        ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>