<?php


function getPassword($mail)
{
    $db=dbConnect();
    $req=$db->prepare('SELECT password,status,id_user,first_name FROM `user` WHERE mail= ?');
    $req->execute(array($mail));
    $post=$req->fetch();
    return $post;
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

