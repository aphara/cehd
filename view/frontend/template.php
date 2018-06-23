<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <script>var id_home = "<?= $_SESSION['id_home']; ?>"</script>
    <link href="public/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
    <script  type="text/javascript" src="public/script/menu.js"></script>
    <script type="text/javascript" src="public/script/ajax.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
            integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
            crossorigin="anonymous">"></script>


</head>

<body>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
    <header>
        <div id='logo'>
            <a href="index.php?action=home"><img src='public/img/LOGO_small.png' alt='logo'/></a>
        </div>

        <div id='domicile'>
            <h1> Maison de <?= $_SESSION['name'] ?></h1>
        </div>

        <div id='right_header'>
            <h2> <?= $_SESSION['name'] ?> </h2>
            <div id='setting_wheel'>


                <a href="index.php?action=setting"><img src='public/img/setting_wheel.png' onmouseover="this.src='public/img/setting_wheel_2.png'" onmouseout="this.src='public/img/setting_wheel.png'" alt='setting wheel'/></a>

            </div>

            <div>
                <a href="index.php?action=logout"><img src='public/img/sign_out.png' onmouseover="this.src='public/img/sign_out_2.png'" onmouseout="this.src='public/img/sign_out.png'" alt='signout' /></a>
            </div>
    </header>
    <script type="text/javascript">
        function menu(id){
            if (document.getElementById(id).style.display == "none"){
                document.getElementById(id).style.display = "block";
            } else{
                document.getElementById(id).style.display = "none";
            }
        }
    </script>

<div id='nav_content'>
    <nav id='sidebar'>
        <img src="public/img/menu.png" onmouseover="this.src='public/img/menu_2.png'" onmouseout="this.src='public/img/menu.png'" onclick="menu('btn_menu');" alt='menu' id="img_menu">
        <div id="btn_menu">
            <ul>
                <li><a href="index.php?action=global_stats">Stats Générales</a></li>
                <li id='dropdown'>
                    <a href="index.php?action=home_manage">Gestion Maison</a>
                    <ul id="dropdown-content">
                        <li><a href="index.php?action=module_light">gestion modules</a></li>
                        <li><a href="index.php?action=link_module_light">associer modules</a></li>
                        <li><a href="index.php?action=programs">programmes</a></li>
                    </ul>
                </li>

                <?php if ($_SESSION['status']=='SUPER_USER'){ ?>
                    <li><a href="index.php?action=user_manage">Gestion Utilisateurs</a></li>
                <?php } ?>
                <li><a href="index.php?action=contact">Contact</a></li>
            </ul>
        </div>
    </nav>
    <div id="content"><?= $content ?>
    </div>
</div>



    <footer>
        <div id='footer'>

            <div id='cgu'><a href="index.php?action=cgu">CGU</a></div>
            <div>|</div>
            <div id='contact'><a href="index.php?action=contact">Contact</a></div>
            <div>|</div>
            <div id='aide'><a href="index.php?action=help">Aide</a></div>

        </div>

    </div>
</footer>


<script type="text/javascript" src="public/script/main.js">
</script>
</body>
</html>
