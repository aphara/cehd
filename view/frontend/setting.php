<?php @session_start();
$title = 'CeHD - setting';
ob_start(); ?>

<<<<<<< HEAD
      <!--first name-->
  <div >
    <form action="index.php?action=update_firstname" method="post">
      <input type="text" name="_firstname" required>
      <input type="submit" value="changer prenom">
    </form>
  </div>

      <!--last name-->
  <div>
    <form action="index.php?action=update_lastname" method="post">
      <input type="text" name="_last_name" required>
      <input type="submit" value="changer nom de famille">
    </form>
  </div>

      <!--birth date-->
  <div>
    <form action="index.php?action=update_birthdate" method="post">
      <input type="text" id="" name="_birthdate" required>
      <input type="submit" value="changer date de naissance">
    </form>
  </div>

      <!-- phone number-->
  <div >
    <form action="index.php?action=update_phone_number" method="post">
      <input type="text"  name="_phone_number" required>
      <input type="submit" value="changer numero">
    </form>
  </div>
=======
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
>>>>>>> 9a7c680182b6219f5cc6013bc414d6bda9d2312f

<hr>

    <!-- mail-->
    <div id='mail'>
<<<<<<< HEAD
      <form action="index.php?action=update_email" method="post">
      <!-- changement-->
      <input type="text" name="_mail" required>
      <input type="submit" value="changer mail">
    </div>

<hr>

    <!--password -->
    <div id='password'>
      <form action="index.php?action=update_password" method="post">
        <!--verif ication-->
        <input type="password" name="_old_password" required>
        <!--changement -->
        <input type="password" name="_password" required>
        <input type="password" name="-verifpassword" required>
        <input type="submit" value="changer mot de passe">
    </form>
    </div>
=======
      <?php /*echo getUserinfo("mail",$_SESSION['id']); */?>
    </div>

    <div id='phone_number'>
<<<<<<< HEAD
      <?php /*echo getUserinfo("phone",$_SESSION['id']); */?>
    </div>-->


>>>>>>> 9a7c680182b6219f5cc6013bc414d6bda9d2312f

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
