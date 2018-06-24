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
        if($_SESSION['status']== 'USER'){
            $id_superuser=get_id_superuser($_SESSION['id']);
            $_SESSION['id_superuser']=$id_superuser[0];
            $id_home=get_id_home($_SESSION['id_superuser']);
            $_SESSION['id_home'] = $id_home[0];
        }else{
            $id_home = get_id_home($_SESSION['id']);
            $_SESSION['id_home'] = $id_home[0];
        }

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

function UpdateInfo($categorie,$user_new,$id_session){
    $oldinfo=get_user_info($id_session);
    if($oldinfo[$categorie]==$user_new){
        echo "On ne peut mettre les mêmes données";
    } else{
        user_update($categorie,$user_new,$id_session);
        echo "L'information a été changée avec succès";
    }
}


function UpdateMail( $user_new,$id_session){
    $oldinfo=get_user_info($id_session);
    if($oldinfo['mail']==$user_new){
        echo "On ne peut mettre les mêmes données";
    }elseif (checkMail($user_new)==true) {
        echo "Ceci n'est pas un mail";
    } else{
        user_update_mail( $user_new,$id_session);
        echo 'Le mail a été changé avec succès';
    }
}


function UpdatePassword($id_session,$_mail,$_old_password,$_new_password,$_new_password_2){
    $result=get_password($_mail);
    $isPasswordCorrect = password_verify($_old_password,$result['password']);
    if ($isPasswordCorrect) {
        if ($_new_password===$_new_password_2){
            passwordHash($_new_password,$_mail);
            echo 'Mot de passe changé avec succès';
        }else{
            echo 'Les mots de passe ne sont pas identiques';
        }
    }else {
        echo 'Mot de passe incorrect!';

    }
}

function getConsoHouse($id_home,$periode){
    $donnees = get_conso_house($id_home,$periode);
    $rep = [['date','value']];
    if ($periode == "DAY"){
        while ($values = $donnees->fetch()){
            array_push($rep,array(substr($values['date_maj'],8,-8   ),(int)$values['value']));
        }
    }
    if ($periode == "HOUR"){
        while ($values = $donnees->fetch()){
            array_push($rep,array(substr($values['date_maj'],11,-6   ),(int)$values['value']));
        }
    }
    if ($periode == "MONTH"){
        while ($values = $donnees->fetch()){
            array_push($rep,array(substr($values['date_maj'],5,-12   ),(int)$values['value']));
        }
    }
    return $rep;
}

function getStateSensor($id_home){
    $donnees = get_state_sensor($id_home);
    while ($values = $donnees->fetch()){
        if ($values['current_state'] == 0){
            return FALSE;
        }
    }
    return TRUE;
}