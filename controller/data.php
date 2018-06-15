<?php
require_once __DIR__.'/../config.php';
require_once ROOT.'/model/data.php';
require_once ROOT.'/controller/frontend.php';
require_once ROOT.'/controller/effector.php';
@session_start();

try {
    if (isset($_POST['command'])) {

        switch ($_POST['command']) {
            case 'getData':
                getData();
                updatePeriod($_SESSION['id_home']);
                break;
            case 'sendAllEffectorData':
                if ($_POST['id'] == 'allLight') {
                    $type='LIGHT_CTRL';
                    $frame_type=5;
                    if ($_POST['value'] == 'true') {
                        $request_value = 1111;
                    } else {
                        $request_value = 0;
                    }
                }
                changeEffectorValue($type,$request_value,$_SESSION['id_home']);
                $req=getAllEffectorByType($_SESSION['id_home'],$type);
                $req=$req->fetchAll();
                for($i=0;$i<count($req);$i++){
                    $id=$req[$i]['id_effector'];
                    $timestamp=date('YmdHis');
                    sendTestframe($frame_type,$id,$request_value,$timestamp);
                    //sendFrameAllEffector();
                }
                break;
            case 'test':
                echo 'aaaaaaaaaa';
                break;
        }
    }}
catch
(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}

function getData()
{
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G10D");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);


    $data_tab = str_split($data, 33);
    /*echo "Tabular Data:<br />";*/
    for ($i = 0, $size = count($data_tab); $i < $size-1; $i++) {
        $trame = $data_tab[$i];

// décodage avec sscanf
        list($t, $object, $r, $type, $sensor, $value, $trame, $checksum, $year, $month, $day, $hour, $min, $sec) =
            sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        /*echo("<br />$t,GROUP = $object,$r,
TYPE = $type,CAPTEUR = $sensor,VALEUR = $value,
        TRAME = $trame,$checksum,$year,$month,$day,$hour,$min,$sec<br />");*/

        $date="{$year}-{$month}-{$day} {$hour}:{$min}:{$sec}";
        $lastDate = get_last_date();
        $lastDate = $lastDate[0];

        $datetime1 = new DateTime($date);
        $datetime2 = new DateTime($lastDate);

        if($datetime1 > $datetime2) {
            storeData($sensor, $date, $value, $type);
        }
    }
}

function storeData($id_sensor,$date_maj,$value,$stat_type){
    switch ($stat_type){
        case '1':
            $stat_type='SHUTTER';
            list($integer,$float)=sscanf($value, "%3s%1s");
            $value="{$integer}.{$float}";
            break;
        case '3':
            $stat_type='TEMP';
            list($integer,$float)=sscanf($value, "%3s%1s");
            $value="{$integer}.{$float}";
            break;
        case '5':
            $stat_type='LIGHT';
            break;
        case 'D':
            $stat_type='CONSO';
            //ajout du calcul des W
            break;
    }
    store_data($id_sensor,$date_maj,$value,$stat_type);
}

function updatePeriod($id_home){
    for ($i=1;$i<100;$i++) {
        try{
            $req=get_date($i,$id_home);
            while($getdate=$req->fetch()) {
                $strStart = $getdate['date_maj'];
                $strEnd = date('Y-m-d H:i:s');

                $dteStart = new DateTime($strStart);
                $dteEnd = new DateTime($strEnd);
                /*var_dump($strEnd);
                var_dump($strStart);*/
                $dteDiff = $dteStart->diff($dteEnd);

                $dteDiff=$dteDiff->format('%Y%M%D%H%I%S');

                list($year, $month, $day, $hour, $min, $sec) =
                    sscanf($dteDiff, "%2s%2s%2s%2s%2s%2s");
                $dteDiff="{$year}-{$month}-{$day} {$hour}:{$min}:{$sec} ";
                if($getdate['period']==NULL){
                    if ($year==0 && $month==0 && $day==0 && $hour>=0){
                        $period = 'HOUR';
                        update_period($getdate['id_stat'], $period);
                    }elseif ($year==0 && $month==0 && $day>=0){
                        $period='DAY';
                        update_period($getdate['id_stat'],$period);
                    }elseif ($year==0 && $month>=0){
                        $period='MONTH';
                        update_period($getdate['id_stat'],$period);
                    }elseif ($year>=0){
                        $period='YEAR';
                        update_period($getdate['id_stat'],$period);
                    }
                }
            }
        } catch (Exception $e) {}

        try{
            $req=get_last($i,$id_home);
            if (isset($req[0])){
                update_sensor_value($req[0]['id_sensor'],$req[0]['value']);
            }
        } catch (Exception $e) {}
    }echo 'Synchronisation effectuée';
}


function sendFrameEffector(){
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=G10D&TRAME=1G10D123456789");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    echo 'a';
}

function sendTestframe($type,$id,$value,$timestamp){
    $frame="1G10D2".$type.$id.$value."aa"/*.$timestamp*/;
    var_dump($frame);
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=G10D&TRAME=1G10D2".$frame);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    echo "b";

}