<?php
require_once('controller/frontend.php');
require_once('controller/backend.php');
@session_start();

try {
    if (!isset($_GET['action']))
        $_GET['action']='';
    switch($_GET['action']) {
//login
        case 'login':
            $isPasswordCorrect = login($_POST['_mail'], $_POST['_password']);
            if (isset($_SESSION['status'])){
                if ($_SESSION['status']=='ADMIN'){
                    header("Location:index.php?action=homeb");
                    break;
                }elseif ($_SESSION['status']=='USER' || $_SESSION['status']=='SUPER_USER'){
                    header("Location:index.php?action=home");
                    break;
                }else{
                    authErr();
                    break;
                }
            }else{
                break;}

//Premiere connexion
        case 'firstlog':
            require('view/frontend/firstlog.php');
            break;
        //test l'existence du compte utilisateur
        case 'firstlog_mail':
            //check regex mail
            $test=checkMail($_POST['_mail']);
            if ($test==true){
                $_SESSION['mail']=$_POST['_mail'];
                require 'view/frontend/firstlog_password.php';
            }else{
                echo 'Ce compte utilisateur est déjà existant ou n\'existe pas';
                require 'view/frontend/firstlog.php';
            }
            break;
        /*test l'existence du password et si non encrypte le password défini par l'utilisateur
        et l'ajoute à la db*/
        case 'firstlog_password':
            if ($_POST['_password']==$_POST['_password_check']){
                if (isPasswordSet($_SESSION['mail'])==false){
                    passwordHash($_POST['_password'],$_SESSION['mail']);
                    unset($_SESSION['mail']);
                    echo 'Le mot de passe a bien été défini, vous pouvez maintenant vous connecter';
                    require 'view/frontend/login_view.php';
                }else{
                    unset($_SESSION['mail']);
                    echo 'ce compte a déjà été configuré.';
                    require 'view/frontend/login_view.php';
                }
            }else{
                echo 'Les mots de passe ne correspondent pas';
                require 'view/frontend/firstlog_password.php';
            }
            break;

//frontend
        case 'home':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/home_view.php';

            }else{
                authErr();
            }
            break;


        case 'contact':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER' ){
                require'view/frontend/contact.php';
            }
            else {
                authErr();
            }
            break;

        case 'setting':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER' ){
                require'view/frontend/setting.php';
            }
            else {
                authErr();

        case 'cgu':
            if ($_SESSION['status']=='USER' || $_SESSION['status']=='SUPER_USER'){
                require'view/frontend/cgu_view.php';
            }else{
                authErr();
            }
            break;

//backend
        case 'homeb':
            if ($_SESSION['status'] == 'ADMIN') {
                $req=getUserHome();
                require 'view/backend/home_view.php';
            }else{
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
            }else{
                authErr();
            }
            break;

//update pour setting
        case 'update_firstname' :
              Update_Info('first_name',$_POST['_first_name'],$_SESSION['id']);
              $_SESSION['name']=$_POST['_first_name'];
              echo 'le prenom a ete change avec succes';
             require ' view/frontend/setting';

        case 'update_lastname' :
               Update_Info('last_name',$_POST['_last_name'],$_SESSION['id']);
               echo 'le nom a ete change avec succes';
              require ' view/frontend/setting';

        case 'update_birthdate' :
              Update_Info('date_of_birth',$_POST['_birthdate'],$_SESSION['id']);
              echo 'la date de naissance a ete changee avec succes';
              require ' view/frontend/setting';

        case 'update_phone_number' :
              Update_Info('phone_number',$_POST['_phone_number'],$_SESSION['id']);
              echo 'le numero de telephone a ete change avec succes';
              require ' view/frontend/setting';

        case 'update_password' :
              update_password($_SESSION['id'],$_SESSION['_mail'], $_POST['_old_password'],$_POST['_password'],$_POST['_verifpassword']);
              echo 'password change avec succes';
              require 'view/front/setting';

        case 'update_e-mail' :
              Update_Info('mail',$_POST['_mail'],$_SESSION['id']);
              $_SESSION['mail']=$_POST['_mail'];
              echo 'mail change avec succes';
              require 'view/front/setting';


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
