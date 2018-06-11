<?php
require_once __DIR__.'/../config.php';
require_once ROOT.'/model/backend.php';


function deleteHome($id_user){
    $id_home=get_id_home($id_user);
    delete_link($id_home['id_home']);
    delete_home($id_home['id_home']);
    delete_user_and_child($id_user);
}





