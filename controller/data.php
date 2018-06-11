<?php
require_once __DIR__.'/../config.php';
require_once ROOT.'/model/data.php';
function getRawData()
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
    echo "Tabular Data:<br />";
    for ($i = 0, $size = count($data_tab); $i < $size-1; $i++) {
        $trame = $data_tab[$i];
/*// décodage avec des substring
        $t = substr($trame, 0, 1);
        $o = substr($trame, 1, 4);
// …*/
// décodage avec sscanf
        list($t, $object, $r, $type, $sensor, $value, $trame, $checksum, $year, $month, $day, $hour, $min, $sec) =
            sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        echo("<br />$t,GROUP = $object,$r,
TYPE = $type,CAPTEUR = $sensor,VALEUR = $value,TRAME = $trame,$checksum,$year,$month,$day,$hour,$min,$sec<br />");
        $date="{$year}-{$month}-{$day} {$hour}:{$min}:{$sec}";
        storeData($trame,$sensor,$date,$value,$type);
    }


}

function storeData($id_stat,$id_sensor,$date_maj,$value,$stat_type){
    if(checkIdStat($id_stat)==true){
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
        }
        store_data($id_stat,$id_sensor,$date_maj,$value,$stat_type);
    }
}

function checkIdStat($id_stat){
    $issetStat = check_id_stat($id_stat);
    if ($issetStat == 0){
        return true;
    }else return false;
}