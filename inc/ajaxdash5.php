<?php
require_once('PDO.php');
require_once('fonctions.php');


        $sql5 = "SELECT * FROM trames ORDER BY trames.date ASC";
        $query5 = $pdo->prepare($sql5);
        $query5->execute();

        $dates = json_encode($query5->fetchAll());
        echo $dates;








