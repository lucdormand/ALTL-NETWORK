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

    <h1 class="dashboard_title">Journal d'activité</h1>
    <div class="separator"></div>

<ul class="logs_list">
    <?php
    foreach ($trames as $trame) {
        if ($trame['status'] == 'timeout') {
            echo '<li><a href="details.php?id='.$trame['id'].'" class="red">Trames '.$trame['protocol_name'].' venant de '.$trame['ip_from'].' vers '.$trame['ip_dest'].'</a></li>';
        } else {
            echo '<li><a href="details.php?id='.$trame['id'].'">Trames '.$trame['protocol_name'].' venant de '.$trame['ip_from'].' vers '.$trame['ip_dest'].'</a></li>';
        }

    }

    ?>
</ul>


<?php

include('inc/footer.php');
