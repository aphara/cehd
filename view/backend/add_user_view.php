<?php $title = 'CeHD - Ajout d\'utilisateur'; ?>
<?php @session_start(); ?>
<?php ob_start(); ?>


    <h1>Bienvenue <?= htmlspecialchars($_SESSION['name']) ?></h1>

    <form action="index.php?action=add_user">
        <fieldset>
            <legend>Ajouter client</legend>

            <p>
                <input type="text" placeholder="Nom" id="add_firstname" name="_firstname" value=""/>
                <input type="text" placeholder="Nom" id="add_lastname" name="_lastname" value=""/>
            </p>
            <p>
                <input type="text" placeholder="Adresse email" id="add_mail" name="_mail" value=""/>
            </p>
            <p>
                <input type="date" placeholder="jj/mm/aaaa" id="add_date_of_birth" name="_date_of_birth" value=""/>
            </p>
            <p>
                <input type="text" placeholder="Adresse" id="add_address" name="_address" value=""/>
            </p>
            <p>
                <input type="text" placeholder="Ville" id="add_city" name="_city" value=""/>
            </p>
            <p>
                <input type="text" placeholder="Code Postal" id="add_postcode" name="_postcode" value=""/>
            </p>


        </fieldset>
    </form>


<?php $content = ob_get_clean(); ?>

<?php require('template_back.php'); ?>