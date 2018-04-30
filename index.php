<?php
require_once('controller/frontend.php');

try
{
    if (!isset($_GET['action']))
        $_GET['action']='';
    switch($_GET['action']){
        case 'login':
            $isPasswordCorrect=login($_POST['_mail'],$_POST['_password']);

            break;
        /*case 'home':
            require 'view/home_view.php';
            break;*/

        default:
            require 'view/frontend/login_view.php';

    }
}catch (Exception $e){}


