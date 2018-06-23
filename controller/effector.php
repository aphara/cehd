<?php
require_once __DIR__.'/../config.php';
require_once ROOT.'/model/effector.php';

function getEffectorBack($id_user){
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

function getEffectorShutter($id_user){
    $target_home=get_id_home($id_user);
    $_SESSION['target_home']=$target_home[0];
    $req2=get_effector_shutter($_SESSION['target_home']);
    return $req2;
}

function editEffector($id_effector, $effector_type, $effector_name, $id_room){
    edit_effector($id_effector, $effector_type, $effector_name, $id_room);
}

function getAllEffectorLightState($id_home){
    $type='LIGHT_CTRL';
    $req=get_effector_by_type($id_home,$type);
    $req=$req->fetchAll();
    $length=count($req);
    for($i=0;$i<count($req);$i++){
        if ($req[$i]['request_value']==1111){
            $on=1;
            break;
        }else $length--;
    }
    if (isset($on)){
        return 'ON';
    }
    elseif ($length==0){
        return 'OFF';
    }
}

function getAllEffectorTemp($id_home){
    $type='TEMP_CTRL';
    $req=get_effector_by_type($id_home,$type);
    $req=$req->fetchAll();
    $length=count($req);
    for($i=0;$i<count($req);$i++){
        if (isset($temp_moy) && isset($divider)){
            if ($req[$i]['request_value']!=NULL){
                $temp_moy=$temp_moy+$req[$i]['request_value'];
                $divider++;
            }
        }else{
            $temp_moy=$req[$i]['request_value'];
            $divider=1;
        }
    }
    if (isset($temp_moy) && isset($divider)){
        $val=round(($temp_moy/$divider),1);
        return $val;
    }else{
        return 'NONE';
    }
}

function getAllEffectorByType($id_home,$type){
    $req=get_effector_by_type($id_home,$type);
    return $req;
}

function changeEffectorValue($type,$request_value,$id_home){
    change_effector_value($type,$request_value,$id_home);
}

function getEffectorValue($id_home, $type, $id_room){
    $req=get_effector_value($id_home, $type, $id_room);
    return $req;
}