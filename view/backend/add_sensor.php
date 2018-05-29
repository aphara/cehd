<?php $title = 'CeHD - Ajout de capteurs';
@session_start();
ob_start(); ?>

    <form action="index.php?action=add_sensor" method="post">
        <fieldset>
            <legend>Ajouter module</legend>

            <p>
                <input type="number" placeholder="Numéro de série" id="add_id" name="_id" value="" step="1" min="1" required/>
            </p>
            <p>
                <input type="text" placeholder="Nom" id="add_name" name="_name" value="" required/>
            </p>

            <p>
                <label for="sensor_type">Type de capteur :</label><br/>
                <select name="_sensor_type" id="sensor_type" required>
                    <option value="LIGHT">Lumière</option>
                    <option value="TEMP">Température</option>
                    <option value="SHUTTER">Volet</option>
                </select>
            </p>

            <p>
                <label for="room">Pièce :</label><br/>
                <select name="_room" id="room" required>
                    <?php foreach ($req as $row => $roomList){ ?>
                        <option value=<?= $roomList['id_room'];?>> <?= $roomList['name'];?></option>
                    <?php }?>
                </select>
            </p>

            <p>
                <input type="submit" value="Ajouter capteur"/>
            </p>

        </fieldset>
    </form>

<?php $content = ob_get_clean();
require 'template_back.php'; ?>