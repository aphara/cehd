<?php @session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="public/css/style_backend.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

</head>

<body>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
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