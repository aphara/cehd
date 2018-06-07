<?php $title = 'CeHD - Gestion maison';
@session_start();
ob_start(); ?>


<div id='nav_sidebar'>
    <nav id='sidebar'>
        <ul>
            <li><a href="index.php?action=user_management&id=<?= $_SESSION['target_id']?>">Gestion Utilisateurs</a></li>
            <li><a href="index.php?action=home_management&id=<?= $_SESSION['target_id']?>">Gestion Maison</a></li>
        </ul>
    </nav>
</div>
<div id='nav_content'>
    <div>
    <nav id="topbar">
        <ul>
            <li><a href="index.php?action=home_management&id=<?= $_SESSION['target_id']?>">Gestion Pièces</a></li>
            <li><a href="index.php?action=module_management&id=<?= $_SESSION['target_id']?>">Gestion Modules</a></li>
        </ul>
    </nav>
    </div>

    <div class="content_content">
        <div class="add_button">
            <h3>Ajouter une pièce</h3>
            <form action="index.php?action=add_room_form" method="post">
                <input type="image" name="add_user_btn" src="public/img/rounded-add-button.png">
            </form>
        </div>

        <div class="ref_table">
            <table id="table_id">
                <thead>
                <tr>
                    <th>Pièce</th>
                    <th>Etage</th>
                    <th>Superficie</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($req as $row => $roomList){ ?>
                    <tr>
                        <td> <?= $roomList['name'];?> </td>
                        <td> <?= $roomList['floor_name'];?> </td>
                        <td> <?= $roomList['size'];?> </td>
                        <?php $target_room=$roomList['id_room'];?>
                        <td> <a href="index.php?action=modify_room_form&id=<?= $target_room?>"><button>Modifier</button></a>
                            <a href="index.php?action=delete_room&id_room=<?= $target_room;?>"><img src="public/img/bin.png" name="home"/></a> </td>
                    </tr>
                    <?php
                }
                ?>

                </tbody>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template_back.php'); ?>