<?php
require_once __DIR__.'/../config.php';
require_once ROOT.'/model/sensor.php';

function getSensor($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req=get_sensor($_SESSION['target_home']);
    return $req;
}

function checkIDSensor($id_sensor){
    if(check_id_sensor($id_sensor)==0){
        return true;
    }else return false;
}

function checkSensorName($sensor_name){
    if (check_sensor_name($_SESSION['target_home'],$sensor_name)==0) {
        return true;
    }
    else {
        return false;
    }
}

function addSensor($id_sensor, $sensor_type, $sensor_name, $id_room){
    add_sensor($id_sensor, $sensor_type, $sensor_name, $id_room);
}

function getSensorDetail($id_sensor){
    $req=get_sensor_detail($id_sensor);
    $post=$req;
    return $post;
}

function modifySensor($id_sensor, $sensor_type, $sensor_name, $id_room){
    modify_sensor($id_sensor, $sensor_type, $sensor_name, $id_room);
}

function deleteSensor($id_sensor){
    delete_sensor($id_sensor);
}

function getSensorLight($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req=get_sensor_light($_SESSION['target_home']);
    return $req;
}

function getSensorTemp ($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req=get_sensor_temp($_SESSION['target_home']);
    return $req;
}

function getSensorShutter($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req=get_sensor_shutter($_SESSION['target_home']);
    return $req;
}

function editSensor ( $id_sensor, $sensor_type, $sensor_name, $id_room){
    edit_sensor($id_sensor, $sensor_type, $sensor_name, $id_room);
}

function getAllSensorTemp($id_home){
    $type='TEMP';
    $req=get_sensor_by_type($id_home,$type);
    $req=$req->fetchAll();
    $length=count($req);
    for($i=0;$i<count($req);$i++){
        if (isset($temp_moy) && isset($divider)){
            if ($req[$i]['current_value']!=NULL && $req[$i]['current_value']!=0){
                $temp_moy=$temp_moy+$req[$i]['current_value'];
                $divider++;
            }
        }elseif($req[$i]['current_value']!=0){
            $temp_moy=$req[$i]['current_value'];
            $divider=1;
        }
    }
    if (isset($temp_moy) && isset($divider)){
        $val=round(($temp_moy/$divider),1);
        return $val;
    }else{
        return 'NONE';
    }
}

function updateDataConso($id_home,$period){
    $rep = get_conso_house($id_home,$period);
    $rep = $rep->fetchAll();

    //die(var_dump($donnee));
    $stack=0;
    $stack_day= '';
    $it=0;
    $date_maj=0;
    foreach ($rep as $donnee){
        // calcul l'ecart de la donnee avec la date actuel
        $strStart = $donnee['date_maj'];
        $strEnd = date( 'Y-m-d H:i:s');
        $dteStart = new DateTime($strStart);
        $dteEnd = new DateTime($strEnd);
        $dteDiff = $dteStart->diff($dteEnd);
        $dteDiff=$dteDiff->format('%Y%M%D%H%I%S');

        list($year, $month, $day, $hour, $min, $sec) =
            sscanf($dteDiff, "%2s%2s%2s%2s%2s%2s");
        //$dteDiff="{$year}-{$month}-{$day} {$hour}:{$min}:{$sec} ";
        if ($period =='HOUR'){
            $test = $day;
            $add_period = 'DAY';
        }
        elseif ($period =='DAY') {
            $test = $month;
            $add_period = 'MONTH';
        }
        if ($test >=1){
            if ($stack == 0){
                $start_date = $donnee['date_maj'];
            }
            if ($stack_day != $test && $stack !=0) {
                $moyenne = $stack / $it;
                add_conso($moyenne, $date_maj, $donnee['id_sensor'], $add_period);
                del_conso_day($donnee['id_sensor'],$date_maj,$start_date,$period);
                $stack = 0;
            }
            $stack = $stack + $donnee['value'];
            $it += 1;
            $date_maj = $donnee['date_maj'];
            $stack_day = $test;
        }
    }
}