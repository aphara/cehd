<?php

function check_id_stat($id_stat){
    $db=dbConnect();
    $req=$db->prepare('SELECT * FROM `stat_sensor`
WHERE id_stat=?');
    $req->bindValue(1,$id_stat,PDO::PARAM_INT);
    $req->execute();
    $post=$req->rowCount();
    $req->closeCursor();
    return $post;
}

function store_data($id_stat,$id_sensor,$date_maj,$value,$stat_type){
    $db=dbConnect();
    $req=$db->prepare('INSERT INTO stat_sensor(id_stat,id_sensor,date_maj,value,stat_type)
VALUES(?,?,?,?,?)');
    $req->bindValue(1,$id_stat,PDO::PARAM_INT);
    $req->bindValue(2,$id_sensor,PDO::PARAM_INT);
    $req->bindValue(3,$date_maj,PDO::PARAM_STR);
    $req->bindValue(4,$value,PDO::PARAM_STR);
    $req->bindValue(5,$stat_type,PDO::PARAM_STR);
    $req->execute();
}