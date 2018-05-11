<?php

function add_superuser($mail,$first_name,$last_name,$date_of_birth,$phone){
    $db=dbConnect1();
    $req=$db->prepare('INSERT INTO user(status,mail,first_name,last_name,date_of_birth,phone)
 VALUES(\'SUPER_USER\',:mail,:first_name,:last_name,:date_of_birth,:phone)');
    $req->bindValue('mail',$mail, PDO::PARAM_STR);
    $req->bindValue('first_name',$first_name, PDO::PARAM_STR);
    $req->bindValue('last_name',$last_name, PDO::PARAM_STR);
    $req->bindValue('date_of_birth',$date_of_birth, PDO::PARAM_STR);
    $req->bindValue('phone',$phone, PDO::PARAM_STR);
    $req->execute();

    $req=$db->prepare('SELECT id_user FROM `user` WHERE mail=?');
    $req->bindValue(1,$mail,PDO::PARAM_STR);
    $req->execute();
    $post=$req->fetch();
    return $post;
}

function add_home($home_type,$address,$city,$postcode){
    $db=dbConnect1();
    $req=$db->prepare('INSERT INTO home(type,address,city,postcode)
VALUES (:home_type,:address,:city,:postcode)');
    $req->bindValue('home_type',$home_type, PDO::PARAM_STR);
    $req->bindValue('address',$address, PDO::PARAM_STR);
    $req->bindValue('city',$city, PDO::PARAM_STR);
    $req->bindValue('postcode',$postcode, PDO::PARAM_STR);
    $req->execute();

    $req=$db->prepare('SELECT id_home FROM `home` WHERE address=?');
    $req->bindValue(1,$address, PDO::PARAM_STR);
    $req->execute();
    $post=$req->fetch();
    return $post;
}

function link_user_home($id_user,$id_home){
    $db=dbConnect1();
    $req=$db->prepare('INSERT INTO user_home VALUES(:id_home,:id_user)');
    $req->bindValue('id_home',$id_home, PDO::PARAM_INT);
    $req->bindValue('id_user',$id_user, PDO::PARAM_INT);
    $req->execute();
}

function get_user_home(){
    $db=dbConnect1();
    $req=$db->prepare('SELECT * FROM `user_home` NATURAL JOIN  home NATURAL JOIN user');
    $req->execute();
    return $req;
    /*ORDER BY id_home;*/
}



/*voir si passage nom de table en paramètre possible ?*/
function search_by_id($search/*,$type*/){
    $db=dbConnect1();
    $req=$db->prepare('SELECT * FROM `user_home` NATURAL JOIN  home NATURAL JOIN user
WHERE id_home=?');
    /*$req->bindValue(1,$type,PDO::PARAM_STR);*/
    $req->bindValue(1,$search,PDO::PARAM_INT);
    $req->execute();
    return $req;
}
function search_by_mail($search){
    $db=dbConnect1();
    $req=$db->prepare('SELECT * FROM `user_home` NATURAL JOIN  home NATURAL JOIN user
WHERE mail=?');
    $req->bindValue(1,$search,PDO::PARAM_STR);
    $req->execute();
    return $req;
}
function search_by_phone($search){
    $db=dbConnect1();
    $req=$db->prepare('SELECT * FROM `user_home` NATURAL JOIN  home NATURAL JOIN user
WHERE phone=?');
    $req->bindValue(1,$search,PDO::PARAM_STR);
    $req->execute();
    return $req;
}
function search_by_name($search){
    $db=dbConnect1();
    $req=$db->prepare('SELECT * FROM `user_home` NATURAL JOIN  home NATURAL JOIN user
WHERE last_name=?');
    $req->bindValue(1,$search,PDO::PARAM_STR);
    $req->execute();
    return $req;
}

function get_superuser_and_child($id){
    $db=dbConnect1();
    $req=$db->prepare('SELECT * FROM `user` WHERE id_user=:id OR id_superuser=:id ORDER BY status');
    $req->bindValue('id',$id,PDO::PARAM_INT);
    $req->execute();
    return $req;
}

/*function get_home
requete avec maison et pièces puis capteurs*/

function get_status($id){
    $db=dbConnect1();
    $req=$db->prepare('SELECT status FROM `user` WHERE id_user=?');
    $req->bindValue(1,$id,PDO::PARAM_INT);
    $req->execute();
    $post=$req->fetch();
    return $post;
}

function delete_user($id){
    $db=dbConnect1();
    $req=$db->prepare('DELETE FROM user WHERE id_user=?');
    $req->bindValue(1,$id,PDO::PARAM_INT);
    $req->execute();
}

function get_id_home($id_user){
    $db=dbConnect1();
    $req=$db->prepare('SELECT id_home FROM user_home WHERE id_user=?');
    $req->bindValue(1,$id_user,PDO::PARAM_INT);
    $req->execute();
    $id_home=$req->fetch();
    return $id_home;
}

function delete_link($id_home){
    $db=dbConnect1();
    $req=$db->prepare('DELETE FROM `user_home` WHERE id_home=?');
    $req->bindValue(1,$id_home,PDO::PARAM_INT);
    $req->execute();
}

function delete_home($id_home){
    $db=dbConnect1();
    $req=$db->prepare('DELETE FROM `home` WHERE id_home=?');
    $req->bindValue(1,$id_home,PDO::PARAM_INT);
    $req->execute();
}

function delete_user_and_child($id_user){
    $db=dbConnect1();
    $req=$db->prepare('DELETE FROM `user` WHERE id_user=:id OR id_superuser=:id');
    $req->bindValue('id',$id_user,PDO::PARAM_INT);
    $req->execute();
}

function dbConnect1()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=cehd;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}