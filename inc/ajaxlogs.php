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
    $ip_from = $_POST['data'][$i]['ip']['from'];
    $ip_dest = $_POST['data'][$i]['ip']['dest'];


    $sql = "SELECT * FROM trames";
    $query = $pdo->prepare($sql);

    $query->execute();
    $trames = $query->fetchAll();

$i++;

}




