<?php
require_once('PDO.php');
require_once('fonctions.php');


        $sql4 = "SELECT protocol_checksum_status, COUNT(*)
                 FROM trames WHERE protocol_checksum_status = 'disabled'";
        $query4 = $pdo->prepare($sql4);
        $query4->execute();

        $protocol_checksum_status = json_encode($query4->fetchAll());
        echo $protocol_checksum_status;








