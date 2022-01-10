<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="asset\css\style.css">

</head>
<body>
    <header class="wrap">
        <div class="flex sb">
            <a class="header_logo" href="index.php">
                <img src="https://pbs.twimg.com/profile_images/949787136030539782/LnRrYf6e_400x400.jpg" alt="Logo" class="logo_img">
            </a>
            <ul class="flex sb">
                <li>
                    <a href="index.php">
                        <img src="./asset/img/home.png" alt="">
                        <p>Acceuil</p>
                    </a>
                </li>
                <li>
                    <a href="index.php#about">
                        <img src="./asset/img/about.png" alt="">
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
            <div class="registerBtn">
                <a href="login.php">S'inscrire/se connecter</a>
            </div>
        </div>
    </header>
