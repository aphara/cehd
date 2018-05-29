<?php @session_start(); ?>
<?php $title = 'CeHD - setting'; ?>
<?php ob_start(); ?>

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

<hr>

    <!-- mail-->
    <div id='mail'>
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

  <?php $content = ob_get_clean(); ?>
  <?php require('template.php'); ?>
