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



function dbConnectA()
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

function dbConnect()
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

// fonction update
function user_update($categorie, $user_new, $id_session)
      {
      //  var_dump($user_new);
      //  var_dump($id_session);
         $db=dbConnect();
       //$db=dbConnectA();

        $req=$db->prepare('UPDATE user SET ' . $categorie . ' =? WHERE id_user=?');
        //var_dump($categorie);
        //$req->bindValue(1,$categorie,PDO::PARAM_STR);
        //$req->bindValue(2,$user_new,PDO::PARAM_STR);
        //$req->bindValue(3,$id_session,PDO::PARAM_STR);
        //$req->execute(array('categorie'=>$categorie,'user_new'=>$user_new,'id'=>$id_session));
          $req->execute(array($user_new,$id_session));
          //var_dump($req);
        }

function user_update_first_name( $user_new,$id_session)
      {
         $db=dbConnect();
       //$db=dbConnectA();
        $req=$db->prepare('UPDATE user SET first_name=? WHERE id_user=?');
        $test=$req->execute(array($user_new, $id_session));
        }

function user_update_last_name( $user_new,$id_session)
      {
         $db=dbConnect();
       //$db=dbConnectA();
        $req=$db->prepare('UPDATE user SET last_name=? WHERE id_user=?');
        $test=$req->execute(array($user_new, $id_session));
        }

function user_update_date_of_birth( $user_new,$id_session)
      {
         $db=dbConnect();
       //$db=dbConnectA();
        $req=$db->prepare('UPDATE user SET date_of_birth=? WHERE id_user=?');
        $test=$req->execute(array($user_new, $id_session));
        }

function user_update_phone_number( $user_new,$id_session)
      {
         $db=dbConnect();
       //$db=dbConnectA();
        $req=$db->prepare('UPDATE user SET phone=? WHERE id_user=?');
        $test=$req->execute(array($user_new, $id_session));
        }

function user_update_mail( $user_new,$id_session)
      {
         $db=dbConnect();
       //$db=dbConnectA();
        $req=$db->prepare('UPDATE user SET mail=? WHERE id_user=?');
        $test=$req->execute(array($user_new, $id_session));
        }

function user_update_password($user_new,$id_session)
      {
        $db=dbConnect();
      //$db=dbConnectA();
       $req=$db->prepare('UPDATE user SET password=? WHERE id_user=?');
       $test=$req->execute(array($user_new, $id_session));
      }

//function check_all_mail($mail)
//      {
//        $db=dbConnect();
//        //$db=dbConnectA();
//        $req= $db->prepare('SELECT mail FROM user ');
//        $req->execute();
//        while ($donnees = $reponse->fetch()){
//        $post=$req->fetch();
//        if()
//      }
//        return $post;
//      }

function get_user_info($id_session)
{
  $db=dbConnect();
  //$db=dbConnectA();
  $req= $db->prepare('SELECT * FROM user WHERE id_user= ?');
  $req->execute(array($id_session));
  $post=$req->fetch();
  return $post;
}
