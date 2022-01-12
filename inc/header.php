<?php
$onDashboard = false;
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@400;700&family=Poppins:ital,wght@0,400;0,700;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="asset/flexslider/flexslider.css" type="text/css">
    <link rel="stylesheet" href="asset\css\style.css">
</head>
<body>
    <header class="wrap">
        <div class="flex sb">
            <a class="header_logo" href="index.php">
                <img src="asset/img/Logo_ALTL.png" width="300" height="140" alt="Logo" class="logo_img" >
            </a>
            <ul class="flex sb">
                <li>
                    <a href="index.php#accueil">
                        <img src="./asset/img/home.png" alt="">
                        <p>Accueil</p>
                    </a>
                </li>
                <li>
                    <a href="index.php#info">
                        <img src="./asset/img/about_menu.png" alt="">
                        <p>A propos</p>
                    </a>
                </li>
                <?php if (isLogged()) { ?>
                <li>
                    <a href="dashboard.php">
                        <img src="./asset/img/sec.png" alt="">
                        <p>Tableau de bord</p>
                    </a>
                </li>
                <?php } ?>
            </ul>

            <?php if (!isLogged()) { ?>
                    <div class="headerBtns flex sb">
                        <div class="registerBtn">
                            <a href="register.php">S'inscrire</a>
                        </div>
                        <div class="registerBtn">
                            <a href="login.php">Se connecter</a>
                        </div>
                    </div>
            <?php } else {?>
                <div class="logoutBtn">
                    <a href="logout.php">Se déconnecter</a>
                </div>
            <?php } ?>
        </div>
    </header>
