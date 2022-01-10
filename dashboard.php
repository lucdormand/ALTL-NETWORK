<?php

session_start();
require('inc/PDO.php');
require('inc/fonctions.php');

include('inc/header.php') ?>

<section id="dashboard_home">
    <div class="wrap">
        <h2>Bienvenue sur votre tableau de bord</h2>

        <div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
</section>

    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
<?php
include('inc/footer.php');