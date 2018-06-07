<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>CeHD - Mot de passe oublié</title>
    <link rel="stylesheet" href="public/css/style.css"/>
</head>

<body>


<h1>Mot de passe oublié</h1>


<div class="form">
    <form action="index.php?action=forgetpassw" method="post">
        <p>Veuillez rentrez votre adresse mail</p>
        <div>
            <input type="email" placeholder="Adresse email" id="mail_forgetpassw" name="mail_forgetpassw" value=""
                   autofocus required>
        </div>


        <hr>

        <input type="submit" placeholder="Envoyer" id="envoyer_forgetpassw" name="envoyer_forgetpassw">
    </form>

</div>


</body>