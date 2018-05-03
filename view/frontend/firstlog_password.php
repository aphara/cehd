<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>CeHD - Première connexion</title>
    <link rel="stylesheet" href="public/css/style.css" />
</head>

<body>

<div class="all">
    <div class="img_title">
        <img src='public/img/LOGO_login.png' alt='logo' id="img_logo"/>
        <h1>Définissez votre mot de passe</h1>

    </div>


    <div class="form">
        <form action="index.php?action=firstlog_password" method="post">

            <div>
                <input type="text" placeholder="Nouveau mot de passe" id="password" name="_password" value="" autofocus required>
            </div>

            <div>
                <input type="text" placeholder="Confirmer le mot de passe" id="password_check" name="_password_check" value="" required>
            </div>
            <hr>

            <div id="btn">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Définir mot de passe</button>
            </div>
        </form>

    </div>
    <br/><br/>
    <a href="index.php">Retour</a>

</div>


</body>
</html>