<?php
require_once __DIR__ . "/../config.php";
require_once ROOT . '/model/frontend.php';

function login($_mail,$_password)
{
    //password hash check
    $result=getPassword($_mail);
    $isPasswordCorrect = password_verify($_password,$result['password']);
    if ($isPasswordCorrect && $result['status']=='ADMIN') {
        session_start();
        $_SESSION['id'] = $result['id_user'];
        $_SESSION['name'] = $result['first_name'];
        require_once ROOT . '/view/backend/home_view.php';
    }
    elseif ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $result['id_user'];
        $_SESSION['name'] = $result['first_name'];
        require_once ROOT . '/view/frontend/home_view.php';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
        require 'view/frontend/login_view.php';
    }
}




