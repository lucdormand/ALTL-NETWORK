<?php
require('PDO.php');
require('fonctions.php');
require('request.php');
// $query_protocol->fetchAll()
if (!empty($_GET['request'])) {
    if ($_GET['request'] == 'trames') {
        echo json_encode(selectAll());
    }

    if ($_GET['request'] == 'timeout') {
        echo json_encode(selectStatusCountTimeout());
    }

    if ($_GET['request'] == 'count_total') {
       echo json_encode(selectCountAllTrames());
    }

    if ($_GET['request'] == 'protocol_checksum') {
        echo json_encode(selectProtocolChecksumCountisDisabled());
    }

    if ($_GET['request'] == 'dates') {
        echo json_encode(selectAllDatesOrderByASC());
    }

    if ($_GET['request'] == 'ip') {
        echo json_encode(selectIpsAllTramesOrderByIpFromASC());
    }

    if ($_GET['request'] == 'protocol') {
        echo json_encode(selectProtocolNameCountAllTramesOrderByProtName());
    }
}









