<?php
session_start();
require('inc/fonctions.php');
require('inc/PDO.php');
include('inc/header.php');

?>

<section id="acceuil">
    <div>
        <h2><strong>BIENVENUE</strong></h2>
    </div>
    <div>
        <h2>VOTRE SECURITÉ EST NOTRE PRIORITÉ</h2>
    </div>
    <div>
        <img src="asset/img/security.png" alt="">
    </div>
</section>

<section id="info">
<div class="wrap">
    <div class="info_img">
        <img src="asset/img/about.png" alt="">
    </div>
    <div class="info_txt">
        <div class="info_txt_title">
            <h2>Qui sommes nous ?</h2>
        </div>
        <div class="info_txt_para">
            <p>Nous sommes une entreprise qui a été fondée en 1999 par un ingénieur en Master. Son but était d’analyser les traffics sur les différentes pages de son site web. Pour cela, il utilise une technologie très avancée qui permet de répertorier sous forme de liste en temps réel, le traffic de son site web.</p>
        </div>
    </div>
</div>
</section>


<?php

include('inc/footer.php');

