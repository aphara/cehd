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

        foreach ($req as $row => $donnees){
            $shutter_request=$donnees['request_value'];
            $id=$donnees['id_effector'];
            ?>
            <tr>
                <td><?= $donnees['effector_name'];?></td>
                <?php ?>
                <td><div class="input-group plus-minus-input">
                        <button type="button" class="button hollow circle change_qty minus cursor_hover" data-quantity="minus" data-field="quantity<?= $donnees['id_effector'];?>" datafld="<?= $donnees['id_effector'];?>"  id="shutter">
                            <i class="material-icons">remove_circle_outline</i>
                        </button>

                        <input class="input-group-field" type="text" name="quantity<?= $donnees['id_effector'];?>" value="<?= $donnees['request_value']; ?>" max="100" min="0" step="5" readonly>

                        <button type="button" class="button hollow circle change_qty plus cursor_hover" data-quantity="plus" data-field="quantity<?= $donnees['id_effector'];?>" datafld="<?= $donnees['id_effector'];?>" id="shutter">
                            <i class="material-icons">add_circle_outline</i>
                        </button>

                    </div>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>

<script src="public/script/shutter_manage.js" type="text/javascript"></script>
<?php $content_menu = ob_get_clean(); ?>

<?php require('tab_template.php'); ?>
