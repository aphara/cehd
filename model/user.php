<?php


function get_users($id)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM `user` WHERE id_superuser=:id ORDER BY status');
    $req->bindValue('id', $id, PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function add_user($mail,$first_name,$last_name,$date_of_birth,$phone,$id_superuser)
{
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO user(status,mail,first_name,last_name,date_of_birth,phone,id_superuser)
 VALUES(\'USER\',:mail,:first_name,:last_name,:date_of_birth,:phone,:id_superuser)');
    $req->bindValue('mail', $mail, PDO::PARAM_STR);
    $req->bindValue('first_name', $first_name, PDO::PARAM_STR);
    $req->bindValue('last_name', $last_name, PDO::PARAM_STR);
    $req->bindValue('date_of_birth', $date_of_birth, PDO::PARAM_STR);
    $req->bindValue('phone', $phone, PDO::PARAM_STR);
    $req->bindValue('id_superuser', $id_superuser, PDO::PARAM_STR);
    $req->execute();
}

function add_superuser($mail,$first_name,$last_name,$date_of_birth,$phone){
    $db=dbConnect();
    $req=$db->prepare('INSERT INTO user(status,mail,first_name,last_name,date_of_birth,phone)
 VALUES(\'SUPER_USER\',:mail,:first_name,:last_name,:date_of_birth,:phone)');
    $req->bindValue('mail',$mail, PDO::PARAM_STR);
    $req->bindValue('first_name',$first_name, PDO::PARAM_STR);
    $req->bindValue('last_name',$last_name, PDO::PARAM_STR);
    $req->bindValue('date_of_birth',$date_of_birth, PDO::PARAM_STR);
    $req->bindValue('phone',$phone, PDO::PARAM_STR);
    $req->execute();

    $req=$db->prepare('SELECT id_user FROM `user` WHERE mail=? 
ORDER BY id_user DESC');
    $req->bindValue(1,$mail,PDO::PARAM_STR);
    $req->execute();
    $post=$req->fetch();
    return $post;
}

function get_superuser_and_child($id){
    $db=dbConnect();
    $req=$db->prepare('SELECT * FROM `user` WHERE id_user=:id OR id_superuser=:id ORDER BY status');
    $req->bindValue('id',$id,PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function get_id_superuser($id){
    $db=dbConnect();
    $req=$db->prepare('SELECT id_superuser FROM `user` WHERE id_user=?');
    $req->bindValue(1,$id,PDO::PARAM_INT);
    $req->execute();
    $req=$req->fetchAll();
    return $req;
}

function get_user_detail($id_user){
    $db=dbConnect();
    $req=$db->prepare('SELECT * FROM `user` WHERE id_user=?');
    $req->bindValue(1,$id_user,PDO::PARAM_INT);
    $req->execute();
    return $req;
}

function modify_user($mail, $firstname, $lastname, $date_of_birth, $phone, $id_user){
    $db=dbConnect();
    $req=$db->prepare('UPDATE user 
    SET mail=:mail, first_name=:firstname, last_name=:lastname, date_of_birth=:date_of_birth, phone=:phone
    WHERE id_user=:id_user');
    $req->bindValue('mail',$mail,PDO::PARAM_STR);
    $req->bindValue('firstname',$firstname,PDO::PARAM_STR);
    $req->bindValue('lastname',$lastname,PDO::PARAM_STR);
    $req->bindValue('date_of_birth',$date_of_birth,PDO::PARAM_STR);
    $req->bindValue('phone',$phone,PDO::PARAM_STR);
    $req->bindValue('id_user',$id_user,PDO::PARAM_STR);
    $req->execute();
}

function get_status($id){
    $db=dbConnect();
    $req=$db->prepare('SELECT status FROM `user` WHERE id_user=?');
    $req->bindValue(1,$id,PDO::PARAM_INT);
    $req->execute();
    $post=$req->fetch();
    return $post;
}

function delete_user($id){
    $db=dbConnect();
    $req=$db->prepare('DELETE FROM user WHERE id_user=?');
    $req->bindValue(1,$id,PDO::PARAM_INT);
    $req->execute();
}

function delete_user_and_child($id_user){
    $db=dbConnect();
    $req=$db->prepare('DELETE FROM `user` WHERE id_user=:id OR id_superuser=:id');
    $req->bindValue('id',$id_user,PDO::PARAM_INT);
    $req->execute();
}