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