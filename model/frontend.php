<?php


function get_password($mail)
{
    $db=dbConnect();
    $req=$db->prepare('SELECT password,status,id_user,first_name FROM `user` WHERE mail= ?');
    $req->execute(array($mail));
    $post=$req->fetch();
    return $post;
}

function mail_check($mail){
    $db=dbConnect();
    $req=$db->prepare('SELECT id_user FROM `user` WHERE mail=?');
    $req->execute(array($mail));
    $post=$req->rowCount();
    $req->closeCursor();
    return $post;
}

function is_password_set($mail){
    $db=dbConnect();
    $req=$db->prepare('SELECT password FROM `user` WHERE mail=?');
    $req->execute(array($mail));
    $post=$req->fetch();
    return $post;
}

function insertPassword($password,$mail){
    $db=dbConnect();
    $req=$db->prepare('UPDATE user SET password = :password WHERE mail=:mail');
    $req->execute(array('password'=>$password, 'mail'=>$mail));
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

function edit_sensor( $id_sensor, $sensor_type, $sensor_name, $id_room){
    $db=dbConnect();
    $req=$db->prepare('UPDATE sensor SET sensor_name=:name, sensor_type=:type, id_room=:room WHERE id_sensor=:id');
    $req->bindValue('id', $id_sensor,PDO ::PARAM_INT);
    $req->bindValue('type',$sensor_type, PDO::PARAM_STR);
    $req->bindValue('name',$sensor_name, PDO::PARAM_STR);
    $req->bindValue('room', $id_room, PDO::PARAM_INT);
    $req->execute();
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

function dbConnect()
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
}

function dbConnectA()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=cehd_alex;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}   


function user_update($categorie, $user_new, $id_session)
{
    $db=dbConnect();
// $db=dbConnectA();
    $req->prepare('update :categorie set user = :user_new where id_user= :id_session');
    $req->bindValue('categorie',$categorie,PDO::PARAM_STR);
    $req->bindValue('user_new',$user_new,PDO::PARAM_STR);
    $req->bindValue('$id_session',$id_session,PDO::PARAM_int);
    $test=$db->query($req1);
  // return ("your ". string($categorie) . " has been changed with success!");
}

//température instantané de la maison
function getinstant_temp($id_home){
    $db = dbConnect();
    $req = $db->prepare('SELECT 
`id_sensor`,`sensor_type`,`current_state`,`current_value`,`sensor_name`,`id_room`,`name`
FROM `room`NATURAL JOIN sensor NATURAL JOIN stat_sensor
WHERE id_home=? AND period= ? AND sensor_type=?');
    $req->bindValue(1, $id_home, PDO::PARAM_INT);
    $req->bindValue(2, 'ACTUAL',PDO::PARAM_STR);
    $req->bindValue(3,'TEMP',PDO::PARAM_STR);
    $req->execute();
    $donnee = $req->fetch();
    return $donnee;
}

//Récupere le tableau de tout les sensor du user
function getsensor_user($id_user){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM sensor WHERE id_user= ?');
    $req->execute(array($id_user));
    $donnees = $req->fetchAll();
    return $donnees;

}

//Récupere la consommation de la maison
function consohouse($id_user)
{
    $db = dbCOnnect();
    //modifier la requete
    $req = $db->prepare('SELECT consommation_value FROM consommation_jour WHERE piece_name="Salon" ');
    $req->execute();
    $conso = $req->fetchAll();
    $value = array();
    for ($i = 0; $i < sizeof($conso); $i++) {
        array_push($value, $conso[$i]["consommation_value"]);
    }
    return $value;
}

