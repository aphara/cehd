<?php
require_once('controller/frontend.php');
require_once('controller/backend.php');
require_once('controller/mail.php');
@session_start();

try {
    if (!isset($_GET['action']))
        $_GET['action'] = '';
    switch ($_GET['action']) {
//login
        case 'login':
            $isPasswordCorrect = login($_POST['_mail'], $_POST['_password']);
            if (isset($_SESSION['status'])) {
                if ($_SESSION['status'] == 'ADMIN') {
                    header("Location:index.php?action=homeb");
                    break;
                } elseif ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                    header("Location:index.php?action=home");
                    break;
                } else {
                    authErr();
                    break;
                }
            } else {
                break;
            }

//Premiere connexion
        case 'firstlog':
            require('view/frontend/firstlog.php');
            break;
        //test l'existence du compte utilisateur
        case 'firstlog_mail':
            //check regex mail
            $test = checkMail($_POST['_mail']);
            if ($test == true) {
                $_SESSION['mail'] = $_POST['_mail'];
                require 'view/frontend/firstlog_password.php';
            } else {
                echo 'Ce compte utilisateur est déjà existant ou n\'existe pas';
                require 'view/frontend/firstlog.php';
            }
            break;
        /*test l'existence du password et si non encrypte le password défini par l'utilisateur
        et l'ajoute à la db*/
        case 'firstlog_password':
            if ($_POST['_password'] == $_POST['_password_check']) {
                if (isPasswordSet($_SESSION['mail']) == false) {
                    passwordHash($_POST['_password'], $_SESSION['mail']);
                    unset($_SESSION['mail']);
                    echo 'Le mot de passe a bien été défini, vous pouvez maintenant vous connecter';
                    require 'view/frontend/login_view.php';
                } else {
                    unset($_SESSION['mail']);
                    echo 'ce compte a déjà été configuré.';
                    require 'view/frontend/login_view.php';
                }
            } else {
                echo 'Les mots de passe ne correspondent pas';
                require 'view/frontend/firstlog_password.php';
            }
            break;

//frontend
        case 'home':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/home_view.php';

            } else {
                authErr();
            }
            break;


        case 'contact':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/contact.php';
            } else {
                authErr();
            }
            break;
        case 'sendmail' :
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {

                if (isset ($_POST['message_contact']) AND !empty($_POST['message_contact']) AND isset($_POST['object_contact']) AND !empty ($_POST['message_contact'])) {
                    sendmail($_POST['message_contact'],$_POST['object_contact']);
                    echo 'Message envoyé !';
                    require 'view/frontend/contact.php';
                }

            }
            break;

        case 'cgu':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/cgu_view.php';
            } else {
                AuthErr();
            }
            break;

//backend
        case 'homeb':
            if ($_SESSION['status'] == 'ADMIN') {
                $req = getUserHome();
                require 'view/backend/home_view.php';
            } else {
                authErr();
            }
            break;
        case 'add_user_form':
            if ($_SESSION['status'] == 'ADMIN') {
                require 'view/backend/add_user_view.php';
            }
            break;
        case 'add_client':
            if ($_SESSION['status'] == 'ADMIN') {
                addClient($_POST['_mail'], $_POST['_firstname'], $_POST['_lastname'],
                    $_POST['_date_of_birth'], $_POST['_phone'], $_POST['_home_type'],
                    $_POST['_address'], $_POST['_city'], $_POST['_postcode']);
                require 'view/backend/add_user_view.php';
            } else {
                authErr();
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
} catch (Exception $e) {
}
