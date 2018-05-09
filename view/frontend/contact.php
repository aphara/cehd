<?php @session_start(); ?>
<?php $title = 'CeHD - Contact'; ?>
<?php ob_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>CeHD - Contact</title>
    <link href="public/css/style.css" rel="stylesheet"/>
</head>

<body>
<div id="page_contact">
    <h1 id="contact">Contact</h1>
    <section id="corps_contact">
        <form id="form_contact">

            <input type="text" name="object_contact" value="Object" id="object_contact">
            <textarea name="message_contact" rows="10" cols="50" id="message_contact">
Votre message ici

</textarea>
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

            <form>
                <input type="submit" name="Envoi" value="Envoyer" id="envoyer_contact"/>
            </form>
        </div>

    </section>
</div>
</body>

</html>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
