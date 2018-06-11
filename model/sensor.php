<?php

function get_sensor($id_home){
    $db=dbConnect();
    $req=$db->prepare('SELECT 
`id_sensor`,`sensor_type`,`current_state`,`current_value`,`sensor_name`,`id_room`,`name`
FROM `room`NATURAL JOIN sensor
WHERE id_home=?;');
    $req->bindValue(1,$id_home,PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function check_id_sensor($id_sensor){
    $db=dbConnect();
    $req=$db->prepare('SELECT id_sensor FROM `sensor` WHERE id_sensor=?');
    $req->bindValue(1,$id_sensor,PDO::PARAM_INT);
    $req->execute();
    $post=$req->rowCount();
    $req->closeCursor();
    return $post;
}

function check_sensor_name($id_home,$sensor_name){
    $db=dbConnect();
    $req=$db->prepare('SELECT sensor_name FROM `room`NATURAL JOIN sensor
WHERE id_home=? AND sensor_name=?');
    $req->bindValue(1,$id_home,PDO::PARAM_INT);
    $req->bindValue(2,$sensor_name,PDO::PARAM_STR);
    $req->execute();
    $post=$req->rowCount();
    $req->closeCursor();
    return $post;
}

function add_sensor($id_sensor, $sensor_type, $sensor_name, $id_room){
    $db=dbConnect();
    $req=$db->prepare('INSERT INTO sensor(id_sensor,sensor_type,sensor_name, id_room) 
VALUES (:id,:type,:name,:room)');
    $req->bindValue('id',$id_sensor,PDO::PARAM_INT);
    $req->bindValue('type',$sensor_type,PDO::PARAM_STR);
    $req->bindValue('name',$sensor_name,PDO::PARAM_STR);
    $req->bindValue('room',$id_room,PDO::PARAM_INT);
    $req->execute();
}

function get_sensor_detail($id_sensor){
    $db=dbConnect();
    $req=$db->prepare('SELECT * FROM `sensor` WHERE id_sensor=?');
    $req->bindValue(1,$id_sensor,PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function modify_sensor($id_sensor, $sensor_type, $sensor_name, $id_room)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE sensor 
SET sensor_name=:name, sensor_type=:type, id_room=:room 
WHERE id_sensor=:id');
    $req->bindValue('id', $id_sensor, PDO::PARAM_INT);
    $req->bindValue('type', $sensor_type, PDO::PARAM_STR);
    $req->bindValue('name', $sensor_name, PDO::PARAM_STR);
    $req->bindValue('room', $id_room, PDO::PARAM_INT);
    $req->execute();
}

function delete_sensor($id_sensor){
    $db=dbConnect();
    $req=$db->prepare('DELETE FROM `sensor` WHERE id_sensor=?');
    $req->bindValue(1,$id_sensor,PDO::PARAM_INT);
    $req->execute();
}

function get_sensor_light($id_home)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT
`id_sensor`,`sensor_type`,`sensor_name`,`id_room`,`name`
FROM `room` NATURAL JOIN sensor
WHERE id_home=? and sensor_type=?');
    $req->bindValue(1, $id_home, PDO::PARAM_INT);
    $req->bindValue(2, 'LIGHT', PDO::PARAM_STR);
    $req->execute();
    return $req;
}

function get_sensor_temp($id_home){
    $db = dbConnect();
    $req = $db-> prepare ('SELECT
`id_sensor`, `sensor_type`, `sensor_name`,`id_room`,`name`
FROM room NATURAL JOIN sensor
WHERE id_home=? and sensor_type=?');
    $req->bindValue(1,$id_home,PDO::PARAM_INT);
    $req->bindValue(2,'TEMP',PDO::PARAM_STR);
    $req->execute();
    return $req;
}

function edit_sensor( $id_sensor, $sensor_type, $sensor_name, $id_room){
    $db=dbConnect();
    $req=$db->prepare('UPDATE sensor SET sensor_name=:name, sensor_type=:type, id_room=:room WHERE id_sensor=:id');
    $req->bindValue('id', $id_sensor,PDO ::PARAM_INT);
    $req->bindValue('type',$sensor_type, PDO::PARAM_STR);
    $req->bindValue('name',$sensor_name, PDO::PARAM_STR);
    $req->bindValue('room', $id_room, PDO::PARAM_INT);
    $req->execute();
}