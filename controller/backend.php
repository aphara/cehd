<?php
require_once __DIR__.'/../config.php';
require_once ROOT.'/model/backend.php';

function addClient($mail, $first_name, $last_name, $date_of_birth, $phone,
                   $home_type, $address, $city, $postcode){
    //ajouter controle variables
    $id_userArray=addUser($mail,$first_name,$last_name,$date_of_birth,$phone);

    //ajouter controle variables
    $id_homeArray=addHome($home_type,$address,$city,$postcode);
    $id_user=$id_userArray['id_user'];
    $id_home=$id_homeArray['id_home'];

    //ajouter conditions si changement status
    linkUserHome($id_user,$id_home);
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