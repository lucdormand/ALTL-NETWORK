<?php
require('inc/fonctions.php');
require('inc/PDO.php');



$sql = "SELECT * FROM trames";
$query = $pdo->prepare($sql);

$query->execute();
$trames = $query->fetchAll();

//debug($trames);


include('inc/header.php');



?>

<div class="testsAjaxLogs" style="background-color: blue; width: 100px; height: 100px"></div>


<ul>
    <?php
    foreach ($trames as $trame) {
        echo '<li>Trames '.$trame['protocol_name'].' venant de '.$trame['ip_from'].' vers '.$trame['ip_dest'].'</li>';
    }

    ?>
</ul>


<?php

include('inc/footer.php');
