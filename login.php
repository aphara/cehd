<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>CeHD - Connexion</title>
    <link rel="stylesheet" href="login_style.css" />
</head>

 <body>

    



  <?php

  // Le mot de passe n'a pas été envoyé ou n'est pas bon
  if (!isset($_POST['_username']) OR !isset($_POST['_password']))
  {
      ?>
      <img src='img/LOGO_small.png' alt='logo' />
      <h2>Connexion</h2>


      <form action="login.php" method="post">

          <div>
              <input type="text" placeholder="Nom d'utilisateur" id="username" name="_username" value="" autofocus>
          </div>
          <div>
              <input type="password" placeholder="Mot de passe" id="password" name="_password">
          </div>


          <hr>

          <div>
              <button class="btn btn-primary btn-lg btn-block" type="submit">Se connecter</button>
          </div>
      </form>
      <?php
  }
  elseif ($_POST['_username'] != 'test' OR $_POST['_password']!='mdp')
  {
      ?>
      <img src='img/LOGO_small.png' alt='logo' />
      <h2>Connexion</h2>


      <form action="login.php" method="post">

          <div>
              <input type="text" placeholder="Nom d'utilisateur" id="username" name="_username" value="" autofocus>
          </div>
          <div>
              <input type="password" placeholder="Mot de passe" id="password" name="_password">
          </div>
          <p>Identifiant ou mot de passe incorrect !</p>
          <hr>

          <div>
              <button class="btn btn-primary btn-lg btn-block" type="submit">Se connecter</button>
          </div>
      </form>
      <?php
  }
// Le mot de passe a été envoyé et il est bon
  else
  {
  ?> <h1>Bienvenue <?php echo $_POST['_username'];?> ! </h1> <?php

  }

  ?>



  </body>
</html>

