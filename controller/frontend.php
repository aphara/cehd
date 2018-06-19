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
        $id_home = get_id_home($_SESSION['id']);
        $_SESSION['id_home'] = $id_home[0];
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
        echo "on ne peut mettre les meme donnees";
    } else{
        user_update($categorie,$user_new,$id_session);
        echo "l'information a ete change avec succes";
    }
}


function UpdateMail( $user_new,$id_session){
    $oldinfo=get_user_info($id_session);
    if($oldinfo['mail']==$user_new){
        echo "on ne peut mettre les meme donnees";
    }elseif (checkMail($user_new)==true) {
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

function getConsoHouse($id_home){
    $donnees = get_conso_house($id_home);
    $rep = [['date','value']];
    while ($values = $donnees->fetch()){
        array_push($rep,array(substr($values['date_maj'],8,-8   ),(int)$values['value']));
    }
    //die(var_dump($rep));
    return $rep;
}