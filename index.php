<?php
session_start();
require('inc/fonctions.php');
require('inc/PDO.php');
include('inc/header.php');
?>

<section id="accueil">
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
<!--BOITE 1-->
    <div class="box_info">
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

<!--BOITE 2-->
    <div class="box_info">
        <div class="info_img">
            <img src="asset/img/safety.png" alt="">
        </div>
        <div class="info_txt">
            <div class="info_txt_title">
                <h2>ALTL Network vous sécurise.</h2>
            </div>
            <div class="info_txt_para">
                <p>Depuis le début de la pandémie, les cyberattaques ont augmenté de 400 %. ALTL Network vous propose un système de surveillance et de sécurité réseau afin de protéger vos appareils et ainsi vous permettre de travailler partout en toute sécurité, sans craindre les cybermenaces actuelles.</p>
            </div>
        </div>
    </div>
<!--BOITE 3-->
    <div class="box_info">
        <div class="info_img">
            <img src="asset/img/safety_2.png" alt="">
        </div>
        <div class="info_txt">
            <div class="info_txt_title">
                <h2>Les Cyberprédateurs sont à l'oeuvre 24h/24. Votre sécurité devrait en faire autant !</h2>
            </div>
            <div class="info_txt_para">
                <p>Les environnements de travail sont en constante évolution et les cybercriminels l’ont bien compris. Mais pendant qu’ils ciblent les terminaux, ALTL Network protège vos employés et votre entreprise avec une protection des matériels active en permanence. Nous restons vigilants pour que vous puissiez continuer à travailler partout et à tout moment.</p>
            </div>
        </div>
    </div>
</div>
</section>

<section id="services">
    <div class="wrap">
        <div class="services_title">
            <h2>NOS SERVICES</h2>
        </div>

        <div class="slider_box">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="slide_item">
                            <h2>Protection contre attaques en ligne.</h2>
                            <p>Ceci est un test tkt</p>
                        </div>
                        <img src="asset/img/slider_1.jpg" />
                    </li>
                    <li>
                        <div class="slide_item">
                            <h2>Conseils Informatiques</h2>
                            <p>Nous savons qu'il n'est pas toujours facile de se sentir à l'aise lorsque l'on touche à l'informatique, c'est pour cela que nous sommes à l'écoute de vos problèmes et questions lorsque nous travaillons avec nos clients.</p>
                        </div>
                        <img src="asset/img/slider_2.jpg" />
                    </li>
                    <li>

                        <div class="slide_item">
                            <h2>Dépannage Informatique à Distance</h2>
                            <p> Experte de vos solutions informatiques, ALTL Network est aussi capabale de régler vos problèmes à distance de manière sécurisée et efficace </p>
                        </div>
                        <img src="asset/img/slider_3.jpg" />
                    </li>
                </ul>
            </div>
        </div>

    </div>
</section>


<?php

include('inc/footer.php');

