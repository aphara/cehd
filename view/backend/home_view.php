<?php $title = 'CeHD - Administateur';
@session_start();
ob_start(); ?>


    <div class="add_button">
        <form class="ajouter" action="index.php?action=add_client_form" method="post">
            <input class="ajouter" type="image" name="add_user_btn" src="public/img/rounded-add-button.png" />
        </form>
        <h3>Ajouter un utilisateur</h3>
    </div>
    <hr/>
    <div class="ref_table">
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Adresse Mail</th>
                    <th>Téléphone</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while($ref_home=$req->fetch())
            { ?>
                <tr>
                    <td> <?= $ref_home['id_home'];?> </td>
                    <td> <?= $ref_home['mail'];?> </td>
                    <td> <?= $ref_home['phone'];?> </td>
                    <td> <?= $ref_home['last_name'];?> <?= $ref_home['first_name'];?></td>
                    <td> <?= $ref_home['address'];?>, <?= $ref_home['postcode'];?>, <?= $ref_home['city'];?> </td>
                    <?php $target_id=$ref_home['id_user'];?>
                    <td> <a href="index.php?action=user_management&id=<?= $target_id;?>"><img src="public/img/user_img.png" name="user"/></a>
                        <a href="index.php?action=home_management&id=<?= $target_id;?>"><img src="public/img/home_img.png" name="home"/></a> </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template_back.php'); ?>