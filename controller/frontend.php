<?php
require_once __DIR__ . "/../config.php";
require_once ROOT . '/model/frontend.php';

function login($_mail,$_password)
{
    //password hash check
    $result=getPassword($_mail);
    $isPasswordCorrect = password_verify($_password,$result['password']);
    if ($isPasswordCorrect) {
        @session_start();
        $_SESSION['id'] = $result['id_user'];
        $_SESSION['name'] = $result['first_name'];
        $_SESSION['status'] = $result['status'];
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
        require 'view/frontend/login_view.php';
    }
}

function authErr(){
    session_destroy();
    echo 'Vous n\'avez pas l\'autorisation d\'accéder à cette page';
    require 'view/frontend/login_view.php';
}

function checkMail($mail){
    $isMailOk=mailCheck($mail);
    if ($isMailOk==1){
        return $test=true;
    }else{
        return $test=false;
    }
}

function isPasswordSet($mail){
    $passwordSet=is_PasswordSet($mail);
    if ($passwordSet['password']==''){
        return false;
    }else{
        return true;
    }
}

function passwordHash($password,$mail){
    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
    insertPassword($hashedPassword,$mail);
}