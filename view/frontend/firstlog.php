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
        <h1>Entrez votre adresse mail</h1>

    </div>


    <div class="form">
        <form action="index.php?action=firstlog_mail" method="post">

            <div>
                <input type="email" placeholder="Adresse email" id="mail" name="_mail" value="" autofocus required>
            </div>

            <hr>

            <div id="btn">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Valider</button>
            </div>
        </form>

    </div>
    <br/><br/>
    <a href="index.php" class="retour"> Retour </a>

</div>


</body>
</html>