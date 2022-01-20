<?php
require('inc/pdo.php');
require('inc/fonctions.php');
require('inc/request.php');

//debug($_GET);

$trameCurrent = selectAllByProtocolName();

$trames = selectNotDoublonProtocol();

//debug($trameCurrent);
if (empty($trameCurrent)) {
    header('Location: logs.php');
}

include('inc/headerdashboard.php');



?>
    <ul class="ariane">
        <li><a id="btnDashboard" href="dashboard.php">Tableau de bord</a></li>
        <li><a id="btnLog" href="logs.php">Journal des trames</a></li>
        <li><a id="btnDetailProtocol" class="isactive" href="">Détail du protocol</a></li>
    </ul>
<section id="trames">
    <h1 class="dashboard_title">Détails de toutes les trames du protocol <?= $_GET['protocol'] ?></h1>
    <div class="separator"></div>
        <div class="detailsBtn">
            <p>Filtres :</p>
        </div>
    <ul class="protocols">
        <?php foreach ($trames as $trame) { ?>
            <li><a class="btn_trames" title="Accédez à toutes les trames du protocol <?= $trame['protocol_name']?>" href="trames.php?protocol=<?= $trame['protocol_name'] ?>"><?= $trame['protocol_name'] ?></a></li>
        <?php } ?>
    </ul>
    <div class="table_div">
        <table class="details_table wrap">
            <tr>
                <thead>
                    <td>Etat</td>
                    <td>Date de réception</td>
                    <td title="Numéro d'identification de la trame">Identification</td>
                    <td>Code</td>
                    <td>Protocole</td>
                    <?php if ($_GET['protocol'] == 'ICMP') {
                        echo '<td title="indique s\'il s\'agit d\'une demande ou d\'une réponse d\'écho">Type du protocole</td>';
                    }?>
                    <td>IP de départ</td>
                    <td>IP de destination</td>
                    <td title="Time To Live : calcule le temps passé pour arriver à destination (plus bas = plus long)">TTL</td>
                </thead>
            </tr>
            <?php foreach ($trameCurrent as $oneTrame) { ?>
            <tr>
                <tbody>
                    <?php if ($oneTrame['status'] == 'timeout') {
                        echo '<td><img title="Timeout" src="asset/img/cross.png" alt="Erreur : timeout" class="img_status"></td>';

                    }
                    else {
                        echo '<td><img title="Succes" src="asset/img/tick.png" alt="OK" class="img_status"></td>';
                    }?>

                    <td><?=date("d/m/Y", strtotime($oneTrame['date']));?> à <?=date("H:i:s", strtotime($oneTrame['date']));?></td>
                    <td><?=$oneTrame['identification'];?></td>
                    <td><?=$oneTrame['flags_code'];?></td>
                    <td><?=$oneTrame['protocol_name'];?></td>
                    <?php if ($oneTrame['protocol_name'] == 'ICMP') {
                        if ($oneTrame['protocol_type'] == 0) {
                            echo '<td>'.$oneTrame['protocol_type'].' (Réponse)</td>';
                        } elseif ($oneTrame['protocol_type'] == 8) {
                            echo '<td>'.$oneTrame['protocol_type'].' (Demande)</td>';
                        } else {
                            echo '<td>'.$oneTrame['protocol_type'].'</td>';
                        }
                    }?>
                    <td><?=$oneTrame['ip_from'];?></td>
                    <td><?=$oneTrame['ip_dest'];?></td>
                    <td><?=$oneTrame['ttl'];?></td>
                </tbody>
            </tr>
            <?php } ?>
        </table>
    </div>
</section>


<?php

include('inc/footer.php');
