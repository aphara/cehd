<?php $title = 'CeHD - Gestion modules';
@session_start();
ob_start(); ?>


<div id='nav_sidebar'>
    <nav >
        <ul id='sidebar'>
            <li><a href="index.php?action=user_management&id=<?= $_SESSION['target_id']?>">Gestion Utilisateurs</a></li>
            <li id="topbar"> <span onclick="OnOff(0)">Gestion Maison</span>
                <ul id="dropdown" class="hidden_content">
                    <li><a href="index.php?action=home_management&id=<?= $_SESSION['target_id']?>">Gestion Pièces</a></li>
                    <li><a href="index.php?action=module_management&id=<?= $_SESSION['target_id']?>">Gestion Modules</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<div id='nav_content'>
    <div class="add_button">
        <form action="index.php?action=add_sensor_form" method="post">
            <input class="ajouter" type="image" name="add_user_btn" src="public/img/rounded-add-button.png"/>
        </form>
        <h3>Ajouter un capteur</h3>
    </div>

    <div class="ref_table">
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Nom du capteur</th>
                    <th>Type</th>
                    <th>Pièce associée</th>
                    <th>Action</th>
                  </tr>
            </thead>
            <tbody>
            <?php foreach ($req as $row => $sensorList){ ?>
                <tr>
                    <td> <?= $sensorList['id_sensor'];?> </td>
                    <td> <?= $sensorList['sensor_name'];?> </td>
                    <td> <?= $sensorList['sensor_type'];?> </td>
                    <td> <?= $sensorList['name'];?> </td>
                    <?php $target_sensor=$sensorList['id_sensor'];?>
                    <td> <a href="index.php?action=modify_sensor_form&id=<?= $target_sensor?>"><button>Modifier</button></a>
                        <a href="index.php?action=delete_sensor&id_sensor=<?= $target_sensor;?>"><img src="public/img/bin.png" name="home"/></a> </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>

    <div class="add_button">
        <form action="index.php?action=add_effector_form" method="post">
            <input class="ajouter" type="image" name="add_user_btn" src="public/img/rounded-add-button.png">
        </form>
        <h3>Ajouter un actionneur</h3>
    </div>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id2').DataTable();
        } );
    </script>

    <div class="ref_table">
        <table id="table_id2" class="display">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Nom de l'actionneur</th>
                    <th>Type</th>
                    <th>Pièce associée</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($req2 as $row => $effectorList){ ?>
                <tr>
                    <td> <?= $effectorList['id_effector'];?> </td>
                    <td> <?= $effectorList['effector_name'];?> </td>
                    <td> <?= $effectorList['effector_type'];?> </td>
                    <td> <?= $effectorList['name'];?> </td>
                    <?php $target_effector=$effectorList['id_effector'];?>
                    <td> <a href="index.php?action=modify_effector_form&id=<?= $target_effector?>"><button>Modifier</button></a>
                        <a href="index.php?action=delete_effector&id_effector=<?= $target_effector;?>"><img src="public/img/bin.png" name="home"/></a> </td>
                </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('template_back.php'); ?>