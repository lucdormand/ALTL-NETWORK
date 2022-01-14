<?php
require_once('PDO.php');
require_once('fonctions.php');


        $sql = "SELECT protocol_name,COUNT(*) 
            FROM trames 
            GROUP BY protocol_name";
        $query = $pdo->prepare($sql);
        $query->execute();

        $trames_total = json_encode($query->fetchAll()) ;
        echo $trames_total;






