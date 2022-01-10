<footer class="wrap">
    <div class="flex">
        <a class="header_logo" href="index.php">
            <img src="https://pbs.twimg.com/profile_images/949787136030539782/LnRrYf6e_400x400.jpg" alt="Logo" class="logo_img">
        </a>
        <ul>
            <li>
                <a href="index.php">Accueil</a>
            </li>
            <li>
                <a href="index.php#about">A propos</a>
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
        </ul>
    </div>
    <p>Copyright placeholder</p>
</footer>
</body>
</html>