<?php @session_start();
$title = 'CeHD - Gestion modules - Volets';
ob_start(); ?>

<h1>Gestion des volets</h1>

<form method="post" action="index.php?action=module_shutter">
    <label for="room">Pièce :</label><br/>
    <select name="_room" id="room" required name="piece">
        <option></option>
        <?php foreach ($req2 as $row => $roomList){ ?>
            <option value=<?= $roomList['id_room'];?>> <?= $roomList['name'];?></option>
        <?php }?>

    </select>
    <input type="submit" value="Valider" name="choix_piece"/>
</form>
<div>
    <?php $piece = $room ->fetch()?>
    <h2>Volet de la <?=$piece['name']?></h2>
    <table class="display" id="table_id">
        <thead>
        <tr>
            <th>Volet</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        <?php

        while ($donnees = $req->fetch()){
            ?>
            <tr>
                <td><?= $donnees['effector_name'];?></td>
                <td><?= $donnees['request_value'];?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php $content_menu = ob_get_clean(); ?>

<?php require('tab_template.php'); ?>
