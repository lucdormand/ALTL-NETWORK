<?php
require_once('PDO.php');
require_once('fonctions.php');


        $sql2 = "SELECT status, COUNT(*)
                 FROM trames WHERE status = 'timeout'";
        $query2 = $pdo->prepare($sql2);
        $query2->execute();

        $status_timeout = json_encode($query2->fetchAll());
        echo $status_timeout;








