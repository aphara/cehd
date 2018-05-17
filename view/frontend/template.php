<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
</head>

<body>
    <header>
        <div id='logo'>
            <a href="index.php?action=home"><img src='public/img/LOGO_small.png' alt='logo'/></a>
        </div>

        <div id='domicile'>
            <h1> Maison de <?= $_SESSION['name']; ?></h1>
        </div>

        <div id='right_header'>
            <h2> <?= $_SESSION['name']; ?> </h2>
            <div id='setting_wheel'>
                <a href="index.php?action=settings"><img src="public/img/setting_wheel.png" onmouseover="this.src='public/img/setting_wheel_2.png';" onmouseout="this.src='public/img/setting_wheel.png';"></a>
            </div>

            <div class="sign_out">
                <a href="index.php?action=logout"><img src="public/img/sign_out.png" onmouseover="this.src='public/img/sign_out_2.png';" onmouseout="this.src='public/img/sign_out.png';"></a>
            </div>
        </div>
    </header>

    <div id='nav_content'>
        <nav id='sidebar'>
            <ul>
                <li><a href="index.php?action=global_stats">Stats Générales</a></li>
                <li id='dropdown'><a href="index.php?action=home_manage">Gestion Maison</a>
                    <div id="dropdown-content">
                        <a href="index.php?action=module_management">gestion modules</a>
                        <a href="index.php?action=link_module">associer modules</a>
                        <a href="index.php?action=programs">programmes</a>
                    </div>
                </li>
                <?php if ($_SESSION['status']=='SUPER_USER'){ ?>
                    <li><a href="index.php?action=user_manage">Gestion Utilisateurs</a></li>
                <?php } ?>
                <li><a href="index.php?action=contact">Contact</a></li>
            </ul>
        </nav>
        <div id='content'>
            <?= $content ?>
        </div>
    </div>



    <footer>
        <div id='footer'>

            <div id='cgu'><a href="index.php?action=cgu">CGU</a></div>
            <div>|</div>
            <div id='contact'><a href="index.php?action=contact">Contact</a></div>
            <div>|</div>
            <div id='aide'><a href="index.php?action=aide">Aide</a></div>
          <script>
          function affiche() {
            if (document.getElementById("bouton").innerHTML == "J'ai besoin d'aide, comment contacter le service client ?") {
               document.getElementById("bouton").innerHTML == "J'ai besoin d'aide, comment contacter le service client :";
               document.getElementById("cache").style.display == "none";
             }
            else {
              document.getElementById("bouton").innerHTML == "J'ai besoin d'aide, comment contacter le service client ?";
              document.getElementById("cache").style.display == "none";
            }
          };
         </script>
        </div>

    </div>
</footer>

</body>
</html>
