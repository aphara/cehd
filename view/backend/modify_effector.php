<?php $title = 'CeHD - Modification actionneur';
@session_start();
ob_start(); ?>

    <form action="index.php?action=modify_effector" method="post">
        <fieldset>
            <legend>Modifier actionneur</legend>
            <?php while($req=$effector->fetch()){ ?>

                <p>
                    Numéro de série :<br/>
                    <?= $req['id_effector'];?>
                </p>
                <?php $_SESSION['effector_name']=$req['effector_name'];?>
                <p>
                    <label for="add_name">Nom :</label><br/>
                    <input type="text" placeholder="Nom" id="add_name" name="_name" value="<?= $_SESSION['effector_name'];?>" required/>
                </p>

                <p>
                    <label for="effector_type">Type d'actionneur :</label><br/>
                    <select name="_effector_type" id="effector_type" required>
                        <option value="<?= $req['effector_type'];?>"> <?= $req['effector_type'];?></option>
                        <option value="LIGHT_CTRL">Lumière</option>
                        <option value="TEMP_CTRL">Température</option>
                        <option value="SHUTTER_CTRL">Volet</option>
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
                <input type="submit" value="Modifier actionneur"/>
            </p>
        </fieldset>
    </form>

<?php $content = ob_get_clean();
require 'template_back.php'; ?>