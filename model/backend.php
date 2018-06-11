<?php


function add_home($home_type,$address,$city,$postcode){
    $db=dbConnect();
    $req=$db->prepare('INSERT INTO home(type,address,city,postcode)
VALUES (:home_type,:address,:city,:postcode)');
    $req->bindValue('home_type',$home_type, PDO::PARAM_STR);
    $req->bindValue('address',$address, PDO::PARAM_STR);
    $req->bindValue('city',$city, PDO::PARAM_STR);
    $req->bindValue('postcode',$postcode, PDO::PARAM_STR);
    $req->execute();

    $req=$db->prepare('SELECT id_home FROM `home` WHERE address=? 
ORDER BY id_home DESC');
    $req->bindValue(1,$address, PDO::PARAM_STR);
    $req->execute();
    $post=$req->fetch();
    return $post;

}

function link_user_home($id_user,$id_home){
    $db=dbConnect();
    $req=$db->prepare('INSERT INTO user_home VALUES(:id_home,:id_user)');
    $req->bindValue('id_home',$id_home, PDO::PARAM_INT);
    $req->bindValue('id_user',$id_user, PDO::PARAM_INT);
    $req->execute();
}

function get_user_home(){
    $db=dbConnect();
    $req=$db->prepare('SELECT * FROM `user_home` NATURAL JOIN  home NATURAL JOIN user');
    $req->execute();
    return $req;
    /*ORDER BY id_home;*/
}

function get_id_home($id_user){
    $db=dbConnect();
    $req=$db->prepare('SELECT id_home FROM user_home WHERE id_user=?');
    $req->bindValue(1,$id_user,PDO::PARAM_INT);
    $req->execute();
    $id_home=$req->fetch();
    return $id_home;
}

function delete_link($id_home){
    $db=dbConnect();
    $req=$db->prepare('DELETE FROM `user_home` WHERE id_home=?');
    $req->bindValue(1,$id_home,PDO::PARAM_INT);
    $req->execute();
}

function delete_home($id_home){
    $db=dbConnect();
    $req=$db->prepare('DELETE FROM `home` WHERE id_home=?');
    $req->bindValue(1,$id_home,PDO::PARAM_INT);
    $req->execute();
}