<?php

function addUser($mail,$first_name,$last_name,$date_of_birth,$phone){
    $db=dbConnect1();
    $req=$db->prepare('INSERT INTO user(status,mail,first_name,last_name,date_of_birth,phone)
 VALUES(\'SUPER_USER\',:mail,:first_name,:last_name,:date_of_birth,:phone)');
    $req->bindValue('mail',$mail, PDO::PARAM_STR);
    $req->bindValue('first_name',$first_name, PDO::PARAM_STR);
    $req->bindValue('last_name',$last_name, PDO::PARAM_STR);
    $req->bindValue('date_of_birth',$date_of_birth, PDO::PARAM_STR);
    $req->bindValue('phone',$phone, PDO::PARAM_STR);
    $req->execute();

    $req=$db->prepare('SELECT id_user FROM `user` WHERE mail=?');
    $req->bindValue(1,$mail,PDO::PARAM_STR);
    $req->execute();
    $post=$req->fetch();
    return $post;
}

function addHome($home_type,$address,$city,$postcode){
    $db=dbConnect1();
    $req=$db->prepare('INSERT INTO home(type,address,city,postcode)
VALUES (:home_type,:address,:city,:postcode)');
    $req->bindValue('home_type',$home_type, PDO::PARAM_STR);
    $req->bindValue('address',$address, PDO::PARAM_STR);
    $req->bindValue('city',$city, PDO::PARAM_STR);
    $req->bindValue('postcode',$postcode, PDO::PARAM_STR);
    $req->execute();

    $req=$db->prepare('SELECT id_home FROM `home` WHERE address=?');
    $req->bindValue(1,$address, PDO::PARAM_STR);
    $req->execute();
    $post=$req->fetch();
    return $post;
}

function linkUserHome($id_user,$id_home){
    $db=dbConnect1();
    $req=$db->prepare('INSERT INTO user_home VALUES(:id_user,:id_home)');
    $req->bindValue('id_user',$id_user, PDO::PARAM_INT);
    $req->bindValue('id_home',$id_home, PDO::PARAM_INT);
    $req->execute(array('id_user'=>$id_user,'id_home'=>$id_home));
}

function get_user_home(){
    $db=dbConnect1();
    $req=$db->prepare('SELECT * FROM `user_home` NATURAL JOIN  home NATURAL JOIN user');
    $req->execute();
    return $req;
}
/*
ORDER BY id_home;*/

function dbConnect1()
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