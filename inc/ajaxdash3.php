<?php
require_once('PDO.php');
require_once('fonctions.php');


        $sql_count = "SELECT COUNT(*)
                 FROM trames";
        $query_count = $pdo->prepare($sql_count);
        $query_count->execute();

        $count_total = json_encode($query_count->fetchAll());
        echo $count_total;








