<?php @session_start();
$title = 'CeHD - Associer modules - Lumières';
ob_start(); ?>

<h1>Associer de la lumière maison de <?= htmlspecialchars($_SESSION['name']) ?></h1>
<table class="associer_lumiere" id="tab_id">
    <tr>
        <th>Nom Capteur</th>
        <th>Pièce Asocciée</th>
        <th>Modifier</th>
    </tr>
    <?php

    while ($donnees = $req->fetch()) {
        ?>
        <tr>
            <td><?= $donnees['sensor_name'];?></td>
            <td><?= $donnees['name'];?></td>
            <td><a href="index.php?action=edit_sensor_form&id=<?=$donnees['id_sensor'];?>"><button>Modifier</button></a></td>
        </tr>
    <?php } ?>
</table>

<br>

<table class="associer_lumiere" id="tab_id">
    <tr>
        <th>Nom Actionneur</th>
        <th>Pièce Asocciée</th>
        <th>Modifier</th>
    </tr>
    <?php

    while ($donnees1 = $req2->fetch()) {
        ?>
        <tr>
            <td><?= $donnees1['effector_name'];?></td>
            <td><?= $donnees1['name'];?></td>
            <td><a href="index.php?action=edit_effector_form&id=<?=$donnees1['id_effector'];?>"><button>Modifier</button></a></td>
        </tr>
    <?php } ?>
</table>

<?php $content_link = ob_get_clean(); ?>

<?php require('template_link.php'); ?>