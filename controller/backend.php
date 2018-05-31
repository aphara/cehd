<?php
require_once __DIR__.'/../config.php';
require_once ROOT.'/model/backend.php';


function deleteHome($id_user){
    $id_home=get_id_home($id_user);
    delete_link($id_home['id_home']);
    delete_home($id_home['id_home']);
    delete_user_and_child($id_user);
}


function getRoom($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req=get_room($_SESSION['target_home']);
    $post=$req/*->fetchAll()*/;
    return $post;
}

function getRoomDetail($id_room){
    $req=get_room_detail($id_room);
    $post=$req;
    return $post;
}

function addRoom($name, $floor, $size, $type, $id_home){
    add_room($name, $floor, $size, $type, $id_home);
}

function modifyRoom($id_room, $name, $floor, $size, $type){
    modify_room($id_room, $name, $floor, $size, $type);
}

function deleteRoom($id_room){
    delete_room($id_room);
}

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

function modifySensor(){

}

function deleteSensor(){

}

function getActuator($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req=get_actuator($_SESSION['target_home']);
    return $req;
}