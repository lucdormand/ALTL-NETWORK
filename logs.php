<?php
require('inc/fonctions.php');
require('inc/PDO.php');



$sql = "SELECT * FROM trames";
$query = $pdo->prepare($sql);

$query->execute();
$trames = $query->fetchAll();

//debug($trames);


include('inc/headerdashboard.php');


?>

    <h1 class="dashboard_title">Journal d'activité</h1>
    <div class="separator"></div>
    <div class="bulle info">
        <span><i class="fas fa-info-circle"></i> Information</span>
        <p>Sur cette page, vous pouvez voir l'ensemble des activités avec diverses informations comme les adresses IP, l'horodatage de chaque trame.</p>
    </div>

<ul class="logs_list">
    <?php
    foreach ($trames as $trame) {
        if ($trame['status'] == 'timeout') {
            echo '<li><a title="Accédez au détail de cette trame" href="details.php?id='.$trame['id'].'" class="red">Trame '.$trame['protocol_name'].' venant de '.$trame['ip_from'].' vers '.$trame['ip_dest'].'</a></li>';
        } else {
            echo '<li><a title="Accédez au détail de cette trame" href="details.php?id='.$trame['id'].'">Trame '.$trame['protocol_name'].' venant de '.$trame['ip_from'].' vers '.$trame['ip_dest'].'</a></li>';
        }

    }

    ?>
</ul>


<?php

include('inc/footer.php');
