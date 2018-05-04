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


function UserUpdate($update, $user_new, $id_session)
{
  $db=dbConnect();
  $req1="SELECT $update from user where id_user= $id_session";
  $test=$db->query($req1);
  if($test===$user_new){
    return "you can't put the same ". phrase($update) ;
  }
  $req2="Update user set first_name where id_user=$id_session ";
   return ("your ". string($update) . " has been changed with success!");
}

function getUserinfo($categorie, $id_session)
{
  $db=dbConnect();
  $req="SELECT $categorie FROM user where id_user =$id_session";
  $post=$db->query($req);
  return $post;
}

// function phrase($str)
// {
//   $string=(string)$str
//   $newstring= str_replace("_"," ",$string);
//   return $newstring;
// }
