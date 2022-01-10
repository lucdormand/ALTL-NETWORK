<?php

//session_start();
//require('inc/PDO.php');
require('inc/fonctions.php');

include('inc/header.php') ?>

<section id="home">
    <div class="wrap">
        <h2>Bienvenue sur votre tableau de bord</h2>

        <canvas id="myChart" width="400" height="400"></canvas>
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
    </div>
</section>

<?php
include('inc/footer.php');