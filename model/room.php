<?php

function get_room($id_home){
    $db=dbConnect();
    $req=$db->prepare('SELECT * FROM `room` WHERE id_home=? ORDER BY floor_name');
    $req->bindValue(1,$id_home,PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function get_room_detail($id_room){
    $db=dbConnect();
    $req=$db->prepare('SELECT * FROM `room` WHERE id_room=?');
    $req->bindValue(1,$id_room,PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function add_room($name, $floor, $size, $type, $id_home){
    $db=dbConnect();
    $req=$db->prepare('INSERT INTO room(name, floor_name, size, room_type, id_home) 
VALUES (?,?,?,?,?)');
    $req->bindValue(1,$name,PDO::PARAM_STR);
    $req->bindValue(2,$floor,PDO::PARAM_STR);
    $req->bindValue(3,$size,PDO::PARAM_STR);
    $req->bindValue(4,$type,PDO::PARAM_STR);
    $req->bindValue(5,$id_home,PDO::PARAM_INT);
//    (:name,:floor,:size,:type,:id_home)
//    $req->bindValue('name',$name,PDO::PARAM_STR);
//    $req->bindValue('floor',$floor,PDO::PARAM_STR);
//    $req->bindValue('size',$size,PDO::PARAM_STR);
//    $req->bindValue('room_type',$type,PDO::PARAM_STR);
//    $req->bindValue('id_home',$id_home,PDO::PARAM_INT);
    $req->execute();
}

function modify_room($id_room, $name, $floor, $size, $type){
    $db=dbConnect();
    $req=$db->prepare('UPDATE room 
SET name=?,floor_name=?,size=?,room_type=? WHERE id_room=?');
    $req->bindValue(1,$name,PDO::PARAM_STR);
    $req->bindValue(2,$floor,PDO::PARAM_STR);
    $req->bindValue(3,$size,PDO::PARAM_STR);
    $req->bindValue(4,$type,PDO::PARAM_STR);
    $req->bindValue(5,$id_room,PDO::PARAM_INT);
//    SET name=:name,floor_name=:floor,size=:size,room_type=:type WHERE id_room=:id_room
//    $req->bindValue('name',$name,PDO::PARAM_STR);
//    $req->bindValue('floor',$floor,PDO::PARAM_STR);
//    $req->bindValue('size',$size,PDO::PARAM_STR);
//    $req->bindValue('room_type',$type,PDO::PARAM_STR);
//    $req->bindValue('id_room',$id_room,PDO::PARAM_INT);
    $req->execute();
}

function delete_room($id_room){
    $db=dbConnect();
    $req=$db->prepare('DELETE FROM `room` WHERE id_room=?');
    $req->bindValue(1,$id_room,PDO::PARAM_INT);
    $req->execute();
}