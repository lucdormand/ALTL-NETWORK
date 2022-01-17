<?php
require('inc/PDO.php');
require('inc/fonctions.php');
require('inc/request.php');
$trames = selectAll();
$trames2 = selectNotDoublonProtocol();
include('inc/headerdashboard.php');
?>

    <h1 class="dashboard_title">Journal d'activité</h1>
    <div class="separator"></div>
    <div class="bulle info">
        <span><i class="fas fa-info-circle"></i> Information</span>
        <p>Sur cette page, vous pouvez voir l'ensemble des activités avec diverses informations concernant chaque trame. Clickez sur une trame pour en voir les détails</p>
    </div>
    <ul class="protocols">
        <?php foreach ($trames2 as $trame) { ?>
            <li><a class="btn_trames" target="_blank" title="Accédez à toutes les trames du protocol <?= $trame['protocol_name']?>" href="trames.php?protocol=<?= $trame['protocol_name'] ?>"><?= $trame['protocol_name'] ?></a></li>
        <?php } ?>
    </ul>

<ul class="logs_list">
    <?php
    foreach ($trames as $trame) {
        if ($trame['status'] == 'timeout') {
            echo '<li><a title="Cette trame n\'a pas pu arriver à destination." href="details.php?id='.$trame['id'].'" class="red">'.date("d/m/Y", strtotime($trame['date']));?> à <?=date("H:i:s", strtotime($trame['date'])).' :<br>Trame '.$trame['protocol_name'].' venant de '.$trame['ip_from'].' vers '.$trame['ip_dest'].'</a></li>';
        }
        elseif ($trame['ttl']<100) {
            echo '<li><a title="Le TTL de cette trame indique un potentiel problème sur le réseau." href="details.php?id='.$trame['id'].'" class="orange">'.date("d/m/Y", strtotime($trame['date']));?> à <?=date("H:i:s", strtotime($trame['date'])).' :<br>Trame '.$trame['protocol_name'].' venant de '.$trame['ip_from'].' vers '.$trame['ip_dest'].'</a></li>';
        }
        else {
            echo '<li><a title="Cette trame n\'a pas rencontré de probleme." href="details.php?id='.$trame['id'].'">'.date("d/m/Y", strtotime($trame['date']));?> à <?=date("H:i:s", strtotime($trame['date'])).' :<br>Trame '.$trame['protocol_name'].' venant de '.$trame['ip_from'].' vers '.$trame['ip_dest'].'</a></li>';
        }

    }

    ?>
</ul>


<?php

include('inc/footer.php');
