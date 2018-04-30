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
        <img src='public/img/LOGO_small.png' alt='logo'/>
    </div>

    <div id='setting_wheel'>
        <h2> <?= $_SESSION['name'] ?> </h2>
    </div>
</header>

<?= $content ?>


</body>
</html>