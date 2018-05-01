<?php
require_once('controller/frontend.php');
require_once('controller/backend.php');
@session_start();

try
{
    if (!isset($_GET['action']))
        $_GET['action']='';
    switch($_GET['action']){
//login
        case 'login':
            $isPasswordCorrect=login($_POST['_mail'],$_POST['_password']);
            if ($_SESSION['status']=='ADMIN'){
                header("Location:index.php?action=homeb");
            }
            elseif ($_SESSION['status']=='USER' || $_SESSION['status']=='SUPER_USER'){
                header("Location:index.php?action=home");
            }else{
                AuthErr();
            }
            break;
//frontend
        case 'home':
            if ($_SESSION['status']=='USER' || $_SESSION['status']=='SUPER_USER'){
                require 'view/frontend/home_view.php';

            }else{
                AuthErr();

            }
            break;

//backend
        case 'homeb':
            if ($_SESSION['status']=='ADMIN'){
                require 'view/backend/home_view.php';
            }else{
                AuthErr();
            }
            break;
        case 'add_user_form':
            require 'view/backend/add_user_view.php';
            break;
        case 'add_user':
            //fonction controller backend + req sql
            break;

//logout
        case 'logout':
            session_destroy();
            require 'view/frontend/login_view.php';
            break;
        default:
            require 'view/frontend/login_view.php';

    }
}catch (Exception $e){}


