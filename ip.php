<?php
require('inc/fonctions.php');
require('inc/PDO.php');

//debug($_GET);

$sql = "SELECT protocol_name,ip_from,ip_dest FROM trames ORDER BY ip_from ASC";
$query = $pdo->prepare($sql);
$query->execute();
$ips = $query->fetchAll();


//debug($ips);
if (empty($ips)) {
    header('Location: logs.php');
}

include('inc/headerdashboard.php');

?>

<h1 class="dashboard_title">Adresses IP</h1>
<div class="separator"></div>
<table class="details_table wrap">
    <tr>
        <thead>
            <td>Protocole</td>
            <td>IP de départ</td>
            <td>IP de destination</td>
        </thead>
    </tr>
    <?php foreach ($ips as $ip) { ?>
    <tr>
        <tbody>
            <td><?= $ip['protocol_name'] ?></td>
            <td><?=$ip['ip_from'];?></td>
            <td><?=$ip['ip_dest'];?></td>
        </tbody>
    </tr>
    <?php } ?>
</table>



<?php

include('inc/footer.php');
