<?php

function getUserResetPassword($email,$token)
{
    global $pdo;
    $sql = "SELECT * FROM reseau_user WHERE email = :email AND token= :token";
    $query = $pdo->prepare($sql);
    $query->bindValue(':email', $email, PDO::PARAM_INT);
    $query->bindValue(':token', $token, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
}


function insertAllTrames($date,$version,$headerlength,$service,$identification,$status,$flags_code,$ttl,$protocol_name,$protocol_flags_code,$protocol_checksum_status,$protocol_checksum_code,$protocol_ports_from,$protocol_ports_dest,$protocol_type,$protocol_code,$headerchecksum,$ip_from,$ip_dest){
        global $pdo;
        $sql = "INSERT INTO trames (date,version,headerlength,service,identification,status,flags_code,ttl,protocol_name,protocol_flags_code,protocol_checksum_status,protocol_checksum_code,protocol_ports_from,protocol_ports_dest,protocol_type,protocol_code,headerchecksum,ip_from,ip_dest) 
VALUES (:date,:version,:headerlength,:service,:identification,:status,:flags_code,:ttl,:protocol_name,:protocol_flags_code,:protocol_checksum_status,:protocol_checksum_code,:protocol_ports_from,:protocol_ports_dest,:protocol_type,:protocol_code,:headerchecksum,:ip_from,:ip_dest)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':date', $date);
        $query->bindValue(':version', $version);
        $query->bindValue(':headerlength', $headerlength);
        $query->bindValue(':service', $service);
        $query->bindValue(':identification', $identification);
        $query->bindValue(':status', $status);
        $query->bindValue(':flags_code', $flags_code);
        $query->bindValue(':ttl', $ttl);
        $query->bindValue(':protocol_name', $protocol_name);
        $query->bindValue(':protocol_flags_code', $protocol_flags_code);
        $query->bindValue(':protocol_checksum_status', $protocol_checksum_status);
        $query->bindValue(':protocol_checksum_code', $protocol_checksum_code);
        $query->bindValue(':protocol_ports_from', $protocol_ports_from);
        $query->bindValue(':protocol_ports_dest', $protocol_ports_dest);
        $query->bindValue(':protocol_type', $protocol_type);
        $query->bindValue(':protocol_code', $protocol_code);
        $query->bindValue(':headerchecksum', $headerchecksum);
        $query->bindValue(':ip_from', $ip_from);
        $query->bindValue(':ip_dest', $ip_dest);
        $query->execute();
    }

// DANGER
function deleteAllTrames(){
   global $pdo;
    $sql = "DELETE FROM trames";
    $query = $pdo ->prepare($sql);
    $query ->execute();
}

function selectCountAllTramesIdentification($idendification, $date){
    global $pdo;
    $sql = "SELECT COUNT(*) FROM `trames` WHERE `identification` = :identification AND `date` = :date";
    $query = $pdo ->prepare($sql);
    $query -> bindValue(':identification',$identification);
    $query -> bindValue(':date',$date);
//    $query -> bindValue(':protocol_type',$protocol_type);
    $query ->execute();
    return $query->fetchColumn();
}

function selectAll(){
    global $pdo;
    $sql = "SELECT * FROM trames";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

function selectStatusCountTimeout(){
    global $pdo;
    $sql2 = "SELECT status, COUNT(*)
                 FROM trames WHERE status = 'timeout'";
    $query2 = $pdo->prepare($sql2);
    $query2->execute();
    return $query2->fetchAll();
}

function selectCountAllTrames(){
    global $pdo;
    $sql_count = "SELECT COUNT(*)
                 FROM trames";
    $query_count = $pdo->prepare($sql_count);
    $query_count->execute();
    return $query_count->fetchAll();
}

function selectProtocolChecksumCountisDisabled(){
    global $pdo;
    $sql4 = "SELECT protocol_checksum_status, COUNT(*)
                 FROM trames WHERE protocol_checksum_status = 'disabled'";
    $query4 = $pdo->prepare($sql4);
    $query4->execute();
    return $query4->fetchAll();
}

function selectAllDatesOrderByASC(){
    global $pdo;
    $sql5 = "SELECT * FROM trames ORDER BY trames.date ASC";
    $query5 = $pdo->prepare($sql5);
    $query5->execute();
    return $query5->fetchAll();
}

function selectAllDatesOrderByDESC(){
    global $pdo;
    $sql5 = "SELECT * FROM trames ORDER BY trames.date DESC";
    $query5 = $pdo->prepare($sql5);
    $query5->execute();
    return $query5->fetchAll();
}

function selectIpsAllTramesOrderByIpFromASC(){
    global $pdo;
    $sql_ip = "SELECT ip_from,ip_dest FROM trames ORDER BY ip_from ASC";
    $query_ip = $pdo->prepare($sql_ip);
    $query_ip->execute();
    return $query_ip->fetchAll();
}

function selectIpsAllTramesOrderByIpFromDESC(){
    global $pdo;
    $sql_ip = "SELECT ip_from,ip_dest FROM trames ORDER BY ip_from DESC";
    $query_ip = $pdo->prepare($sql_ip);
    $query_ip->execute();
    return $query_ip->fetchAll();
}

function selectIpsAllTramesOrderByIpDestASC(){
    global $pdo;
    $sql_ip = "SELECT ip_from,ip_dest FROM trames ORDER BY ip_dest ASC";
    $query_ip = $pdo->prepare($sql_ip);
    $query_ip->execute();
    return $query_ip->fetchAll();
}

function selectIpsAllTramesOrderByIpDestDESC(){
    global $pdo;
    $sql_ip = "SELECT ip_from,ip_dest FROM trames ORDER BY ip_dest DESC";
    $query_ip = $pdo->prepare($sql_ip);
    $query_ip->execute();
    return $query_ip->fetchAll();
}

function selectProtocolNameCountAllTramesOrderByProtName(){
    global $pdo;
    $sql_protocol = "SELECT protocol_name,COUNT(*) 
            FROM trames 
            GROUP BY protocol_name";
    $query_protocol = $pdo->prepare($sql_protocol);
    $query_protocol->execute();
    return $query_protocol->fetchAll();
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