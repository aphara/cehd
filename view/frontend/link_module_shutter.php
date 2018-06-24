<?php @session_start();
$title = 'CeHD - Associer modules - shutter';
ob_start(); ?>


    <h1>Association des volets</h1>

    <table class="display" id="table_id">
        <thead>
        <tr>
            <th>Nom Actionneur</th>
            <th>Pièce Asocciée</th>
            <th>Modifier</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($donnees1 = $req2->fetch()){
            ?>
            <tr>
                <td><?= $donnees1['effector_name'];?></td>
                <td><?= $donnees1['name'];?></td>
                <td><a href="index.php?action=edit_effector_form&id=<?= $donnees1['id_effector'];?>"><button>Modifier</button></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php $content_link = ob_get_clean(); ?>

<?php require('template_link.php'); ?>