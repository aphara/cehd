<?php $title = 'CeHD - Gestion modules';
@session_start();
ob_start(); ?>


<div id='nav_sidebar'>
    <nav id='sidebar'>
        <ul>
            <li><a href="index.php?action=user_management&id=<?= $_SESSION['target_id']?>">Gestion Utilisateurs</a></li>
            <li><a href="index.php?action=home_management&id=<?= $_SESSION['target_id']?>">Gestion Maison</a></li>
        </ul>
    </nav>
</div>
<div id='nav_content'>
    <div>
        <nav id="topbar">
            <ul>
                <li><a href="index.php?action=home_management&id=<?= $_SESSION['target_id']?>">Gestion Pièces</a></li>
                <li><a href="index.php?action=module_manage&id=<?= $_SESSION['target_id']?>">Gestion Modules</a></li>
            </ul>
        </nav>
    </div>
    <div class="content_content">
        <div class="ref_table">
            <table id="tab_sensor">
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
                            <a href="index.php?action=delete_sensor&id=<?= $target_sensor;?>"><img src="public/img/bin.png" name="home"/></a> </td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td colspan="5">
                        <a href="index.php?action=add_sensor_form">Ajouter un capteur</a>
                    </td>
                </tr>
        </div>

        <div class="ref_table">
            <table id="tab_actuator">
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
                <?php foreach ($req2 as $row => $actuatorList){ ?>
                    <tr>
                        <td> <?= $actuatorList['id_actuator'];?> </td>
                        <td> <?= $actuatorList['actuator_name'];?> </td>
                        <td> <?= $actuatorList['actuator_type'];?> </td>
                        <td> <?= $actuatorList['name'];?> </td>
                        <?php $target_actuator=$actuatorList['id_actuator'];?>
                        <td> <a href="index.php?action=modify_sensor_form&id=<?= $target_actuator?>"><button>Modifier</button></a>
                            <a href="index.php?action=delete_sensor&id=<?= $target_actuator;?>"><img src="public/img/bin.png" name="home"/></a> </td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td colspan="5">
                        <a href="index.php?action=add_sensor_form">Ajouter un actionneur</a>
                    </td>
                </tr>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('template_back.php'); ?>