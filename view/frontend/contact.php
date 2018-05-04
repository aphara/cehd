<?php @session_start(); ?>
<?php $title = 'CeHD - Contact'; ?>
<?php ob_start(); ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <title>CeHD - Contact</title>

    </head>

    <body>


    <p>Bonjour</p>



    </body>

</html>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
