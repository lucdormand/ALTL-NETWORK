<footer class="wrap">
    <div class="flex footer">

        <a class="footer_logo" href="index.php">
            <img src="asset/img/Logo_ALTL.png" alt="Logo" class="logo_img">
        </a>

        <div class="social_icons">
            <p>Nos réseaux</p>
            <div class="icons">
                <a href="#"><div class="sprite1"></div></a>
                <a href="#"><div class="sprite2"></div></a>
                <a href="#"><div class="sprite3"></div></a>
                <a href="#"><div class="sprite4"></div></a>
            </div>
        </div>
        <ul>
            <li>
                <a href="#accueil">Accueil</a>
            </li>
            <li>
                <a href="#info">A propos</a>
            </li>
            <li>
                <?php if (!isLogged()) { ?>
                    <div class="registerBtn">
                        <a href="login.php">S'inscrire/se connecter</a>
                    </div>
                <?php } else {?>
                    <div class="logoutBtn">
                        <a href="logout.php">Se déconnecter</a>
                    </div>
                <?php } ?>
            </li>
            <li>
                <a href="contact.php">Nous contacter</a>
            </li>
        </ul>
    </div>
    <div class="footer_info">
            <p class="copyrights">@Copyright placeholder</p>
            <a href="mentionslegales.php"><p>Mentions légales</p></a>
    </div>
</footer>

<?php
include_once('inc/scripts.php')
?>

</body>
</html>