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