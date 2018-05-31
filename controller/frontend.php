<?php
require_once __DIR__ . "/../config.php";
require_once ROOT . '/model/frontend.php';


function login($_mail, $_password)
{
    //password hash check
    $result = get_password($_mail);
    $isPasswordCorrect = password_verify($_password, $result['password']);
    if ($isPasswordCorrect) {
        @session_start();
        $_SESSION['id'] = $result['id_user'];
        $_SESSION['name'] = $result['first_name'];
        $_SESSION['status'] = $result['status'];
        $_SESSION['mail'] = $_mail;
    } else {
        echo 'Mauvais identifiant ou mot de passe !';
        require 'view/frontend/login_view.php';
    }
}

function authErr()
{
    session_destroy();
    echo 'Vous n\'avez pas l\'autorisation d\'accéder à cette page';
    require 'view/frontend/login_view.php';
}

function checkMail($mail)
{
    $isMailOk = mail_check($mail);
    if ($isMailOk == 1) {
        return $test = true;
    } else {
        return $test = false;
    }
}

function isPasswordSet($mail)
{
    $passwordSet = is_password_set($mail);
    if ($passwordSet['password'] == '') {
        return false;
    } else {
        return true;
    }
}

function passwordHash($password,$mail){
    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
    insertPassword($hashedPassword,$mail);
}

function Update_Info($_categorie,$user_new,$id_session){
  $oldinfo=get_user_info($_categorie,$id_session);
  if($oldinfo==$user_new){
    return "on ne peut mettre les meme donnees";
  }else{
    return user_update($_categorie, $user_new,$id_session);
  }
}

//function checkpassword($_mail,$_password){
//      //password hash check
//      $result=getPassword($_mail);
//      $isPasswordCorrect = password_verify($_password,$result['password']);
//      else {
//          echo 'mot de passe incorrect!';
//          require 'view/frontend/setting.php';
//      }
//  }

//function update_password($id_session,$_mail,$_old_password,$_new_password,$_new_password_2){
//    checkpassword($_mail,$_old_password);
//    if ($_new_password===$_new_password_2){
//    user_update("password",$_new_password,$id_session);
//  }else{
//    echo 'les mots de passe ne sont pas identiques'
//    require 'view/frontend/setting.php';
//  }
//}
