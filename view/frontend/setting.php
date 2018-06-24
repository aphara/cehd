<?php @session_start();
$title = 'CeHD - setting';
ob_start(); ?>

    <ul class="allset">
        <!--first name-->
        <li class="testli">
            <!--<button class="buttonset" onclick="OnOff_1();" ><span class="buttontext">Changer les informations</span></button>-->
            <input type="button" value="Changer les informations" class="bouton" onclick="OnOff(1);">
            <div id="identity" class="hidden_content">

                prenom :    <?php echo $resultat['first_name'];?>
                <form action="index.php?action=update_firstname" method="post">
                    <input  type="text" name="_first_name" required>
                    <input  type="submit" value="changer prenom">
                </form>


                <!--last name-->

                nom :    <?php echo $resultat['last_name'];?>
                <form action="index.php?action=update_lastname" method="post">
                    <input type="text" name="_last_name" required>
                    <input type="submit" value="changer nom de famille">
                </form>

                <!--birth date-->
                date de naissance :     <?php echo $resultat['date_of_birth'];?>
                <form action="index.php?action=update_birthdate" method="post">
                    <input type="date" name="_birthdate" required>
                    <input type="submit" value="changer date de naissance">
                </form>


                <!-- phone number-->
                numero de telephone :     <?php echo $resultat['phone'];?>
                <form action="index.php?action=update_phone_number" method="post">
                    <input type="text"  name="_phone_number" required>
                    <input type="submit" value="changer numero">
                </form>

            </div>
        </li>

        <hr>

        <li class="changemailet">
            <!-- mail-->
            <input type="button" value="Changer mail" class="bouton" onclick="OnOff(2);">
            <div id="changemail" class="hidden_content">

                e-mail :      <?php echo $resultat['mail'];?>
                <form action="index.php?action=update_email" method="post">
                    <!-- changement-->
                    <input type="text" name="_mail" required>
                    <input type="submit" value="changer mail">
                </form>
            </div>
        </li>

        <hr>

        <li class="changepasswordset">
            <input type="button" value="Changer mot de passe" class="bouton" onclick="OnOff(3);">
            <!--password -->
            <div id="changepassword" class="hidden_content">
                <form action="index.php?action=update_password" method="post">
                    <!--verification-->
                    verification <br>
                    <input type="password" name="_old_password" required> <br>
                    <!--changement -->
                    nouveau mot de passe<br>
                    <input type="password" name="_password" required><br>
                    confirmer mot de passe <br>
                    <input type="password" name="_verifpassword" required><br>
                    <input type="submit" value="changer mot de passe">
                </form>
            </div>
        </li>
    </ul>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>