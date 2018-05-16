<?php $title = 'CeHD - Gestion maison';
@session_start();
ob_start(); ?>

<form action="index.php?action=add_room" method="post">
    <fieldset>
        <legend>Ajouter pièce</legend>

        <p>
            <input type="text" placeholder="Nom" id="add_name" name="_name" value="" required/>
        </p>
        <p>
            <input type="text" placeholder="Etage" id="add_floor" name="_floor" value="" required/>
        </p>
        <p>
            <input type="number" placeholder="Superficie en m²" id="add_size" name="_size" value="" step="0.001" min="0" required/>
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
            <input type="submit" value="Ajouter pièce"/>
        </p>

    </fieldset>
</form>

<?php $content = ob_get_clean();
require 'template_back.php'; ?>
