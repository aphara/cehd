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
            /*$result=getUserSession($_POST['_mail']);
            session_start();
            $_SESSION['id'] = $result['id_user'];
            $_SESSION['name'] = $result['first_name'];*/
            if ($_SESSION['status']=='ADMIN'){
                header("Location:index.php?action=homeb");
            }
            elseif ($_SESSION['status']=='USER' || $_SESSION['status']=='SUPER_USER'){
                header("Location:index.php?action=home");
//                header('Location: ./view/frontend/home_view.php');
            }else{
                AuthErr();
            }
            break;

        /*demander email, checker attribution
            si oui : demander un mdp puis hash
            si non : retour accueil*/

        case 'firstlog':
            require('view/frontend/firstlog.php');
            break;
        case 'firstlog_mail':
            //check regex mail
            //req sql présence adresse mail
            break;
        case 'firstlog_password':
            //test password match
            //password hash

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
            if ($_SESSION['status']=='ADMIN'){
                require 'view/backend/add_user_view.php';
            }
            break;
        case 'add_client':
            if ($_SESSION['status']=='ADMIN'){
                addClient($_POST['_mail'],$_POST['_firstname'],$_POST['_lastname'],
                    $_POST['_date_of_birth'],$_POST['_phone'],$_POST['_home_type'],
                    $_POST['_address'],$_POST['_city'],$_POST['_postcode']);
                require 'view/backend/add_user_view.php';
            }
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


