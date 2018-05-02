<?php

function addUser($mail,$first_name,$last_name,$date_of_birth,$phone){
    $db=dbConnect1();
    $req=$db->prepare('INSERT INTO user(status,mail,first_name,last_name,date_of_birth,phone)
 VALUES(\'SUPER_USER\',:mail,:first_name,:last_name,:date_of_birth,:phone)');
    $req->execute(array('mail'=>$mail,'first_name'=>$first_name,
        'last_name'=>$last_name,'date_of_birth'=>$date_of_birth,'phone'=>$phone));

    $req=$db->prepare('SELECT id_user FROM `user` WHERE mail=?');
    $req->execute(array($mail));
    $post=$req->fetch();
    return $post;
}

function addHome($home_type,$address,$city,$postcode){
    $db=dbConnect1();
    $req=$db->prepare('INSERT INTO home(type,address,city,postcode)
VALUES (:home_type,:address,:city,:postcode)');
    $req->execute(array('home_type'=>$home_type,'address'=>$address,'city'=>$city,'postcode'=>$postcode));
    $req=$db->prepare('SELECT id_home FROM `home` WHERE address=?');
    $req->execute(array($address));
    $post=$req->fetch();
    return $post;
}

function linkUserHome($id_user,$id_home){
    $db=dbConnect1();
    $req=$db->prepare('INSERT INTO residence VALUES(:id_user,:id_home)');
    $req->execute(array('id_user'=>$id_user,'id_home'=>$id_home));
}

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