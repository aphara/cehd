<?php @session_start();
$title = 'CeHD - Stats Générales';
ob_start();?>




    <div id="global_stat">
        <div id="consommation">
            <div id="global_chart">
                <h1>Statistiques</h1>
                <?php $values = getConsoHouse($_SESSION['id_home'], $periode);
                if ($periode == "DAY"){
                    $periode = "Jours";
                }
                if ($periode == "MONTH"){
                    $periode = "Mois";
                }
                if ($periode == "HOUR"){
                    $periode = "Heures";
                }?>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                <script><?php echo 'var periode =' .json_encode($periode). ';';?></script>
                <script><?php echo 'var donnees =' .json_encode($values). ';';?></script>
                <script type="text/javascript" src="public/script/chart.js"></script>
                <div id="chart_div"></div>
                <form method="post" action="index.php?action=global_stats">
                    <select name="type_graph">
                        <option value="HOUR">Derniere 24 heures</option>
                        <option value="DAY">Consommation sur le mois</option>
                        <option value="MONTH">Consommation sur l'année</option>
                    </select>
                    <input type="submit" value="Valider" />
                </form>
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
            <p>Etat des capteurs : </p>
            <?php $state = getStateSensor($_SESSION['id_home']);
            $url = $state?"public/img/checked.PNG":"public/img/unchecked.PNG";?>
            <img id="prompt_state_sensor" <?php echo ("src=".$url); ?>>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>