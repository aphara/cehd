<?php $title = 'CeHD - Ajout d\'un client';
@session_start();
ob_start(); ?>


    <h1>Bienvenue <?= htmlspecialchars($_SESSION['name']) ?></h1>

    <form action="index.php?action=add_client" method="post">
        <fieldset>
            <legend>Ajouter client</legend>

            <p>
                <input type="text" placeholder="Prénom" id="add_firstname" name="_firstname" value="" required/>
                <input type="text" placeholder="Nom" id="add_lastname" name="_lastname" value="" required/>
            </p>
            <p>
                <input type="email" placeholder="Adresse email" id="add_mail" name="_mail" value="" required/>
            </p>
            <p>
                <input type="tel" placeholder="Téléphone" id="add_phone" name="_phone" value="" required/>
            </p>
            <p>
                <input type="date" placeholder="jj/mm/aaaa" id="add_date_of_birth" name="_date_of_birth" value="" required/>
            </p>
            <p>
                <input type="text" placeholder="Adresse" id="add_address" name="_address" value="" required/>
            </p>
            <p>
                <input type="text" placeholder="Ville" id="add_city" name="_city" value="" required/>
            </p>
            <p>
                <input type="text" placeholder="Code Postal" id="add_postcode" name="_postcode" value="" required/>
            </p>
            <p>
                <label for="home_type">Type de domicile :</label><br/>
                <select name="_home_type" id="home_type">
                    <option value="Maison" selected>Maison</option>
                    <option value="Appartement">Appartement</option>
                </select>
            </p>

            <p>
                <input type="submit" value="Ajouter client"/>
            </p>

        </fieldset>
    </form>


<?php $content = ob_get_clean(); ?>

<?php require('template_back.php'); ?>