<?php
session_start();
$onDashboard = false;
if (!isLogged()) {
    header("Location: index.php?unauthorized=1");
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de bord - Analyser vos trames réseaux grâce à ALTL Network</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@400;700&family=Poppins:ital,wght@0,400;0,700;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../asset/flexslider/flexslider.css" type="text/css">
    <link rel="stylesheet" href="asset\css\style.css">
</head>
<body>
<header class="wrap">
    <div class="flex sb">
        <a class="header_logo" href="index.php">
            <img src="asset/img/Logo_ALTL.png" width="300" height="140" alt="Logo" class="logo_img" >
        </a>
        <ul class="flex sb">

            <?php if (isLogged()) { ?>
                <li>
                    <a href="dashboard.php">
                        <img src="./asset/img/dashboard-graphique.png" alt="">
                        <p>Tableau de bord</p>
                    </a>
                </li>
                <li>
                    <a href="logs.php">
                        <img src="./asset/img/log-file.png" alt="">
                        <p>Journal des trames</p>
                    </a>
                </li>
                <li>
                    <a href="ip.php">
                        <img src="./asset/img/ip.png" alt="">
                        <p>Page des IPs</p>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <img src="./asset/img/back.png" alt="">
                        <p>Accueil</p>
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
                <a href="./logout.php">Se déconnecter</a>
            </div>
        <?php } ?>
        <div class="headerBurger absolute">
            <img src="asset/img/burger-bar.png" alt="">
            <nav class="burgerMenu absolute">
                <ul>
                    <?php if (isLogged()) { ?>
                    <li>
                        <a href="dashboard.php">
                            <p>Tableau de bord</p>
                        </a>
                    </li>
                    <li>
                        <a href="logs.php">
                            <p>Journal des trames</p>
                        </a>
                    </li>
                    <li>
                        <a href="ip.php">
                            <p>Page des IPs</p>
                        </a>
                    </li>
                    <li>
                        <a href="index.php">
                            <p>Accueil</p>
                        </a>
                    </li>
                    <?php } if (!isLogged()) { ?>
                        <li>
                            <a href="register.php">S'inscrire</a>
                        </li>
                        <li>
                            <a href="login.php">Se connecter</a>
                        </li>
                    <?php }?>

                </ul>
            </nav>
        </div>
    </div>
</header>