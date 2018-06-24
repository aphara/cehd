<?php @session_start();
$title = 'CeHD - Gestion modules - Lumières';
ob_start(); ?>

<h1>Gestion de la lumière</h1>
<form method="post" action="index.php?action=module_light">
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
    <h2>Lumière de la <?=$piece['name']?></h2>
    <table class="display" id="table_id">
        <thead>
        <tr>
            <th>Nom de la lumière</th>
            <th>Etat</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($req as $row => $donnees)
        /*while ($donnees = $req->fetch())*/{
            ?>
            <tr>
                <td><?= $donnees['effector_name'];?></td>
                <td><label class="switch">
                        <?php
                        $light=$donnees['request_value'];
                        echo '<input onchange="sendEffectorValue(this.id,'.$donnees['id_effector'].',this.checked)" '.($light=="ON"?"checked":"").' type="checkbox" id="light">'
                        ;?>
                        <span class="slider round"></span>
                    </label></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>



<?php $content_menu = ob_get_clean(); ?>

<?php require('tab_template.php'); ?>
