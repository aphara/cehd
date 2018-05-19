<?php @session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="public/css/style_backend.css" rel="stylesheet" />
</head>

<body>
<header>
    <div id='logo'>
        <a href="index.php?action=homeb"><img src='public/img/LOGO_small.png' alt='logo'/></a>
    </div>

    <div id='setting_wheel'>
        <h2> <?= $_SESSION['name'] ?> </h2>
    </div>
    <div class="sign_out">
        <a href="index.php?action=logout"><img src="public/img/sign_out.png" onmouseover="this.src='public/img/sign_out_2.png';" onmouseout="this.src='public/img/sign_out.png';"></a>
    </div>
</header>

<?= $content ?>


</body>
</html>