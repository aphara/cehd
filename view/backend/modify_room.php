<?php $title = 'CeHD - Modification pièce';
@session_start();
ob_start(); ?>

    <form action="index.php?action=modify_room" method="post">
        <fieldset>
            <legend>Modifier pièce</legend>
            <?php while($req=$room->fetch()){ ?>
                <p>
                    <input type="text" placeholder="Nom" id="add_name" name="_name" value="<?= $req['name'];?>" required/>
                </p>

                <p>
                    <input type="text" placeholder="Etage" id="add_floor" name="_floor" value="<?= $req['floor_name'];?>" required/>
                </p>
                <p>
                    <input type="number" step="0.001" min=0 placeholder="Superficie en m²" id="add_size" name="_size" value="<?= $req['size'];?>" required/>
                </p>

                <p>
                    <label for="type">Type de pièces :</label><br/>
                    <select name="_room_type" id="room_type" required>
                        <option value="CHAMBRE">Chambre</option>
                        <option value="SALON">Salon</option>
                        <option value="CUISINE">Cuisine</option>
                        <option value="TOILETTE">Toilette</option>
                        <option value="SALLE DE BAIN">Salle de bain</option>
                        <option value="BUREAU">Bureau</option>
                        <option value="AUTRE">Autre</option>
                    </select>
                </p>

                <p>
                    <input type="submit" value="Modifier pièce"/>
                </p>
            <?php }?>



        </fieldset>
    </form>

<?php $content = ob_get_clean();
require 'template_back.php'; ?>