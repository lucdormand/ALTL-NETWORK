<?php
require('inc/PDO.php');
require('inc/fonctions.php');
require('inc/request.php');

//debug($_GET);
$trameCurrent = selectAllById($_GET['id']);

//debug($trameCurrent);
if (empty($trameCurrent)) {
    header('Location: logs.php');
}

include('inc/headerdashboard.php');



?>
    <ul class="ariane">
        <li><a id="btnDashboard" href="dashboard.php">Tableau de bord</a></li>
        <li><a id="btnLog" href="logs.php">Journal des trames</a></li>
        <li><a id="btnDetailTrame" class="isactive" href="">Détail de la trame</a></li>
    </ul>
<h1 class="dashboard_title">Détail de la trame</h1>
<div class="separator"></div>
<div class="table_div">
    <table class="details_table wrap">
        <tr>
            <thead>
                <td>Etat</td>
                <td>Date de réception</td>
                <td title="Numéro d'identification de la trame">Identification</td>
                <td>Code</td>
                <td>Protocole</td>
                <td title="indique s'il s'agit d'une demande ou d'une réponse d'écho (trames ICMP)">Type du protocole</td>
                <td>IP de départ</td>
                <td>IP de destination</td>
                <td title="Time To Live : calcule le temps passé pour arriver à destination (plus bas = plus long)">TTL</td>
            </thead>
        </tr>
        <tr>
            <tbody>
                <?php if ($trameCurrent['status'] == 'timeout') {
                    echo '<td><img src="asset/img/cross.png" alt="Erreur : timeout" class="img_status"></td>';
                }
                else {
                    echo '<td><img src="asset/img/tick.png" alt="OK" class="img_status"></td>';
                }?>

                <td><?=date("d/m/Y", strtotime($trameCurrent['date']));?> à <?=date("H:i:s", strtotime($trameCurrent['date']));?></td>
                <td><?=$trameCurrent['identification'];?></td>
                <td><?=$trameCurrent['flags_code'];?></td>
                <td><?=$trameCurrent['protocol_name'];?></td>
                <?php if ($trameCurrent['protocol_name'] == 'ICMP') {
                    if ($trameCurrent['protocol_type'] == 0) {
                        echo '<td>'.$trameCurrent['protocol_type'].' (Réponse)</td>';
                    } elseif ($trameCurrent['protocol_type'] == 8) {
                        echo '<td>'.$trameCurrent['protocol_type'].' (Demande)</td>';
                    } else {
                        echo '<td>'.$trameCurrent['protocol_type'].'</td>';
                    }
                }   else {
                    echo '<td>N/A</td>';
                }?>
                <td><?=$trameCurrent['ip_from'];?></td>
                <td><?=$trameCurrent['ip_dest'];?></td>
                <td><?=$trameCurrent['ttl'];?></td>
            </tbody>
        </tr>
    </table>
</div>

<?php if ($trameCurrent['status'] == 'timeout') {
  echo '<div class="bulle danger">
        <span><i class="fas fa-exclamation-circle"></i> Echec</span>
        <p>Cette trame n\'a pas pu arriver à destination (timeout) !</p>
    </div>';

} else {
    echo '<div class="bulle success">
        <span><i class="fas fa-check-circle"></i> Succès</span>
        <p>Cette trame est arrivée à destination !</p>
    </div>';
}
?>



<?php

include('inc/footer.php');
