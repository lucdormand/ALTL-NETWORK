<?php
session_start();
require('inc/fonctions.php');
require('inc/PDO.php');
include('inc/header.php');
?>

<section id="accueil">
    <div class="accueil_flex">
        <div>
            <h1> BIENVENUE </h1>
        </div>
        <div>
            <h1 class="catchphrase"><span id="word">CHEZ ALTL NETWORK</span></h1>
        </div>
    </div>
    <div>

        <div class="down_arrow">
            <a class="scroll down-arrow"  href="#info"><img src="asset/img/down-arrow.svg" alt="down-arrow.svg"></a>
        </div>
    </div>
</section>

<section id="info">
<div class="wrap">
<!--BOITE 1-->
    <div class="box_info box1">
        <div class="info_img">
            <img src="asset/img/about.png" alt="">
        </div>
        <div class="info_txt">
            <div class="info_txt_title">
                <h2>Qui sommes-nous ?</h2>
            </div>
            <div class="info_txt_para">
                <p>Nous sommes une entreprise qui a été fondée en 1999 par un ingénieur en Master. Son but était d’analyser les trafics sur les différentes pages de son site web. Pour cela, il utilise une technologie très avancée qui permet de répertorier sous forme de liste en temps réel, le trafic de son site web.</p>
            </div>
        </div>
    </div>

<!--BOITE 2-->
    <div class="box_info box2">
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
    <div class="box_info box3">
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
                            <p> ALTL Network propose des services de cybersécurité contre les potentielles attaques en ligne ainsi qu'un moyen de surveillance de son réseau.</p>
                        </div>
                        <img src="https://i.picsum.photos/id/1/1600/800.jpg?hmac=LXp6QsSJavPlkMiVw9XVNVVgy3EWw2paL3BP0O4iFfs" />
                    </li>w
                    <li>
                        <div class="slide_item">
                            <h2>Conseils Informatiques</h2>
                            <p>Nous savons qu'il n'est pas toujours facile de se sentir à l'aise lorsque l'on touche à l'informatique, c'est pour cela que nous sommes à l'écoute de vos problèmes et questions lorsque nous travaillons avec nos clients.</p>
                        </div>
                        <img src="https://i.picsum.photos/id/370/1600/800.jpg?hmac=adO6Gk5IcyN1FtjMz_OWTCn60gbln-6zBA4vgkFSdXo" />
                    </li>
                    <li>

                        <div class="slide_item">
                            <h2>Dépannage Informatique à Distance</h2>
                            <p> Experte de vos solutions informatiques, ALTL Network est aussi capable de régler vos problèmes à distance de manière sécurisée et efficace </p>
                        </div>
                        <img src="https://i.picsum.photos/id/2/1600/800.jpg?hmac=DxffnWozDEZ2IAf_N_GKli1UZ-XJWa-hlby2bCnttSI" />
                    </li>
                </ul>
            </div>
        </div>

    </div>
</section>


<?php

include('inc/footer.php');

