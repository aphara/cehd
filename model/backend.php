<?php


function add_home($home_type,$address,$city,$postcode){
    $db=dbConnect();
    $req=$db->prepare('INSERT INTO home(type,address,city,postcode)
VALUES (:home_type,:address,:city,:postcode)');
    $req->bindValue('home_type',$home_type, PDO::PARAM_STR);
    $req->bindValue('address',$address, PDO::PARAM_STR);
    $req->bindValue('city',$city, PDO::PARAM_STR);
    $req->bindValue('postcode',$postcode, PDO::PARAM_STR);
    $req->execute();

    $req=$db->prepare('SELECT id_home FROM `home` WHERE address=?');
    $req->bindValue('address',$address, PDO::PARAM_STR);
    $req->execute();
    $post=$req->fetch();
    return $post;
}


function link_user_home($id_user,$id_home){
    $db=dbConnect();
    $req=$db->prepare('INSERT INTO user_home VALUES(:id_home,:id_user)');
    $req->bindValue('id_home',$id_home, PDO::PARAM_INT);
    $req->bindValue('id_user',$id_user, PDO::PARAM_INT);
    $req->bindValue('id_home',$id_home, PDO::PARAM_INT);
    $req->execute(array('id_user'=>$id_user,'id_home'=>$id_home));
}

function get_user_home(){
    $db=dbConnect();
    $req=$db->prepare('SELECT * FROM `user_home` NATURAL JOIN  home NATURAL JOIN user');
    $req->execute();
    return $req;
    /*ORDER BY id_home;*/
}



/*voir si passage nom de table en paramètre possible ?*/
function search_by_id($search/*,$type*/){
    $db=dbConnect();
    $req=$db->prepare('SELECT * FROM `user_home` NATURAL JOIN  home NATURAL JOIN user
WHERE id_home=?');
    /*$req->bindValue(1,$type,PDO::PARAM_STR);*/
    $req->bindValue(1,$search,PDO::PARAM_INT);
    $req->execute();
    return $req;
}
function search_by_mail($search){
    $db=dbConnect();
    $req=$db->prepare('SELECT * FROM `user_home` NATURAL JOIN  home NATURAL JOIN user
WHERE mail=?');
    $req->bindValue(1,$search,PDO::PARAM_STR);
    $req->execute();
    return $req;
}
function search_by_phone($search){
    $db=dbConnect();
    $req=$db->prepare('SELECT * FROM `user_home` NATURAL JOIN  home NATURAL JOIN user
WHERE phone=?');
    $req->bindValue(1,$search,PDO::PARAM_STR);
    $req->execute();
    return $req;
}
function search_by_name($search){
    $db=dbConnect();
    $req=$db->prepare('SELECT * FROM `user_home` NATURAL JOIN  home NATURAL JOIN user
WHERE last_name=?');
    $req->bindValue(1,$search,PDO::PARAM_STR);
    $req->execute();
    return $req;
}
//datatable


function get_id_home($id_user){
    $db=dbConnect();
    $req=$db->prepare('SELECT id_home FROM user_home WHERE id_user=?');
    $req->bindValue(1,$id_user,PDO::PARAM_INT);
    $req->execute();
    $id_home=$req->fetch();
    return $id_home;
}

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




function delete_link($id_home){
    $db=dbConnect();
    $req=$db->prepare('DELETE FROM `user_home` WHERE id_home=?');
    $req->bindValue(1,$id_home,PDO::PARAM_INT);
    $req->execute();
}

function delete_home($id_home){
    $db=dbConnect();
    $req=$db->prepare('DELETE FROM `home` WHERE id_home=?');
    $req->bindValue(1,$id_home,PDO::PARAM_INT);
    $req->execute();
}





/*function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=cehd;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}*/