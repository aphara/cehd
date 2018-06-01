<?php
require_once 'controller/frontend.php';
require_once 'controller/backend.php';
require_once 'controller/mail.php';
require_once 'controller/user.php';
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

//mdp oublié
        case 'pageforgetpassw':
            require('view/frontend/forgetpassw.php');
            break;

        case 'forgetpassw':
            $test = checkMail($_POST['mail_forgetpassw']);
            if ($test == true ) {
                echo 'Un lien de mot de passe a été envoyé par nos équipes ! ';
                $_SESSION['chaine'] =genererChaineAleatoire(20,'abcdefghijklmnopqrstuvwxyz123456789*/#&');
                passwordHash($_SESSION['chaine'],$_POST['mail_forgetpassw']);
                //die(var_dump($_GLOBAL['chaine']));
                sendmail_forgetpassw($_POST['mail_forgetpassw'],$_SESSION['chaine']);
                unset($_SESSION['chaine']);
                require 'view/frontend/login_view.php';
            }
            else{
                echo "Une erreur est survenue";
                require 'view/frontend/login_view.php';
            }
            break;

//frontend
        /*Accueil*/
        case 'home':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/home_view.php';

            } else {
                authErr();
            }
            break;

        /*Gestion de la maison, accueil*/
        case 'home_manage':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/home_manage.php';
            } else {
                authErr();
            }
            break;

        /*Gestion des Modules*/
        case 'module_light':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/module_light.php';
            }
            else {
                authErr();
            }
            break;

        case 'module_shutter':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/module_shutter.php';
            }
            else {
                authErr();
            }
            break;

        case 'module_temp':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/module_temp.php';
            }
            else {
                authErr();
            }
            break;

        /*Associer un module*/
        case 'link_module':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/link_module.php';
            } else {
                authErr();
            }
            break;

        /*Programmes*/
        case 'programs':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/programs.php';
            } else {
                authErr();
            }
            break;

        /*Gestion utilisateur, accueil*/
        case 'user_manage':
            if ($_SESSION['status'] == 'SUPER_USER') {
                $req = getUsers($_SESSION['id']);
                $user = $req->fetchAll();
                require 'view/frontend/user_management.php';
            } else {
                authErr();
            }
            break;

        /*ajout d'un utilisateur
        -formulaire*/
        case 'add_user_front':
            if ($_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/add_user';
            } else {
                authErr();
            }
            break;
        /*-ajout de l'utilisateur dans la bdd*/
        case 'add_user':
            if ($_SESSION['status'] == 'SUPER_USER') {
                addUser($_POST['_mail'], $_POST['_firstname'], $_POST['_lastname'],
                    $_POST['_date_of_birth'], $_POST['_phone'], $_SESSION['id']);
                echo 'Utilisateur ajouté';
                require 'view/frontend/add_user';
            } else {
                authErr();
            }
            break;

        /*Page de statistiques*/
        case 'global_stats':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/global_stats.php';
            }
            else {
                authErr();
            }
            break;

        /*Paramètres utilisateur*/
        case 'setting':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER' ){
                require'view/frontend/setting.php';
            }
            else {
                authErr();}
            break;

        //update pour setting
        case 'update_firstname' :
            Update_Info('first_name',$_POST['_first_name'],$_SESSION['id']);
            $_SESSION['name']=$_POST['_first_name'];
            echo 'le prenom a ete change avec succes';
            require ' view/frontend/setting';
            break;

        case 'update_lastname' :
            Update_Info('last_name',$_POST['_last_name'],$_SESSION['id']);
            echo 'le nom a ete change avec succes';
            require ' view/frontend/setting';
            break;

        case 'update_birthdate' :
            Update_Info('date_of_birth',$_POST['_birthdate'],$_SESSION['id']);
            echo 'la date de naissance a ete changee avec succes';
            require ' view/frontend/setting';
            break;

        case 'update_phone_number' :
            Update_Info('phone_number',$_POST['_phone_number'],$_SESSION['id']);
            echo 'le numero de telephone a ete change avec succes';
            require ' view/frontend/setting';
            break;

        case 'update_password' :
            update_password($_SESSION['id'],$_SESSION['_mail'], $_POST['_old_password'],$_POST['_password'],$_POST['_verifpassword']);
            echo 'password change avec succes';
            require 'view/front/setting';
            break;

        case 'update_e-mail' :
            Update_Info('mail',$_POST['_mail'],$_SESSION['id']);
            $_SESSION['mail']=$_POST['_mail'];
            echo 'mail change avec succes';
            require 'view/front/setting';
            break;

//Liens footer
        case 'contact':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/contact.php';
            } else {
                authErr();
            }
            break;

        /*Fonction d'envoi de mail au SAV*/
        case 'sendmail' :
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                if (isset ($_POST['message_contact']) AND !empty($_POST['message_contact']) AND isset($_POST['object_contact']) AND !empty ($_POST['message_contact'])) {
                    sendmail($_POST['message_contact'],$_POST['object_contact']);
                    echo 'Message envoyé !';
                    require 'view/frontend/contact.php';
                }
            }else{
                authErr();
            }
            break;

        /*conditions générales d'utilisations*/
        case 'cgu':
            if ($_SESSION['status'] == 'USER' || $_SESSION['status'] == 'SUPER_USER') {
                require 'view/frontend/cgu.php';
            } else {
                authErr();
            }
            break;

        /*page d'aide*/
        case 'aide':
            if ($_SESSION['status']=='USER' || $_SESSION['status']=='SUPER_USER'){


                require 'view/frontend/pageAide.php';

            }else{
                authErr();
            }
            break;

//backend
        /*accueil du backend*/
        case 'homeb':
            if ($_SESSION['status'] == 'ADMIN') {
                unset($_SESSION['target_id']);
                unset($_SESSION['target_home']);
                unset($_SESSION['target_room']);
                unset($_SESSION['target_user']);
                $req = getUserHome();
                require 'view/backend/home_view.php';
            } else {
                authErr();
            }
            break;

        /*Ajout d'un client (utilisateur et maison)
        -formulaire*/
        case 'add_client_form':
            if ($_SESSION['status'] == 'ADMIN') {
                require 'view/backend/add_client.php';
            }else{
                authErr();
            }

            break;

        /*-ajout du client dans la bdd*/
        case 'add_client':
            if ($_SESSION['status'] == 'ADMIN') {
                addClient($_POST['_mail'], $_POST['_firstname'], $_POST['_lastname'],
                    $_POST['_date_of_birth'], $_POST['_phone'], $_POST['_home_type'],
                    $_POST['_address'], $_POST['_city'], $_POST['_postcode']);
                sendmail_bienvenue($_POST['_mail']);
                require 'view/backend/add_client.php';
            } else {
                authErr();
            }
            break;

        /*fonction de recherche*/
        case 'search':
            if ($_SESSION['status'] == 'ADMIN') {
                $req = searchUser($_POST['_searchbar_field'], $_POST['_searchbar_mode']);
                require 'view/backend/home_view.php';
            } else {
                authErr();
            }
            break;

        /*Gestion utilisateur*/
        case 'user_management':
            if ($_SESSION['status'] == 'ADMIN') {
                if (isset($_GET['id'])) {
                    $_SESSION['target_id'] = $_GET['id'];
                    $req = getSuperUserAndChild(htmlspecialchars($_SESSION['target_id']));
                    $user = $req->fetchAll();
                } elseif (isset($_SESSION['target_id'])) {
                    $req = getSuperUserAndChild(htmlspecialchars($_SESSION['target_id']));
                    $user = $req->fetchAll();
                }
                require 'view/backend/user_management.php';
            } else {
                authErr();
            }
            break;

        /*ajout d'un utilisateur
        -formulaire*/
        case 'add_user_form':
            if ($_SESSION['status'] == 'ADMIN'){
                require 'view/backend/add_user.php';
            }else{
                authErr();
            }
            break;

        /*ajout de l'utilisateur dans la bdd*/
        case 'add_user_back':
            if ($_SESSION['status'] == 'ADMIN') {
                if (isset($_SESSION['target_id'])) {
                    addUser($_POST['_mail'], $_POST['_firstname'], $_POST['_lastname'],
                        $_POST['_date_of_birth'], $_POST['_phone'], $_SESSION['target_id']);
                    $link=$_SESSION['target_id'];
                    header("Location:index.php?action=user_management&id=$link");
                }
            }else {
                authErr();
            }
            break;

        /*Modification d'un utilisateur
        -formulaire*/
        case 'modify_user_form':
            if ($_SESSION['status'] == 'ADMIN') {
                if (isset($_GET['id'])) {
                    $_SESSION['target_user'] = $_GET['id'];
                    $user = getUserDetail($_SESSION['target_user']);
                    require 'view/backend/modify_user.php';
                }
            }elseif ($_SESSION['status'] == 'SUPER_USER'){
                if (isset($_GET['id'])) {
                    $_SESSION['target_user'] = $_GET['id'];
                    $user = getUserDetail($_SESSION['target_user']);
                    require 'view/frontend/modify_user.php';
                }
            }else{
                authErr();
            }
            break;

        /*Modification de l'utilisateur dans la bdd via frontoffice*/
        case 'modify_user_front':
            if ($_SESSION['status'] == 'SUPER_USER') {
                if (isset($_SESSION['target_user'])) {
                    modifyUser($_POST['_mail'], $_POST['_firstname'], $_POST['_lastname'],
                        $_POST['_date_of_birth'], $_POST['_phone'], $_SESSION['target_user']);
                    //modification des permissions à ajouter
                    header("Location:index.php?action=user_manage");
                }
            }else {
                authErr();
            }
            break;

        /*Modification de l'utilisateur dans la bdd via backoffice*/
        case 'modify_user_back':
            if ($_SESSION['status'] == 'ADMIN') {
                if (isset($_SESSION['target_user'])) {
                    modifyUser($_POST['_mail'], $_POST['_firstname'], $_POST['_lastname'],
                        $_POST['_date_of_birth'], $_POST['_phone'], $_SESSION['target_user']);
                    $link=$_SESSION['target_id'];
                    header("Location:index.php?action=user_management&id=$link");
                }
            }else {
                authErr();
            }
            break;

        /*Gestion de la maison*/
        case 'home_management':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_GET['id'])){
                    $_SESSION['target_id']=$_GET['id'];
                    $req=getRoom(htmlspecialchars($_SESSION['target_id']));
                    require 'view/backend/home_management.php';
                }elseif(isset($_SESSION['target_id'])){
                    $req=getRoom(htmlspecialchars($_SESSION['target_id']));
                    require 'view/backend/home_management.php';
                }
            }else{
                authErr();
            }
            break;

        /*Ajout de pièce
        -formulaire*/
        case 'add_room_form':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_SESSION['target_home'])){
                    require 'view/backend/add_room.php';
                }
            }else{
                authErr();
            }
            break;

        /*ajout de la pièce dans la bdd*/
        case 'add_room':
            if ($_SESSION['status'] == 'ADMIN') {
                if (isset($_SESSION['target_home'])) {
                    addRoom($_POST['_name'], $_POST['_floor'], $_POST['_size'], $_POST['_room_type'], $_SESSION['target_home']);
                    $link=$_SESSION['target_id'];
                    header("Location:index.php?action=home_management&id=$link");
                }
            }
            break;

        /*Modification de pièce
        -formulaire*/
        case 'modify_room_form':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_GET['id'])){
                    $_SESSION['target_room']=$_GET['id'];
                    $room=getRoomDetail($_SESSION['target_room']);
                    require 'view/backend/modify_room.php';
                }
            }else{
                authErr();
            }
            break;

        /*-bdd*/
        case 'modify_room':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_SESSION['target_room'])){
                    modifyRoom($_SESSION['target_room'],$_POST['_name'],$_POST['_floor'],$_POST['_size'],$_POST['_room_type']);
                    $link=$_SESSION['target_id'];
                    header("Location:index.php?action=home_management&id=$link");
                }
            }else{
                authErr();
            }
            break;

        /*suppression de pièce*/
        case 'delete_room':
            if ($_SESSION['status'] == 'ADMIN'){
                if ($_GET['id_room']){
                    deleteRoom(htmlspecialchars($_GET['id_room']));
                    header("Location:index.php?action=home_management");
                }
            }
            break;

        /*Gestion des modules (capteurs et actionneurs*/
        case 'module_management':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_GET['id'])){
                    $_SESSION['target_id']=$_GET['id'];
                    $req=getSensor(htmlspecialchars($_SESSION['target_id']));
                    $req2=getEffector(htmlspecialchars($_SESSION['target_id']));
                    require 'view/backend/module_management.php';
                }elseif(isset($_SESSION['target_id'])){
                    $req=getSensor(htmlspecialchars($_SESSION['target_id']));
                    require 'view/backend/module_management.php';
                }
            }else{
                authErr();
            }
            break;

        /*Ajout de capteur
        -formulaire*/
        case 'add_sensor_form':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_SESSION['target_home'])){
                    $req=getRoom(htmlspecialchars($_SESSION['target_id']));
                    require 'view/backend/add_sensor.php';
                }
            }else{
                authErr();
            }
            break;

        /*-bdd*/
        case 'add_sensor':
            if ($_SESSION['status'] == 'ADMIN') {
                if (isset($_SESSION['target_home'])) {
                    if (checkIDSensor(htmlspecialchars($_POST['_id']))==true){
                        if (checkSensorName(htmlspecialchars($_POST['_name']))==true){
                            addSensor($_POST['_id'], $_POST['_sensor_type'], $_POST['_name'], $_POST['_room']);
                            $link=$_SESSION['target_id'];
                            header("Location:index.php?action=module_management&id=$link");
                        }
                        else echo 'Ce nom est déjà utilisé !';
                    }else echo 'Cette référence est déjà utilisée !';
                }
            }
            break;

        /*Modification de capteur
        -formulaire*/
        case 'modify_sensor_form':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_GET['id'])){
                    $_SESSION['target_sensor']=$_GET['id'];
                    $sensor=getSensorDetail($_SESSION['target_sensor']);
                    $req1=getRoom(htmlspecialchars($_SESSION['target_id']));
                    require 'view/backend/modify_sensor.php';
                }
            }else{
                authErr();
            }
            break;

        /*modification de capteur dans la bdd
        test pour vérifier que chaque nom donné aux capteurs est unique*/
        case 'modify_sensor':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_SESSION['target_sensor'])){
                    if (isset($_SESSION['target_home'])) {
                        if (($_POST['_name']==$_SESSION['sensor_name'])){
                            modifySensor($_SESSION['target_sensor'], htmlspecialchars($_POST['_sensor_type']),
                                htmlspecialchars($_POST['_name']), htmlspecialchars($_POST['_room']));
                            $link = $_SESSION['target_id'];
                            header("Location:index.php?action=module_management&id=$link");
                        }elseif ($_SESSION['sensor_name'] != $_POST['_name'] && checkSensorName($_POST['_name'])) {
                            modifySensor($_SESSION['target_sensor'], htmlspecialchars($_POST['_sensor_type']),
                                htmlspecialchars($_POST['_name']), htmlspecialchars($_POST['_room']));
                            $link = $_SESSION['target_id'];
                            header("Location:index.php?action=module_management&id=$link");
                        }else echo 'Ce nom est déjà utilisé !';
                    }
                unset($_SESSION['sensor_name']);
                }
            }else{
                authErr();
            }
            break;

        /*suppression de capteurs*/
        case 'delete_sensor':
            if ($_SESSION['status'] == 'ADMIN'){
                if ($_GET['id_sensor']){
                    deleteSensor(htmlspecialchars($_GET['id_sensor']));
                    $link = $_SESSION['target_id'];
                    header("Location:index.php?action=module_management&id=$link");
                }
            }
            break;

        /*Ajout d'actionneur*/
        case 'add_effector_form':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_SESSION['target_home'])){
                    $req=getRoom(htmlspecialchars($_SESSION['target_id']));
                    require 'view/backend/add_effector.php';
                }
            }else{
                authErr();
            }
            break;

        case 'add_effector':
            if ($_SESSION['status'] == 'ADMIN') {
                if (isset($_SESSION['target_home'])) {
                    if (checkIDEffector(htmlspecialchars($_POST['_id']))==true){
                        if (checkEffectorName(htmlspecialchars($_POST['_name']))==true){
                            addEffector($_POST['_id'], $_POST['_effector_type'], $_POST['_name'], $_POST['_room']);
                            $link=$_SESSION['target_id'];
                            header("Location:index.php?action=module_management&id=$link");
                        }
                        else echo 'Ce nom est déjà utilisé !';
                    }else echo 'Cette référence est déjà utilisée !';
                }
            }
            break;

        /*Modification d'actionneur
        -formulaire*/
        case 'modify_effector_form':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_GET['id'])){
                    $_SESSION['target_effector']=$_GET['id'];
                    $effector=getEffectorDetail($_SESSION['target_effector']);
                    $req1=getRoom(htmlspecialchars($_SESSION['target_id']));
                    require 'view/backend/modify_effector.php';
                }
            }else{
                authErr();
            }
            break;

        /*Modification d'actionneur dans la bdd
        avec test d'unicité du nom*/
        case 'modify_effector':
            if ($_SESSION['status'] == 'ADMIN'){
                if (isset($_SESSION['target_effector'])){
                    if (isset($_SESSION['target_home'])) {
                        if (($_POST['_name']==$_SESSION['effector_name'])){
                            modifyEffector($_SESSION['target_effector'], htmlspecialchars($_POST['_effector_type']),
                                htmlspecialchars($_POST['_name']), htmlspecialchars($_POST['_room']));
                            $link = $_SESSION['target_id'];
                            header("Location:index.php?action=module_management&id=$link");
                        }elseif ($_SESSION['effector_name'] != $_POST['_name'] && checkEffectorName($_POST['_name'])) {
                            modifyEffector($_SESSION['target_effector'], htmlspecialchars($_POST['_effector_type']),
                                htmlspecialchars($_POST['_name']), htmlspecialchars($_POST['_room']));
                            $link = $_SESSION['target_id'];
                            header("Location:index.php?action=module_management&id=$link");
                        }else echo 'Ce nom est déjà utilisé !';
                    }
                    unset($_SESSION['effector_name']);
                }
            }else{
                authErr();
            }
            break;

        /*suppression d'actionneur*/
        case 'delete_effector':
            if ($_SESSION['status'] == 'ADMIN'){
                if ($_GET['id_effector']){
                    deleteEffector(htmlspecialchars($_GET['id_effector']));
                    $link = $_SESSION['target_id'];
                    header("Location:index.php?action=module_management&id=$link");
                }
            }
            break;

        /*Suppression de client (utilisateurs (users + super user)+ maison (pièces + capteurs))*/
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
            /*suppression d'utilisateur via le frontoffice*/
            }elseif ($_SESSION['status']== 'SUPER_USER') {
                if (isset($_GET['id'])) {
                    deleteUser(htmlspecialchars($_GET['id']));
                    echo 'utilisateur supprimé';
                    header("Location:index.php?action=user_manage");
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
    echo 'Erreur : ' . $e->getMessage();
}
