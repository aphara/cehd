<?php @session_start();
$title = 'CeHD - setting';
ob_start(); ?>

<!-- affichage des données perso -->
<!--    <div id='user_name'>
        <?php /*echo getUserinfo("first_name",$_SESSION['id']); */?>
        <?php /*echo getUserinfo("last_name",$_SESSION['id']); */?>
=======
<DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8" />
      <title>setting</title>
      <link rel="stylesheet" href="public/css/style.css" />
  </head>

<body>
   <!-- affichage des données perso
    <div id='user_name'>
        <?php echo getUserinfo("first_name",$_SESSION['id']); ?>
        <?php echo getUserinfo("last_name",$_SESSION['id']); ?>
>>>>>>> 16a262ab2d6b01de456c762e600586d242036b21
    </div>

    <div id='mail'>
      <?php /*echo getUserinfo("mail",$_SESSION['id']); */?>
    </div>

    <div id='phone_number'>
<<<<<<< HEAD
      <?php /*echo getUserinfo("phone",$_SESSION['id']); */?>
    </div>-->



<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
