<?php $title = 'CeHD - Ajout d\'actionneurs';
@session_start();
ob_start(); ?>

    <form action="index.php?action=add_effector" method="post">
        <fieldset>
            <legend>Ajouter actionneur</legend>

            <p>
                <label for="add_id">Numéro de série :</label><br/>
                <input type="number" placeholder="Numéro de série" id="add_id" name="_id" value="" step="1" min="1" required/>
            </p>
            <p>
                <label for="add_name">Nom de l'actionneur :</label><br/>
                <input type="text" placeholder="Nom" id="add_name" name="_name" value="" required/>
            </p>

            <p>
                <label for="effector_type">Type d'actionneur :</label><br/>
                <select name="_effector_type" id="effector_type" required>
                    <option></option>
                    <option value="LIGHT_CTRL">Lumière</option>
                    <option value="TEMP_CTRL">Température</option>
                    <option value="SHUTTER_CTRL">Volet</option>
                </select>
            </p>

            <p>
                <label for="room">Pièce :</label><br/>
                <select name="_room" id="room" required>
                    <option></option>
                    <?php foreach ($req as $row => $roomList){ ?>
                        <option value=<?= $roomList['id_room'];?>> <?= $roomList['name'];?></option>
                    <?php }?>
                </select>
            </p>

            <p>
                <input type="submit" value="Ajouter actionneur"/>
            </p>

        </fieldset>
    </form>

<?php $content = ob_get_clean();
require 'template_back.php'; ?>