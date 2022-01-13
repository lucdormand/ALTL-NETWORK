<?php
session_start();

require('inc/pdo.php');
require('inc/fonctions.php');

verifUserAlreadyConnected();

$errors = [];

if(!empty($_POST['submitted'])) {
    // Faille xss
    $login   = trim(strip_tags($_POST['login']));
    $password  = trim(strip_tags($_POST['password']));

    $sql = "SELECT * FROM reseau_user WHERE email = :login";
    $query = $pdo->prepare($sql);
    $query->bindValue(':login',$login,PDO::PARAM_STR);
    $query->execute();
    $user= $query->fetch();

    if(empty($user)) {
        $errors['login'] = 'Email invalide';
    } else {
        if (password_verify($password , $user['password'] )==true){
            $_SESSION['user']=array(
                'id'    =>$user['id'],
                'email' =>$user['email'],
                'status'=>$user['status'],
                'ip'     =>$_SERVER['REMOTE_ADDR'],//::1
            );
        }else {
            $errors['password'] = 'Mot de passe incorrect';
        }
    }
    if(count($errors) == 0) {
        header('Location: index.php');
    }
}
?>
<link rel="stylesheet" href="asset/css/style.css">
<section id="register_form">
    <div class="wrap2">
        <form action="" method="post" class="wrapform" novalidate>
        <h2>Connexion</h2>
            <div class="info_box">
                <label for="login"></label>
                <input type="text" placeholder="Mail" id="login" name="login" value="<?= recupInputValue('login'); ?>">
                <span class="error"><?= viewError($errors,'login'); ?></span>
                <hr>
            </div>

            <div class="info_box">
                <label for="password"></label>
                <input type="password" placeholder="Mot de passe" id="password" name="password" value="">
                <span class="error"><?= viewError($errors,'password'); ?></span>
                <hr>
            </div>

            <div class="info_box_button_insc">
                <input type="submit" name="submitted" value="Connexion">
            </div>
            <div>
                <?php  echo'<a class="miss" href="mailmissingpassword.php">Mot de passe oublié ?</a><br>'?>
                <?php  echo'<a class="miss" href="register.php">Vous n\'avez pas de compte ? <strong>Inscrivez-vous gratuitement</strong></a><br><br>'?>
                <?php  echo'<a class="miss" href="index.php">Retourner sur l\'accueil</a>'?>
            </div>

        </form>
    </div>
</section>

</body>
</html>



