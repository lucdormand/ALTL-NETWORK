<?php
session_start();

require('inc/PDO.php');
require('inc/fonctions.php');
require('inc/request.php');

verifUserAlreadyConnected();

$errors = [];

if(!empty($_POST['submitted'])) {
    // Faille xss
    $login   = trim(strip_tags($_POST['login']));
    $password  = trim(strip_tags($_POST['password']));
    $user= selectAllUserLogin($login);

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
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
<section id="js_bg2">
<div id="register_form">
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
                <?php  echo'<a class="miss password_miss" href="mailmissingpassword.php">Mot de passe oubli?? ?</a><br>'?>
                <?php  echo'<a class="miss no_account" href="register.php">Vous n\'avez pas de compte ? <strong>Inscrivez-vous gratuitement</strong></a><br><br>'?>
                <?php  echo'<a class="miss return" href="index.php">Retourner sur l\'accueil</a>'?>
            </div>

        </form>
    </div>
</div>
</section>
<?php
include_once('inc/scripts.php')
?>
</body>
</html>



