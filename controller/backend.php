<?php
require_once __DIR__.'/../config.php';
require_once ROOT.'/model/backend.php';

function addClient($mail, $first_name, $last_name, $date_of_birth, $phone,
                   $home_type, $address, $city, $postcode){
    //ajouter controle variables
    $id_userArray=add_superuser($mail,$first_name,$last_name,$date_of_birth,$phone);

    //ajouter controle variables
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
//    require ROOT.'/view/backend/home_view.php';
}

function searchUser($search,$mode){
    if ($mode=='id'){
        //$type='id_home';
        $req=search_by_id($search/*,$type*/);
        return $req;
    }elseif ($mode=='mail'){
        $req=search_by_mail($search);
        return $req;
    }elseif ($mode=='phone'){
        $req=search_by_phone($search);
        return $req;
    }elseif ($mode=='name'){

        $req=search_by_name($search);
        return $req;
    }else return $req='error';
}

function getSuperUserAndChild($id){
    $req=get_superuser_and_child($id);
    return $req;
}

function getStatus($id){
    $req=get_status($id);
    return $req;
}

function deleteUser($id){
    delete_user($id);

}

function deleteHome($id_user){
    $id_home=get_id_home($id_user);
    delete_link($id_home['id_home']);
    delete_home($id_home['id_home']);
    delete_user_and_child($id_user);
}


function getRoom($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req=get_room($_SESSION['target_home']);
    $post=$req/*->fetchAll()*/;
    return $post;
}

function getRoomDetail($id_room){
    $req=get_room_detail($id_room);
    $post=$req;
    return $post;
}

function addRoom($name, $floor, $size, $type, $id_home){
    add_room($name, $floor, $size, $type, $id_home);
}

function modifyRoom($id_room, $name, $floor, $size, $type){
    modify_room($id_room, $name, $floor, $size, $type);
}

function deleteRoom($id_room){
    delete_room($id_room);
}