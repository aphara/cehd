<?php
require_once __DIR__."/../config.php";
require_once ROOT.'/model/model.php';

function login($_mail,$_password)
{

    $result=getPassword($_mail);
    $isPasswordCorrect = password_verify($_password,$result['password']);
    return $isPasswordCorrect;
}

function session($_mail){
    $result=getUserSession($_mail);
    session_start();
    $_SESSION['id'] = $result['id_user'];
    $_SESSION['name'] = $result['first_name'];

}


