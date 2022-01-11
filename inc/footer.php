<footer class="wrap">
    <div class="flex footer">
        <a class="footer_logo" href="index.php">
            <img src="asset/img/Logo_ALTL.png" alt="Logo" class="logo_img">
        </a>
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
        </ul>
    </div>
    <p class="copyrights">@Copyright placeholder</p>
</footer>

<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script src="asset/flexslider/jquery.flexslider.js"></script>
<script src="asset/js/main.js"></script>

</body>
</html>