<?php
$onDashboard = false;
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
    <link rel="stylesheet" href="asset\css\style.css">
</head>
<body>
    <header class="wrap">
        <div class="flex sb">
            <a class="header_logo" href="../index.php">
                <img src="https://pbs.twimg.com/profile_images/949787136030539782/LnRrYf6e_400x400.jpg" alt="Logo" class="logo_img">
            </a>
            <?php if (!$onDashboard) { ?>
            <ul class="flex sb">
                <li>
                    <img src="./asset/img/home.png" alt="">
                    <a href="index.php">Accueil</a>
                </li>
                <li>
                    <img src="./asset/img/about_menu.png" alt="">
                    <a href="index.php">A propos</a>
                </li>
                <li>
                    <img src="./asset/img/sec.png" alt="">
                    <a href="index.php">Nos services</a>
                </li>
            </ul>
            <?php } else { ?>
            <ul class="flex sb">
                <li>
                    <img src="./asset/img/home.png" alt="">
                    <a href="index.php">Accueil</a>
                </li>
                <li>
                    <img src="./asset/img/log-file.png" alt="">
                    <a href="index.php">Logs</a>
                </li>
                <li>
                    <img src="./asset/img/back.png" alt="">
                    <a href="index.php">Site principal</a>
                </li>
            </ul>
            <?php } ?>
            <div class="registerBtn">
                <a href="register.php">S'inscrire/se connecter</a>
            </div>
        </div>
    </header>
