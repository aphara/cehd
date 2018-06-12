<?php
$title = 'CeHD - Contact Public';
ob_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>CeHD - Contact Public</title>
    <link href="public/css/style.css" rel="stylesheet"/>
</head>

<body>
<div class="img_titlepu">
    <img src='public/img/LOGO_login.png' alt='logo' id="img_logo"/>
    <h1>Contact</h1>

</div>



    <p>Envoyez nous un mail ! </p>
    <section id="corps_contact_public">

        <form method="post" id="form_contact" action="index.php?action=sendmail_public">
            <input type="text" name="mail_public" placeholder="Votre e-mail" id="mail_public">
            <input type="text" name="object_contact_public" placeholder="Object" id="object_contact_public"/>

            <textarea name="message_contact_public" rows="10" cols="50" id="message_contact_public">


            </textarea>

            <input type="submit" name="sendmail_public" value="Envoyer" id="envoyer_contact"/>
        </form>


        <div id="findepage_contact">
            <div id="coordonnees_contact">
                <p>
                    DomISEP <br>
                    10 rue de Vanves <br>
                    92130 Issy-les-Moulineaux <br>
                    France <br>
                    +33 1 23 45 67 89 <br>
                </p>
            </div>


        </div>

    </section>
</div>
</body>

</html>

