<?php

session_start();
require('inc/PDO.php');
require('inc/fonctions.php');

include('inc/header.php') ?>

<section id="dashboard_home">
    <div class="wrap">

        <h2>Bienvenue sur votre tableau de bord</h2>
        <div class="dashboardBtn">
            <p>Voir en pourcentages</p>
        </div>
        <div class="graph1 graph1Nb">
            <canvas id="graph1"></canvas>
        </div>
        <div class="graph1 graph1Percent" style="display: none">
            <canvas id="graph1P"></canvas>
        </div>

        <div class="container_two_graphs">
            <div class="graph2">
                <canvas id="graph2"></canvas>
            </div>

            <div class="graph3">
                <canvas id="graph3"></canvas>
            </div>
        </div>

        <div class="graph4">
            <canvas id="graph4"></canvas>
        </div>
    </div>
</section>
<?php
include('inc/footer.php');