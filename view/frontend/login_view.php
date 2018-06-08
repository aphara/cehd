<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>CeHD - Connexion</title>
    <link rel="stylesheet" href="public/css/style.css" />
</head>

<body>

<div class="all">
    <div class="img_title">
        <img src='public/img/LOGO_login.png' alt='logo' id="img_logo"/>
        <h1>Connexion</h1>

    </div>


    <div class="form">
        <form action="index.php?action=login" method="post">

            <div>
                <input type="email" placeholder="Adresse email" id="mail" name="_mail" value="" autofocus required>
            </div>
            <div>
                <input type="password" placeholder="Mot de passe" id="password" name="_password" required>
            </div>


            <hr>

            <div id="btn">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Se connecter</button>
            </div>
        </form>

    </div>
    <br/><br/>
    <a href="index.php?action=firstlog">Première connexion ?</a> <br>
    <a href="index.php?action=pageforgetpassw">Mot de passe oublié ?</a>

</div>
<footer>
    <div id='footer'>

        <div id='cgu'><a href="index.php?action=cgu_public">CGU</a></div>
        <div>|</div>
        <div id='contact'><a href="index.php?action=contact">Contact</a></div>
        <div>|</div>
        <div id='aide'><a href="index.php?action=help_public">Aide</a></div>

    </div>

    </div>
</footer>


</body>

</html>