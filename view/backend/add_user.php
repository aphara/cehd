<?php $title = 'CeHD - Ajout d\'un utilisateur';
@session_start();
ob_start(); ?>


    <h1>Bienvenue <?= htmlspecialchars($_SESSION['name']) ?></h1>

    <form action="index.php?action=add_user_back" method="post">
        <fieldset>
            <legend>Ajouter client</legend>

            <p>
                <label for="add_firstname">Prénom :</label>
                <input type="text" placeholder="Prénom" id="add_firstname" name="_firstname" value="" required/>
                <label for="add_lastname">Nom :</label>
                <input type="text" placeholder="Nom" id="add_lastname" name="_lastname" value="" required/>
            </p>
            <p>
                <label for="add_mail">Adresse mail :</label>
                <input type="email" placeholder="Adresse email" id="add_mail" name="_mail" value="" required/>
            </p>
            <p>
                <label for="add_phone">Téléphone :</label>
                <input type="tel" placeholder="Téléphone" id="add_phone" name="_phone" value="" required/>
            </p>
            <p>
                <label for="add_date_of_birth">Date de naissance :</label>
                <input type="date" placeholder="jj/mm/aaaa" id="add_date_of_birth" name="_date_of_birth" value="" required/>
            </p>


            <p>
                <input type="submit" value="Ajouter client"/>
            </p>

        </fieldset>
    </form>


<?php $content = ob_get_clean(); ?>

<?php require('template_back.php'); ?>