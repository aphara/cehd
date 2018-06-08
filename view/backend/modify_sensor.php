<?php $title = 'CeHD - Modification capteur';
@session_start();
ob_start(); ?>

    <form action="index.php?action=modify_sensor" method="post">
        <fieldset>
            <legend>Modifier capteur</legend>
            <?php while($req=$sensor->fetch()){ ?>

                <p>
                    Numéro de série :<br/>
                    <?= $req['id_sensor'];?>
                </p>
                <?php $_SESSION['sensor_name']=$req['sensor_name'];?>
                <p>
                    <label for="add_name">Nom :</label><br/>
                    <input type="text" placeholder="Nom" id="add_name" name="_name" value="<?= $_SESSION['sensor_name'];?>" required/>
                </p>

                <p>
                    <label for="sensor_type">Type de capteur :</label><br/>
                    <select name="_sensor_type" id="sensor_type" required>
                        <option value="<?= $req['sensor_type'];?>"> <?= $req['sensor_type'];?></option>
                        <option value="LIGHT">Lumière</option>
                        <option value="TEMP">Température</option>
                        <option value="SHUTTER">Volet</option>
                    </select>
                </p>
            <?php }?>
            <p>
                <label for="room">Pièce :</label><br/>
                <select name="_room" id="room" required>
                    <option></option>
                    <?php foreach ($req1 as $row => $roomList){ ?>
                        <option value=<?= $roomList['id_room'];?>> <?= $roomList['name'];?></option>
                    <?php }?>

                </select>
            </p>

            <p>
                <input type="submit" value="Modifier capteur"/>
            </p>
        </fieldset>
    </form>

<?php $content = ob_get_clean();
require 'template_back.php'; ?>