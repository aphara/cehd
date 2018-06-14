<?php

function get_effector($id_home){
    $db=dbConnect();
    $req=$db->prepare('SELECT 
`id_effector`,`effector_type`,`request_value`,`effector_name`,`id_room`,`name`
FROM `room`NATURAL JOIN effector
WHERE id_home=?;');
    $req->bindValue(1,$id_home,PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function check_id_effector($id_effector){
    $db=dbConnect();
    $req=$db->prepare('SELECT id_effector FROM `effector` WHERE id_effector=?');
    $req->bindValue(1,$id_effector,PDO::PARAM_INT);
    $req->execute();
    $post=$req->rowCount();
    $req->closeCursor();
    return $post;
}

function check_effector_name($id_home,$effector_name){
    $db=dbConnect();
    $req=$db->prepare('SELECT effector_name FROM `room`NATURAL JOIN effector
WHERE id_home=? AND effector_name=?');
    $req->bindValue(1,$id_home,PDO::PARAM_INT);
    $req->bindValue(2,$effector_name,PDO::PARAM_STR);
    $req->execute();
    $post=$req->rowCount();
    $req->closeCursor();
    return $post;
}

function add_effector($id_effector, $effector_type, $effector_name, $id_room){
    $db=dbConnect();
    $req=$db->prepare('INSERT INTO effector(id_effector,effector_type,effector_name, id_room) 
VALUES (:id,:type,:name,:room)');
    $req->bindValue('id',$id_effector,PDO::PARAM_INT);
    $req->bindValue('type',$effector_type,PDO::PARAM_STR);
    $req->bindValue('name',$effector_name,PDO::PARAM_STR);
    $req->bindValue('room',$id_room,PDO::PARAM_INT);
    $req->execute();
}

function get_effector_detail($id_effector){
    $db=dbConnect();
    $req=$db->prepare('SELECT * FROM `effector` WHERE id_effector=?');
    $req->bindValue(1,$id_effector,PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function modify_effector($id_effector, $effector_type, $effector_name, $id_room)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE effector 
SET effector_name=:name, effector_type=:type, id_room=:room 
WHERE id_effector=:id');
    $req->bindValue('id', $id_effector, PDO::PARAM_INT);
    $req->bindValue('type', $effector_type, PDO::PARAM_STR);
    $req->bindValue('name', $effector_name, PDO::PARAM_STR);
    $req->bindValue('room', $id_room, PDO::PARAM_INT);
    $req->execute();
}

function delete_effector($id_effector){
    $db=dbConnect();
    $req=$db->prepare('DELETE FROM `effector` WHERE id_effector=?');
    $req->bindValue(1,$id_effector,PDO::PARAM_INT);
    $req->execute();
}

function get_effector_light($id_home)
{
    $db = dbConnect();
    $req2 = $db->prepare('SELECT
`id_effector`,`effector_type`,`effector_name`,`id_room`,`name`
FROM `room`NATURAL JOIN effector
WHERE id_home=? and effector_type=?');
    $req2->bindValue(1, $id_home, PDO::PARAM_INT);
    $req2->bindValue(2, 'LIGHT_CTRL', PDO::PARAM_STR);
    $req2->execute();
    return $req2;
}

function get_effector_temp($id_home){
    $db =dbConnect();
    $req2 = $db-> prepare( 'SELECT
    `id_effector`,`effector_type`,`effector_name`,`id_room`,`name`
    FROM room NATURAL JOIN effector
    WHERE id_home=? and effector_type=?');
    $req2->bindValue(1,$id_home,PDO::PARAM_INT);
    $req2->bindValue(2,'TEMP_CTRL',PDO::PARAM_STR);
    $req2->execute();
    return $req2;

}

function edit_effector($id_effector, $effector_type, $effector_name, $id_room)
{
    $db = dbConnect();
    $req2 = $db->prepare('UPDATE effector
SET effector_name=:name, effector_type=:type, id_room=:room
WHERE id_effector=:id');
    $req2->bindValue('id', $id_effector, PDO::PARAM_INT);
    $req2->bindValue('type', $effector_type, PDO::PARAM_STR);
    $req2->bindValue('name', $effector_name, PDO::PARAM_STR);
    $req2->bindValue('room', $id_room, PDO::PARAM_INT);
    $req2->execute();
}

function get_effector_type($id_home,$type){
    $db=dbConnect();
    $req=$db->prepare('SELECT 
`id_effector`,`effector_type`,`request_value`
FROM `room`NATURAL JOIN effector
WHERE id_home=? AND effector_type=?');
    $req->bindValue(1,$id_home,PDO::PARAM_INT);
    $req->bindValue(2,$type,PDO::PARAM_STR);
    $req->execute();
    return $req;
}