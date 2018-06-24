<?php @session_start();
$title = 'CeHD - Associer modules - temperature';
ob_start(); ?>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#table_id2').DataTable({
                language: {
                processing:     "Traitement en cours...",
                    search:         "Rechercher&nbsp;:",
                    lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                    info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix:    "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable:     "Aucune donnée disponible dans le tableau",
                    paginate: {
                    first:      "Premier",
                        previous:   "Pr&eacute;c&eacute;dent",
                        next:       "Suivant",
                        last:       "Dernier"
                },
                aria: {
                    sortAscending:  ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        } );
        } );
    </script>

<h1>Association des capteurs de température</h1>
<table class="display" id="table_id">
    <thead>
    <tr>
        <th>Nom Capteur</th>
        <th>Pièce Asocciée</th>
        <th>Modifier</th>
    </tr>
    </thead>
    <tbody>
    <?php

    while ($donnees = $req->fetch()){
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