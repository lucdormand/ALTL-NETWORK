<?php
require_once('PDO.php');
require_once('fonctions.php');


if (!empty($_GET['request'])) {
    if ($_GET['request'] == 'trames') {
        $sql = "SELECT * FROM trames ";
        $query = $pdo->prepare($sql);
        $query->execute();
        $trames = json_encode($query->fetchAll());
        echo $trames;
    }

    if ($_GET['request'] == 'timeout') {
        $sql2 = "SELECT status, COUNT(*)
                 FROM trames WHERE status = 'timeout'";
        $query2 = $pdo->prepare($sql2);
        $query2->execute();
        $status_timeout = json_encode($query2->fetchAll());
        echo $status_timeout;
    }

    if ($_GET['request'] == 'count_total') {
        $sql_count = "SELECT COUNT(*)
                 FROM trames";
        $query_count = $pdo->prepare($sql_count);
        $query_count->execute();
        $count_total = json_encode($query_count->fetchAll());
        echo $count_total;
    }

    if ($_GET['request'] == 'protocol_checksum') {
        $sql4 = "SELECT protocol_checksum_status, COUNT(*)
                 FROM trames WHERE protocol_checksum_status = 'disabled'";
        $query4 = $pdo->prepare($sql4);
        $query4->execute();
        $protocol_checksum_status = json_encode($query4->fetchAll());
        echo $protocol_checksum_status;
    }

    if ($_GET['request'] == 'dates') {
        $sql5 = "SELECT * FROM trames ORDER BY trames.date ASC";
        $query5 = $pdo->prepare($sql5);
        $query5->execute();
        $dates = json_encode($query5->fetchAll());
        echo $dates;
    }

    if ($_GET['request'] == 'ip') {
        $sql_ip = "SELECT ip_from,ip_dest FROM trames ORDER BY ip_from ASC";
        $query_ip = $pdo->prepare($sql_ip);
        $query_ip->execute();
        $ips = json_encode($query_ip->fetchAll());
        echo $ips;
    }

    if ($_GET['request'] == 'protocol') {
        $sql_protocol = "SELECT protocol_name,COUNT(*) 
            FROM trames 
            GROUP BY protocol_name";
        $query_protocol = $pdo->prepare($sql_protocol);
        $query_protocol->execute();
        $trames_protocol = json_encode($query_protocol->fetchAll());
        echo $trames_protocol;
    }
}









