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

function get_users($id)
{
    $db = dbConnect1();
    $req = $db->prepare('SELECT * FROM `user` WHERE id_superuser=:id ORDER BY status');
    $req->bindValue('id', $id, PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function add_user($mail,$first_name,$last_name,$date_of_birth,$phone,$id_superuser)
{
    $db = dbConnect1();
    $req = $db->prepare('INSERT INTO user(status,mail,first_name,last_name,date_of_birth,phone,id_superuser)
 VALUES(\'USER\',:mail,:first_name,:last_name,:date_of_birth,:phone,:id_superuser)');
    $req->bindValue('mail', $mail, PDO::PARAM_STR);
    $req->bindValue('first_name', $first_name, PDO::PARAM_STR);
    $req->bindValue('last_name', $last_name, PDO::PARAM_STR);
    $req->bindValue('date_of_birth', $date_of_birth, PDO::PARAM_STR);
    $req->bindValue('phone', $phone, PDO::PARAM_STR);
    $req->bindValue('id_superuser', $id_superuser, PDO::PARAM_STR);
    $req->execute();
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



function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=cehd;charset=utf8', 'root', 'root');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
