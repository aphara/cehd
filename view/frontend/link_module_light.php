<?php @session_start();
$title = 'CeHD - Associer modules - Lumières';
ob_start(); ?>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id2').DataTable();
        } );
    </script>

<h1>Associer de la lumière maison de <?= htmlspecialchars($_SESSION['name']) ?></h1>
<table class="display" id="table_id">
    <thead>
    <tr>
        <th>Nom Capteur</th>
        <th>Pièce Associée</th>
        <th>Modifier</th>
    </tr>
    </thead>
    <tbody>
    <?php

    while ($donnees = $req->fetch()) {
        ?>
        <tr>
            <td><?= $donnees['sensor_name'];?></td>
            <td><?= $donnees['name'];?></td>
            <td><a href="index.php?action=edit_sensor_form&id=<?=$donnees['id_sensor'];?>"><button>Modifier</button></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<br>

<table class="display" id="table_id2">
    <thead>
    <tr>
        <th>Nom Actionneur</th>
        <th>Pièce Associée</th>
        <th>Modifier</th>
    </tr>
    </thead>
    <tbody>
    <?php

    while ($donnees1 = $req2->fetch()) {
        ?>
        <tr>
            <td><?= $donnees1['effector_name'];?></td>
            <td><?= $donnees1['name'];?></td>
            <td><a href="index.php?action=edit_effector_form&id=<?=$donnees1['id_effector'];?>"><button>Modifier</button></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php $content_link = ob_get_clean(); ?>

<?php require('template_link.php'); ?>