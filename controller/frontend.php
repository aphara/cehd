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
        $home = get_id_home($_SESSION['id']);
        $_SESSION['id_home'] = $home[0];
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
function getSensorLight($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req=get_sensor_light($_SESSION['target_home']);
    return $req;
}

function getEffectorLight($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req2=get_effector_light($_SESSION['target_home']);
    return $req2;
}

function getSensorTemp ($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req=get_sensor_temp($_SESSION['target_home']);
    return $req;
}

function getEffectorTemp($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req2=get_effector_temp($_SESSION['target_home']);
    return $req2;
}
function editSensor ( $id_sensor, $sensor_type, $sensor_name, $id_room){
    edit_sensor($id_sensor, $sensor_type, $sensor_name, $id_room);
}

function editEffector($id_effector, $effector_type, $effector_name, $id_room){
    edit_effector($id_effector, $effector_type, $effector_name, $id_room);
}

function UpdateInfo($categorie,$user_new,$id_session){
    $oldinfo=get_user_info($id_session);
    if($oldinfo[$categorie]==$user_new){
        echo "on ne peut mettre les meme donnees";
    } else{
        user_update($categorie,$user_new,$id_session);
        echo 'le prenom a ete change avec succes';
    }
}


function UpdateMail( $user_new,$id_session){
    $oldinfo=get_user_info($id_session);
   if($oldinfo['mail']==$user_new){
    echo "on ne peut mettre les meme donnees";
  }elseif (checkMail($user_new)==false) {
    echo "ceci n'est pas un mail";
  } else{
    user_update_mail( $user_new,$id_session);
      echo 'le mail a ete change avec succes';
  }
}


function UpdatePassword($id_session,$_mail,$_old_password,$_new_password,$_new_password_2){
      $result=get_password($_mail);
      $isPasswordCorrect = password_verify($_old_password,$result['password']);
      if ($isPasswordCorrect) {
        if ($_new_password===$_new_password_2){
            passwordHash($_new_password,$_mail);
            echo 'mot de passe change avec succes';
        }else{
            echo 'les mots de passe ne sont pas identiques';
        }
      }else {
          echo 'mot de passe incorrect!';

      }
}
