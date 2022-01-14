<?php

function getUserResetPassword($email,$token){
    global $pdo;
    $sql="SELECT * FROM reseau_user WHERE email = :email AND token= :token";
    $query = $pdo->prepare($sql);
    $query ->bindValue(':email',$email,PDO::PARAM_INT);
    $query ->bindValue(':token',$token,PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
}

function selectAll(){
    global $pdo;
    $sql = "SELECT * FROM trames";
    $query = $pdo->prepare($sql);
    $query->execute();
   return $query->fetchAll();
}

function selectNotDoublonProtocol(){
    global $pdo;
    $sql = "SELECT DISTINCT protocol_name FROM trames";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

function selectAllById($id){
    global $pdo;
    $sql = "SELECT * FROM trames WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query -> bindValue(':id',$_GET['id']);
    $query->execute();
    return $query->fetch();
}

function selectAllByProtocolName(){
    global $pdo;
    $sql = "SELECT * FROM trames WHERE protocol_name = :protocol_name";
    $query = $pdo->prepare($sql);
    $query -> bindValue(':protocol_name',$_GET['protocol']);
    $query->execute();
    return $query->fetchAll();
}

// TABLE USER
function selectAllUserLogin($login){
    global $pdo;
    $sql = "SELECT * FROM reseau_user WHERE email = :login";
    $query = $pdo->prepare($sql);
    $query->bindValue(':login',$login,PDO::PARAM_STR);
    $query->execute();
    return $query->fetch();
}

function selectAllUserEmail($email){
    global $pdo;
    $sql = "SELECT * FROM reseau_user WHERE email = :email";
    $query = $pdo->prepare($sql);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();
    return $query->fetch();
}

function selectAllUserToken($token){
    global $pdo;
    $sql = "SELECT * FROM reseau_user WHERE token=:token ";
    $query = $pdo->prepare($sql);
    $query->bindValue(':token',$token,PDO::PARAM_STR);
    $query->execute();
    return $query->fetch();
}

function updatePassword($hashpassword, $token){
    global $pdo;
    $sql = "UPDATE reseau_user SET password=:password WHERE token=:token";
    $query = $pdo->prepare($sql);
    $query->bindValue(':password',$hashpassword,PDO::PARAM_STR);
    $query->bindValue(':token',$token,PDO::PARAM_STR);
    $query->execute();
}

function inscription($pseudo,$email,$hashpassword,$token){
    global $pdo;
    $sql = " INSERT INTO `reseau_user`(`email`, `pseudo`, `password`, `token`, `status`, `created_at`)
                VALUES (:email,:pseudo,:password,:token,'user',NOW())";
    $query = $pdo->prepare($sql);
    $query->bindValue(':pseudo',     $pseudo,      PDO::PARAM_STR);
    $query->bindValue(':email',      $email,       PDO::PARAM_STR);
    $query->bindValue(':password',   $hashpassword,PDO::PARAM_STR);
    $query->bindValue(':token',      $token,       PDO::PARAM_STR);
    $query->execute();
}