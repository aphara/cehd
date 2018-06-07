<?php@session_start();
$title = 'CeHD - Stats Générales';
ob_start();?>


<div id="consommation">
    <div id="consommation">
        <div id="global_chart">
            <h1>Statistiques</h1>
        </div>
        <div id="consommation_instantanee">

        </div>
    </div>
<div id="temperature">

    <p><?php echo getinstant_temp($_SESSION['id_home']); ?> kWh</p>
    <p>Consommation instantanée</p>

</div>
<div id="etat_modules">

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
