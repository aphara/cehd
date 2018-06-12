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

<div id='logo'>
    <a href="index.php?action=login_view"><img src='public/img/LOGO_small.png' alt='logo'/></a>
</div>
<div class="content_public" id="page_contact">
    <h1 id="title_contact">Contact</h1>
    <div id="intro_contact"><p>Envoyez nous un mail ! </p></div>
    <section id="corps_contact">


        <form method="post" id="form_contact" action="index.php?action=sendmail_public">
            <input type="text" name="mail_public" placeholder="Votre e-mail" id="mail_public">
            <input type="text" name="object_contact_public" placeholder="Object" id="object_contact_public"/>

            <textarea name="message_contact_public" rows="10" cols="50" id="message_contact_public">


            </textarea>

            <input type="submit" name="sendmail_public" value="Envoyer" id="envoyer_contact"/>
        </form>


        <div id="findepage_contact">
            <div id="coordonnees_contact_public">
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
<a class="retour" href="index.php?action=login_view">RETOUR</a> <br/>
</body>

</html>

