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