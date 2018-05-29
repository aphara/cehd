<?php $title = 'CeHD - Modification d\'un utilisateur';
@session_start();
ob_start(); ?>


    <form action="index.php?action=modify_user_back" method="post">
        <fieldset>
            <legend>Modifier utilisateur</legend>
            <?php while($req=$user->fetch()){ ?>
            <p>
                <label for="add_firstname">Prénom :</label>
                <input type="text" placeholder="Prénom" id="add_firstname" name="_firstname" value="<?= $req['first_name'];?>" required/>
                <label for="add_lastname">Nom :</label>
                <input type="text" placeholder="Nom" id="add_lastname" name="_lastname" value="<?= $req['last_name'];?>" required/>
            </p>
            <p>
                <label for="add_mail">Adresse mail :</label>
                <input type="email" placeholder="Adresse email" id="add_mail" name="_mail" value="<?= $req['mail'];?>" required/>
            </p>
            <p>
                <label for="add_phone">Téléphone :</label>
                <input type="tel" placeholder="Téléphone" id="add_phone" name="_phone" value="<?= $req['phone'];?>" required/>
            </p>
            <p>
                <label for="add_date_of_birth">Date de naissance :</label>
                <input type="date" placeholder="jj/mm/aaaa" id="add_date_of_birth" name="_date_of_birth" value="<?= $req['date_of_birth'];?>" required/>
            </p>


            <p>
                <input type="submit" value="Modifier client"/>
            </p>
            <?php }?>

        </fieldset>
    </form>


<?php $content = ob_get_clean(); ?>

<?php require('template_back.php'); ?>