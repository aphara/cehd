<?php $title = 'CeHD - Administateur'; ?>
<?php @session_start(); ?>
<?php ob_start(); ?>



    <h1>Bienvenue <?= htmlspecialchars($_SESSION['name']) ?></h1>

    <form>

        <div class="searchbar">
            <h3>Recherche :</h3>
            <select name="_searchbar_mode" id="searchbar_mode">
                <option value="id" selected>par Référence</option>
                <option value="mail">par Adresse Mail</option>
                <option value="phone">par Téléphone</option>
                <option value="name">par Nom</option>
            </select>

            <input type="submit" value="Rechercher">
        </div>
    </form>

    <div class="add_user">
        <h3>Ajouter un utilisateur</h3>
        <form action="index.php?action=add_user_form" method="post">
            <input type="image" name="add_user_btn" src="public/img/rounded-add-button.png">
        </form>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template_back.php'); ?>