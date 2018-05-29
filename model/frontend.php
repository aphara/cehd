<?php


function getPassword($mail)
{
    $db=dbConnect();
    $req=$db->prepare('SELECT password,status,id_user,first_name FROM `user` WHERE mail= ?');
    $req->execute(array($mail));
    $post=$req->fetch();
    return $post;
}

function getUserSession($mail)
{
    $db=dbConnect();
    $req=$db->prepare('SELECT id_user,first_name FROM `user` WHERE mail= ?');
    $req->execute(array($mail));
    $post=$req->fetch();
    return $post;
}

function mailCheck($mail){
    $db=dbConnect();
    $req=$db->prepare('SELECT id_user FROM `user` WHERE mail=?');
    $req->execute(array($mail));
    $post=$req->rowCount();
    $req->closeCursor();
    return $post;
}

function is_PasswordSet($mail){
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

function UserUpdate($categorie, $user_new, $id_session)
{
 //  $db=dbConnect();
 $db=dbConnectA();
  $req->prepare('update :categorie set user = :user_new where id_user= :id_session');
  $req->bindValue('categorie',$categorie,PDO::PARAM_STR);
  $req->bindValue('user_new',$user_new,PDO::PARAM_STR);
  $req->bindValue('$id_session',$id_session,PDO::PARAM_int);
  $test=$db->query($req1);
  // return ("your ". string($categorie) . " has been changed with success!");
}

function getUserinfo($categorie, $id_session)
{
  //  $db=dbConnect();
  $db=dbConnectA();
  $req=$db->prepare('SELECT :catergorie from user where id= :id_session')
  $req->bindValue('id_session',$id_session, PDO::PARAM_INT);
  $req->bindValue('categorie',$id_session, PDO::PARAM_STR);
  $req->execute(array($res));
  $post=$req->fetch();
  //return $post;
}
