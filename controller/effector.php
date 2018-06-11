<?php
require_once __DIR__.'/../config.php';
require_once ROOT.'/model/effector.php';

function getEffector($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req=get_effector($_SESSION['target_home']);
    return $req;
}

function checkIDEffector($id_effector){
    if(check_id_effector($id_effector)==0){
        return true;
    }else return false;
}

function checkEffectorName($effector_name){
    if (check_effector_name($_SESSION['target_home'],$effector_name)==0) {
        return true;
    }
    else {
        return false;
    }
}

function addEffector($id_effector, $effector_type, $effector_name, $id_room){
    add_effector($id_effector, $effector_type, $effector_name, $id_room);
}

function getEffectorDetail($id_effector){
    $req=get_effector_detail($id_effector);
    $post=$req;
    return $post;
}

function modifyEffector($id_effector, $effector_type, $effector_name, $id_room){
    modify_effector($id_effector, $effector_type, $effector_name, $id_room);
}

function deleteEffector($id_effector){
    delete_effector($id_effector);
}

function getEffectorLight($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req2=get_effector_light($_SESSION['target_home']);
    return $req2;
}

function getEffectorTemp($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req2=get_effector_temp($_SESSION['target_home']);
    return $req2;
}

function editEffector($id_effector, $effector_type, $effector_name, $id_room){
    edit_effector($id_effector, $effector_type, $effector_name, $id_room);
}