<?php $title = 'CeHD - Gestion utilisateur';
@session_start();
ob_start(); ?>


<script type="text/javascript">
        function menu(id){
            if (document.getElementById(id).style.display == "none"){
                document.getElementById(id).style.display = "block";
            } else{
                document.getElementById(id).style.display = "none";
            }
        }
</script>
<div id='nav_sidebar'>
    <nav >
        <ul id='sidebar'>
            <li><a href="index.php?action=user_management&id=<?= $_SESSION['target_id']?>">Gestion Utilisateurs</a></li>
            <li id="topbar"> <span onclick="menu('dropdown')">Gestion Maison</span>
                <ul id="dropdown">
                    <li><a href="index.php?action=home_management&id=<?= $_SESSION['target_id']?>">Gestion Pièces</a></li>
                    <li><a href="index.php?action=module_management&id=<?= $_SESSION['target_id']?>">Gestion Modules</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>

<div>
    <div>
        <h1>Domicile de <?= $user[0]['first_name'];?> <?= $user[0]['last_name'];?></h1>
    </div>
    <div class="add_button">
        <form action="index.php?action=add_user_form" method="post">
            <input class="ajouter" type="image" name="add_user_btn" src="public/img/rounded-add-button.png">
        </form>
        <h3>Ajouter un utilisateur</h3>
    </div>
    <div class="ref_table">
        <table id="table_id" class="display">
            <thead>
            <tr>
                <th>Référence</th>
                <th>Adresse Mail</th>
                <th>Statut</th>
                <th>Nom et prénom</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $row => $userList){ ?>
                    <tr>
                        <td> <?= $userList['id_user'];?> </td>
                        <td> <?= $userList['mail'];?> </td>
                        <td> <?= $userList['status'];?> </td>
                        <td> <?= $userList['last_name'];?> <?= $userList['first_name'];?></td>
                        <td> <?= $userList['phone'];?> </td>
                        <td> <a href="index.php?action=modify_user_form&id=<?= $userList['id_user'];?>"><button>Modifier</button></a>
                            <a href="index.php?action=delete&id=<?= $userList['id_user'];?>"><img src="public/img/bin.png" name="home"/></a> </td>
                    </tr>
                <?php
                }
                ?>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('template_back.php'); ?>