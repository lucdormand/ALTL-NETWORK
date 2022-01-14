<?php
require_once('PDO.php');
$tab = [
    'code' => 200,
    'message' => 'insertion BDD ok'
];
echo json_encode($_POST);
$i = 0;
foreach ($_POST['data'] as $key => $value) {
    $timestamp = $_POST['data'][$i]['date'];
    $date = date('Y-m-d H:i:s', $timestamp);

    $version = $_POST['data'][$i]['version'];
    $headerlength = $_POST['data'][$i]['headerLength'];
    $service = $_POST['data'][$i]['service'];
    $identification = $_POST['data'][$i]['identification'];
    $status = $_POST['data'][$i]['status'];
    $flags_code = $_POST['data'][$i]['flags']['code'];
    $ttl = $_POST['data'][$i]['ttl'];
    $protocol_name = $_POST['data'][$i]['protocol']['name'];
    $protocol_flags_code = $_POST['data'][$i]['protocol']['flags']['code'];
    $protocol_checksum_status = $_POST['data'][$i]['protocol']['checksum']['status'];
    $protocol_checksum_code = $_POST['data'][$i]['protocol']['checksum']['code'];
    $protocol_ports_from = $_POST['data'][$i]['protocol']['ports']['from'];
    $protocol_ports_dest = $_POST['data'][$i]['protocol']['ports']['dest'];
    $protocol_type = $_POST['data'][$i]['protocol']['type'];
    $protocol_code = $_POST['data'][$i]['protocol']['code'];
    $headerchecksum = $_POST['data'][$i]['headerChecksum'];
    $ip_from = long2ip(hexdec($_POST['data'][$i]['ip']['from']));
    $ip_dest = long2ip(hexdec($_POST['data'][$i]['ip']['dest']));

    $sql = "SELECT COUNT(*) FROM `trames` WHERE identification = :identification AND date = :date";
    $query = $pdo ->prepare($sql);
    $query -> bindValue(':identification',$identification);
    $query -> bindValue(':date',$date);
//    $query -> bindValue(':protocol_type',$protocol_type);
    $query ->execute();
    $check = $query->fetchColumn();
    echo 'check:';
    echo $check;

    if ($check == 0) {
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
    $i++;

}




