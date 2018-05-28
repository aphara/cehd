<?php @session_start();
$title = 'CeHD - Contact';
ob_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>CeHD - Contact</title>
    <link href="public/css/style.css" rel="stylesheet"/>
</head>

<body>
<div id="page_contact">
    <h1 id="title_contact">Contact</h1>
   <div id="intro_contact"> <p>Envoyez nous un mail ! </p></div>
    <section id="corps_contact">

        <form method="post" id="form_contact" action="index.php?action=sendmail">

            <input type="text" name="object_contact" placeholder="Object" id="object_contact"/>

            <textarea name="message_contact" rows="10" cols="50" id="message_contact">


            </textarea>

            <input type="submit" name="sendmail" value="Envoyer" id="envoyer_contact"/>
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

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
