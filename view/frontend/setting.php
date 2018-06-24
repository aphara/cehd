<?php @session_start();
$title = 'CeHD - setting';
ob_start(); ?>
    <script>

        function Form_name() {
            var x = document.forms["firstnameform"]["_first_name"].value;
            var test = document.forms["firstnameform"]["_old_first_name"].value;
            if (x == "") {
                alert("champ vide");
                return false;
            }else if (x == test ) {
                alert("on ne peut mettre le même prénom");
                return false;
            }else{
                return true;
            }
        }


        function validpassword(){
            var x = document.forms["settingpassword"]["_password"].value;
            var y = document.forms["settingpassword"]["_verifpassword"].value;
            if (x!==y){
                alert("mot de passe différent");
                return false;
            }else{
                return true;
            }
        }


        function Form_last_name() {
            var x = document.forms["lastnameform"]["_last_name"].value;
            var test = document.forms["lastnameform"]["_old_last_name"].value;
            if (x == "") {
                alert("champ vide");
                return false;
            }else if (x == test ) {
                alert("on ne peut mettre le même nom de famille");
                return false;
            }else{
                return true;
            }
        }

        function Form_birthdate() {
            var x = document.forms["birthdateform"]["_birthdate"].value;
            var test = document.forms["birthdateform"]["_old_birthdate"].value;
            if (x == "") {
                alert("champ vide");
                return false;
            }else if (x == test ) {
                alert("on ne peut mettre la même date de naissance");
                return false;
            }else{
                return true;
            }
        }

        function Form_phone() {
            var x = document.forms["phoneform"]["_phone_number"].value;
            var test = document.forms["phoneform"]["_old_phone_number"].value;
            if (x == "") {
                alert("champ vide");
                return false;
            }else if (x == test ) {
                alert("on ne peut mettre le même numéro de téléphone");
                return false;
            }else{
                return true;
            }
        }

        function Form_mail() {
            var x = document.forms["mailform"]["_mail"].value;
            var test = document.forms["mailform"]["_old_mail"].value;
            if (x == "") {
                alert("champ vide");
                return false;
            }else if (x == test ) {
                alert("on ne peut mettre la même addresse mail");
                return false;
            }else{
                return true;
            }
        }



    </script>

    <ul class="allset">
        <!--first name-->
        <li class="testli">
            <!--<button class="buttonset" onclick="OnOff_1();" ><span class="buttontext">Changer les informations</span></button>-->
            <input type="button" value="Modifier les informations" class="bouton" onclick="OnOff(1);">
            <div id="identity" class="hidden_content">

                <span >Prénom :    <?php echo $resultat['first_name'];?></span>
                <form name="firstnameform" action="index.php?action=update_firstname" onsubmit="return Form_name()" method="post">
                    <input class="inputsetting"  type="text" name="_first_name" required>
                    <input type="hidden" name="_old_first_name" value="<?php echo $resultat['first_name'];?>" >
                    <input type="submit" value="Valider" >
                </form>

                <!--last name-->

                Nom :    <?php echo $resultat['last_name'];?>
                <form name="lastnameform" action="index.php?action=update_lastname" onsubmit="return Form_last_name()" method="post">
                    <input type="text" name="_last_name" required>
                    <input type="hidden" name="_old_last_name" value="<?php echo $resultat['last_name'];?>" >
                    <input type="submit" value="Valider">
                </form>

                <!--birth date-->
                Date de naissance :     <?php echo $resultat['date_of_birth'];?>
                <form name="birthdateform" action="index.php?action=update_birthdate" onsubmit="return Form_birthdate()" method="post">
                    <input type="date" name="_birthdate" required>
                    <input type="hidden" name="_old_birthdate" value="<?php echo $resultat['date_of_birth'];?>" >
                    <input type="submit" value="Valider">
                </form>


                <!-- phone number-->
                Numéro de téléphone :     <?php echo $resultat['phone'];?>
                <form name="phoneform" action="index.php?action=update_phone_number" onsubmit="return Form_phone()" method="post">
                    <input type="text"  name="_phone_number" required>
                    <input type="hidden" name="_old_phone_number" value="<?php echo $resultat['phone'];?>" >
                    <input type="submit" value="Valider">
                </form>

            </div>
        </li>

        <hr>

        <li class="changemailet">
            <!-- mail-->
            <input type="button" value="Modifer l'addresse e-mail" class="bouton" onclick="OnOff(2);">

            <div id="changemail" class="hidden_content">

                e-mail :      <?php echo $resultat['mail'];?>
                <form name="mailform" action="index.php?action=update_email" method="post" onsubmit="return Form_mail()">
                    <!-- changement-->
                    <input type="text" name="_mail" required>
                    <input type="hidden" name="_old_mail" value="<?php echo $resultat['mail'];?>" >
                    <input type="submit" value="Valider">
                </form>
            </div>
        </li>

        <hr>

        <li class="changepasswordset">
            <input type="button" value="Modifier le mot de passe" class="bouton" onclick="OnOff(3);">
            <!--password -->
            <div id="changepassword" class="hidden_content">
                <form action="index.php?action=update_password" method="post">
                    <!--verification-->
                    Vérification <br>
                    <input type="password" name="_old_password" required> <br>
                    <!--changement -->
                    Nouveau mot de passe<br>
                    <input type="password" name="_password" required><br>
                    Confirmer mot de passe <br>
                    <input type="password" name="_verifpassword" required><br>
                    <input type="submit" value="Valider">
                </form>
            </div>
        </li>
    </ul>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>