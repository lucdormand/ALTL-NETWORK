<?php

//session_start();
//require('inc/PDO.php');
require('inc/fonctions.php');

include('inc/header.php') ?>

<section id="dashboard_home">
    <div class="wrap">
        <h2>Bienvenue sur votre tableau de bord</h2>

        <div class="graph1">
            <canvas id="graph1"></canvas>
        </div>
    </div>
</section>

<?php

include('inc/footer.php');