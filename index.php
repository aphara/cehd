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

        case 'home_manage':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER' ){
                require 'view/frontend/home_manage.php';
            }
            else {
                authErr();
            }
            break;

        case 'link_module':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER' ){
                require 'view/frontend/link_module.php';
            }
            else {
                authErr();
            }
            break;

        case 'programs':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER' ){
                require 'view/frontend/programs.php';
            }
            else {
                authErr();
            }
            break;

        case 'user_manage':
            if ($_SESSION['status'] == 'SUPER_USER' ){
                $req=getUsers($_SESSION['id']);
                $user=$req->fetchAll();
                require 'view/frontend/user_management.php';
            }else{
                authErr();
            }
            break;

        case 'add_user_front':
            if ($_SESSION['status'] == 'SUPER_USER' ){
                require 'view/frontend/add_user';
            }else{
                authErr();
            }
            break;

        case 'add_user':
            if ($_SESSION['status'] == 'SUPER_USER' ){
                addUser($_POST['_mail'], $_POST['_firstname'], $_POST['_lastname'],
                    $_POST['_date_of_birth'], $_POST['_phone'], $_SESSION['id']);
                require 'view/frontend/user_management.php';
            }else{
                authErr();
            }
            break;


    //Liens footer
        case 'contact':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER' ){
                require'view/frontend/contact.php';
            }
            else {
                authErr();
            }
            break;
            
        case 'cgu':
            if ($_SESSION['status']=='USER' || $_SESSION['status']=='SUPER_USER'){
                require 'view/frontend/cgu.php';
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
        case 'search':
            if ($_SESSION['status'] == 'ADMIN'){
                $req=searchUser($_POST['_searchbar_field'],$_POST['_searchbar_mode']);
                require 'view/backend/home_view.php';
            }else{
                authErr();
            }
            break;

        case 'user_management':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_GET['id'])){
                    $_SESSION['target_id']=htmlspecialchars($_GET['id']);
                    $req=getSuperUserAndChild(htmlspecialchars($_GET['id']));
                    $user=$req->fetchAll();
                }
                require 'view/backend/user_management.php';
            }else{
                authErr();
            }
            break;

        case 'home_management':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_GET['id'])){
                    $_SESSION['target_userId']=htmlspecialchars($_GET['id']);
                    /*$req=getHome(htmlspecialchars($_GET['id']));
                    $user=$req->fetchAll();*/
                }
                require 'view/backend/home_management.php';
            }else{
                authErr();
            }
            break;

        case 'delete':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_GET['id'])){
                    $req=getStatus(htmlspecialchars($_GET['id']));
                    if ($req['status']== 'USER'){
                        deleteUser(htmlspecialchars($_GET['id']));
                        echo 'utilisateur supprimé';
                        header("Location:index.php?action=homeb");
                    }elseif ($req['status']=='SUPER_USER'){
                        deleteHome(htmlspecialchars($_GET['id']));
                        echo 'utilisateur supprimé';
                        header("Location:index.php?action=homeb");
                    }else{
                        header("Location:index.php?action=homeb");
                    }
                }else{
                    header("Location:index.php?action=homeb");
                }
            }elseif ($_SESSION['status']== 'SUPER_USER') {
                if (isset($_GET['id'])) {
                    deleteUser(htmlspecialchars($_GET['id']));
                    echo 'utilisateur supprimé';
                    header("Location:index.php?action=home");
                }
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
