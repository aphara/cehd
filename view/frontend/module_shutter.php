<?php @session_start();
$title = 'CeHD - Gestion modules - Volets';
ob_start(); ?>

<h1>gestion des volets de la maison de <?= htmlspecialchars($_SESSION['name']) ?></h1>

<form method="post" action=""
       <p>
        <label for="room">Pièce :</label><br/>
        <select name="_room" id="room" required>
                <option></option>
                <?php foreach ($req as $row => $roomList){ ?>
                        <option value=<?= $roomList['id_room'];?>> <?= $roomList['name'];?></option>
                    <?php }?>

            </select>
    </p>
<?php $content_menu = ob_get_clean(); ?>

<?php require('tab_template.php'); ?>
