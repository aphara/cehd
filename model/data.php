<?php

function store_data($id_sensor,$date_maj,$value,$stat_type){
    $db=dbConnect();
    $req=$db->prepare('INSERT INTO stat_sensor(id_sensor,date_maj,value,stat_type)
VALUES(?,?,?,?)');
    $req->bindValue(1,$id_sensor,PDO::PARAM_INT);
    $req->bindValue(2,$date_maj,PDO::PARAM_STR);
    $req->bindValue(3,$value,PDO::PARAM_STR);
    $req->bindValue(4,$stat_type,PDO::PARAM_STR);
    $req->execute();
}

function get_last_date(){
    $db=dbConnect();
    $req=$db->query('SELECT date_maj FROM `stat_sensor`
ORDER BY date_maj DESC');
    $req=$req->fetchAll();
    return $req[0];
}

function get_date($id_sensor,$id_home){
    $db=dbConnect();
    $req=$db->prepare('SELECT id_stat,date_maj,period 
FROM `stat_sensor` NATURAL JOIN sensor NATURAL JOIN room 
WHERE id_sensor=? AND id_home=?');
    $req->bindValue(1,$id_sensor,PDO::PARAM_INT);
    $req->bindValue(2,$id_home,PDO::PARAM_INT);
    $req->execute();
    return $req;
    /*$post=$req->fetch();
    return $post[0];*/
}

function update_period($id_stat,$period){
    $db=dbConnect();
    $req=$db->prepare('UPDATE stat_sensor SET period=?
WHERE id_stat=?');
    $req->bindValue(1,$period,PDO::PARAM_STR);
    $req->bindValue(2,$id_stat,PDO::PARAM_INT);
    $req->execute();
}

function get_last($id_sensor,$id_home){
    $db=dbConnect();
    $req=$db->prepare('SELECT id_sensor, value, id_stat
FROM `stat_sensor` NATURAL JOIN sensor NATURAL JOIN room
WHERE id_sensor=? AND id_home=? 
ORDER BY id_stat DESC LIMIT 1');
    $req->bindValue(1,$id_sensor,PDO::PARAM_INT);
    $req->bindValue(2,$id_home,PDO::PARAM_INT);
    $req->execute();
    $req=$req->fetchAll();
    return $req;
}

function update_sensor_value($id_sensor,$value){
    $db=dbConnect();
    $req=$db->prepare('UPDATE sensor SET current_value=?
WHERE id_sensor=?');
    $req->bindValue(1,$value,PDO::PARAM_STR);
    $req->bindValue(2,$id_sensor,PDO::PARAM_INT);
    $req->execute();
}