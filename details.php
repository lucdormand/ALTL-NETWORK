<?php
require('inc/fonctions.php');
require('inc/PDO.php');

//debug($_GET);

$sql = "SELECT * FROM trames WHERE id = :id";
$query = $pdo->prepare($sql);
$query -> bindValue(':id',$_GET['id']);
$query->execute();
$trameCurrent = $query->fetch();

//debug($trameCurrent);
if (empty($trameCurrent)) {
    header('Location: logs.php');
}

include('inc/header.php');



?>

<h1 class="dashboard_title">Détail de la trame</h1>
<div class="separator"></div>
<table class="details_table wrap">
    <tr>
        <td>Etat</td>
        <td>Date de réception</td>
        <td>Identification</td>
        <td>Code</td>
        <td>Protocole</td>
        <td>IP de départ</td>
        <td>IP de destination</td>
        <td>TTL</td>
    </tr>
    <tr>
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
        <td><?=$trameCurrent['ip_from'];?></td>
        <td><?=$trameCurrent['ip_dest'];?></td>
        <td><?=$trameCurrent['ttl'];?></td>
    </tr>
</table>




<?php

include('inc/footer.php');
