<?php

require_once ROOT.'/model/user.php';
require_once ROOT.'/model/backend.php';

/*récupère la liste des utilisateurs*/
function getUsers($id){
    $req=get_users($id);
    return $req;
}

/*ajoute un utilisateur*/
function addUser($mail, $first_name, $last_name, $date_of_birth, $phone, $id_superuser)
{
    add_user($mail, $first_name, $last_name, $date_of_birth, $phone, $id_superuser);
}

/*ajoute un client -> utilisateur + maison*/
function addClient($mail, $first_name, $last_name, $date_of_birth, $phone,
                   $home_type, $address, $city, $postcode){

    $id_userArray=add_superuser($mail,$first_name,$last_name,$date_of_birth,$phone);

    $id_homeArray=add_home($home_type,$address,$city,$postcode);
    $id_user=$id_userArray['id_user'];
    $id_home=$id_homeArray['id_home'];

    //ajouter conditions si changement status
    link_user_home($id_user,$id_home);
    echo 'Utilisateur ajouté';
}

function getUserHome(){
    $req=get_user_home();
    return $req;
}


function getSuperUserAndChild($id){
    $req=get_superuser_and_child($id);
    return $req;
}

function getStatus($id){
    $req=get_status($id);
    return $req;
}

function getUserDetail($id_user){
    $req=get_user_detail($id_user);
    $post=$req;
    return $post;
}

function modifyUser($mail, $firstname, $lastname, $date_of_birth, $phone, $id_user){
    modify_user($mail, $firstname, $lastname, $date_of_birth, $phone, $id_user);
}

function deleteUser($id){
    delete_user($id);

}
