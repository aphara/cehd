<?php @session_start();
$title = 'CeHD - Stats Générales';
ob_start();?>



    <div id="consommation">
        <div id="consommation">
            <div id="global_chart">
                <h1>Statistiques</h1>
                <?php $values = getConsoHouse($_SESSION['id_home']);?>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script><?php echo 'var donnees =' .json_encode($values). ';';?></script>
                <script type="text/javascript" src="public/script/chart.js"></script>
                <div id="chart_div"></div>
            </div>
            <div id="consommation_instantanee">
                <p><?php echo get_instant_conso($_SESSION['id_home'])[0]; ?> C°</p>
                <p>Consommation instantanée</p>


            </div>
        </div>
        <div id="temperature">

            <p><?php echo get_instant_temp($_SESSION['id_home'])[0]; ?> C°</p>
            <p>Température instantanée</p>

        </div>
        <div id="etat_modules">

        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>