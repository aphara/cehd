<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="../../public/css/style.css" rel="stylesheet" />
</head>

<body>
    <header>
        <div id='logo'>
            <img src='../../public/img/LOGO_small.png' alt='logo'/>
        </div>

        <div id='domicile'>
            <h1> Maison de <?= $_SESSION['name'] ?></h1>
        </div>

        <div id='setting_wheel'>
            <h2> <?= $_SESSION['name'] ?> </h2>
            <a href="#"><img src='../../public/img/setting_wheel.png' alt='setting wheel' id="img_wheel"/></a>
        </div>
    </header>

    <div id='nav_content'>
        <nav id='sidebar'>
            <ul>
                <li><a href="../../view/frontend/statsgenerales_view.php">Stats Générales</a></li>
                <li><a href="../../view/frontend/gestionmaison_view.php">Gestion Maison</a></li>
                <li><a href="../../view/frontend/gestion_utilisateurs_view.php">Gestion Utilisateurs</a></li>
                <li><a href="../../view/frontend/contact_view.php">Contact</a></li>
            </ul>
        </nav>
        <div id='content'>
            <?= $content ?>
        </div>
    </div>



    <footer>
        <div id='footer'>

            <div id='cgu'><a href="#">CGU</a></div>
            <div>|</div>
            <div id='contact'><a href="#">Contact</a></div>
            <div>|</div>
            <div id='aide'><a href="#">Aide</a></div>
        </div>

    </div>
</footer>

</body>
</html>