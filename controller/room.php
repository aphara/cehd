<?php
require_once __DIR__.'/../config.php';
require_once ROOT.'/model/room.php';

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
