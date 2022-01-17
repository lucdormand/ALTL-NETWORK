<?php
require('inc/fonctions.php');
require('inc/PDO.php');

//debug($_GET);

$sql = "SELECT protocol_name,ip_from,ip_dest FROM trames ORDER BY ip_from ASC";
$query = $pdo->prepare($sql);
$query->execute();
$ips = $query->fetchAll();

$sql = "SELECT ip_dest, COUNT(*) FROM trames GROUP BY ip_dest ORDER BY ip_dest ASC";
$query = $pdo->prepare($sql);
$query->execute();
$ip_dest = $query->fetchAll();
$sql = "SELECT ip_from, COUNT(*) FROM trames GROUP BY ip_from ORDER BY ip_from ASC";
$query = $pdo->prepare($sql);
$query->execute();
$ip_from = $query->fetchAll();

//debug($ips);
if (empty($ips)) {
    header('Location: logs.php');
}

include('inc/headerdashboard.php');

?>

<ul class="ariane">
    <li><a id="btnDashboard" href="dashboard.php">Tableau de bord</a></li>
    <li><a id="btnIp" class="isactive" href="ip.php">Liste des adresses IP</a></li>
</ul>
<h1 class="dashboard_title">Adresses IP</h1>
<div class="separator"></div>
<div class="ipBtn"><p>Afficher les détails</p></div>

    <table class="ip_table wrap">
        <tr>
            <thead>
            <td>IP de départ (total)</td>
            <td>Domaine de l'IP</td>
            </thead>
        </tr>
        <?php foreach ($ip_from as $ip) { ?>
            <tr>
                <tbody>
                <td><?=$ip['ip_from'];?> (<?=$ip['COUNT(*)'];?>)</td>

                <?php if ($ip['ip_from'] == '172.217.19.227' OR $ip['ip_from'] == '216.58.198.206') {?>
                    <td>Google.com</td>
                <?php }
                elseif ($ip['ip_from'] == '52.49.17.168') {?>
                    <td>Amazon.com</td>
                <?php } elseif ($ip['ip_from'] == '216.58.168.12') {?>
                    <td>Flexential.com</td>
                <?php } else  {?>
                    <td>IP privée</td>
                <?php } ?>
                </tbody>
            </tr>
        <?php } ?>
    
        <tr>
            <thead>
            <td>IP de destination (total)</td>
            <td>Domaine de l'IP</td>
            </thead>
        </tr>
        <?php foreach ($ip_dest as $ip) { ?>
            <tr>
                <tbody>
                <td><?=$ip['ip_dest'];?> (<?=$ip['COUNT(*)'];?>)</td>

                <?php if ($ip['ip_dest'] == '172.217.19.227' OR $ip['ip_dest'] == '216.58.198.206') {?>
                    <td>Google.com</td>
                <?php }
                elseif ($ip['ip_dest'] == '52.49.17.168') {?>
                    <td>Amazon.com</td>
                <?php } elseif ($ip['ip_dest'] == '216.58.168.12') {?>
                    <td>Flexential.com</td>
                <?php } else  {?>
                    <td>IP privée</td>
                <?php } ?>
                </tbody>
            </tr>
        <?php } ?>
    </table>




<table class="details_table wrap" style="display: none">
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
            <?php if ($ip['ip_from'] == '172.217.19.227' OR $ip['ip_from'] == '216.58.198.206') {?>
                <td><?=$ip['ip_from'];?> (Google.com)</td>
            <?php }
        elseif ($ip['ip_from'] == '52.49.17.168') {?>
            <td><?=$ip['ip_from'];?> (Amazon.com)</td>
        <?php }  elseif ($ip['ip_from'] == '216.58.168.12') {?>
                <td><?=$ip['ip_from'];?> (Flexential.com)</td>
            <?php } else  {?>
            <td><?=$ip['ip_from'];?></td>
        <?php } ?>

            <?php if ($ip['ip_dest'] == '172.217.19.227' OR $ip['ip_dest'] == '216.58.198.206') {?>
                <td><?=$ip['ip_dest'];?> (Google.com)</td>
            <?php }
         elseif ($ip['ip_dest'] == '52.49.17.168') {?>
            <td><?=$ip['ip_dest'];?> (Amazon.com)</td>
            <?php } elseif ($ip['ip_dest'] == '216.58.168.12') {?>
                <td><?=$ip['ip_dest'];?> (Flexential.com)</td>
            <?php } else  {?>
                <td><?=$ip['ip_dest'];?></td>
            <?php } ?>
        </tbody>
    </tr>
    <?php } ?>
</table>



<?php

include('inc/footer.php');
