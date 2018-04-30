<?php
require_once('controller/controller.php');
try
{
    if (!isset($_GET['action']))
        $_GET['action']='';
    switch($_GET['action']){
        case 'login':
            $isPasswordCorrect=login($_POST['_mail'],$_POST['_password']);
            if ($isPasswordCorrect) {
                $a=session($_POST['_mail']);

            }
            else {
                echo 'Mauvais identifiant ou mot de passe !';
                require 'view/login_view.php';
            }
            break;
        /*case 'home':
            require 'view/home_view.php';
            break;*/

        default:
            require 'view/login_view.php';

    }
}catch (Exception $e){}


