<?php
session_start();
require('inc/pdo.php');
require('inc/fonctions.php');
require('inc/request.php');
verifUserAlreadyConnected();
$success=false;
$errors = [];

if(!empty($_POST['submitted'])) {
    // Faille xss
    $pseudo    = cleanXss('pseudo');
    $email     = cleanXss('email');
    $password  = cleanXss('password');
    $password2 = cleanXss('password2');

    // Validation
    $errors = mailValidation($errors,$email,'email');
    $errors = textValidation($errors,$pseudo,'pseudo',3,50);

    if(empty($errors['email'])) {
        $sql = "SELECT * FROM reseau_user WHERE email = :email";
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$email,PDO::PARAM_STR);
        $query->execute();
        $verifPseudo = $query->fetch();
        if(!empty($verifPseudo)) {
            $errors['email'] = 'Vous avez déjà un compte avec cette adresse mail';
        }
    }
    if(empty($errors['email'])) {
        $sql = "SELECT * FROM reseau_user WHERE email = :email";
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$email,PDO::PARAM_STR);
        $query->execute();
        $verifEmail = $query->fetch();
        if(!empty($verifEmail)) {
            $errors['email'] = 'Vous avez déjà un compte avec cette adresse mail';
        }
    }
    if(empty($errors['pseudo'])) {
        $sql = "SELECT * FROM reseau_user WHERE pseudo = :pseudo";
        $query = $pdo->prepare($sql);
        $query->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
        $query->execute();
        $verifPseudo = $query->fetch();
        if(!empty($verifPseudo)) {
            $errors['pseudo'] = 'Un compte avec ce nom d\'utilsateur existe déjà';
        }
    }

    // password
    if(!empty($password) || !empty($password2)) {
        if($password != $password2) {
            $errors['password'] = 'Veuillez renseigner des mot de passe identiques';
        } elseif (mb_strlen($password2) < 6) {
            $errors['password'] = 'Min 6 caractères pour votre mot de passe';
        }
    } else {
        $errors['password'] = 'Veuillez renseigner un mot de passe';
    }
//    CGU check
    if (empty($_POST['cgu'])) {
        $errors['cgu'] = 'Veuillez accepter les conditions d\'utilisation';
    }
    if(count($errors) == 0) {
        // generate token
        $token = generateRandomString(100);
        // hashpassword
        $hashpassword = password_hash($password,PASSWORD_DEFAULT);
        // INSERT INTO
        inscription($pseudo,$email,$hashpassword,$token);
        // redirection
        $success=true;
        header('refresh:5;url=index.php');
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
    <title>Inscription</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
<section id="js_bg3">
    <div style="height: 100vh">
        <div id="register_form">
            <div class="lines">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <div class="wrap2">

                <h1>Inscription</h1>
                <?php if($success==false){ ?>
                <form action="" method="post" class="wrapform" novalidate>

                    <div class="info_box">

                        <h3>Nom d'utilisateur :</h3>
                        <label for="pseudo"></label>
                        <input type="text" placeholder="Nom d'utilisateur*" id="pseudo" name="pseudo" value="<?=recupInputValue('pseudo');?>">
                        <hr>
                    </div>
                    <span class="error"><?= viewError($errors,'pseudo'); ?></span>
                    <div class="info_box">

                        <h3>Email :</h3>
                        <label for="email"></label>
                        <input type="email" placeholder="Email*" id="email" name="email" value="<?= recupInputValue('email'); ?>">
                        <hr>
                    </div>
                    <span class="error"><?= viewError($errors,'email'); ?></span>
                    <div class="info_box">

                        <h3>Mot de passe :</h3>
                        <label for="password"></label>
                        <input type="password" placeholder="Mot de passe*" id="password" name="password" value="">
                        <hr>
                    </div>
                    <span class="error"><?= viewError($errors,'password'); ?></span>
                    <div class="info_box">


                        <h3>Confirmer le mot de passe :</h3>
                        <label for="password2"></label>
                        <input type="password" placeholder="Confirmer Mot de passe*" id="password2" name="password2" value="">
                        <hr>
                        <p>Les champs avec * sont requis</p>
                        <div class="cguRegister">
                            <input type="checkbox" name="cgu">J'accepte les <a href="mentionslegales.php">conditions d'utilisations</a> de ALTL Network.

                        </div>
                        <span class="error"><?= viewError($errors,'cgu'); ?></span>
                    </div>

                    <div class="info_box_button">

                        <input type="submit" name="submitted" value="Inscription">
                    </div>
                    <div>
                        <?php  echo'<a class="miss" href="login.php">Vous possédez déjà un compte ? <strong>Connectez-vous directement</strong></a><br><br>'?>
                        <?php  echo'<a class="miss" href="index.php">Retourner sur l\'accueil</a>'?>
                    </div>

                </form>
                <?php } else {echo'<div class="info_box_success"><h2>Bienvenue ! Votre compte a bien été créé !</h2><h4>Redirection dans 5 secondes.</h4></div>';} ?>
            </div>
        </div>
    </div>
</section>

<?php
include_once('inc/scripts.php')
?>
</body>
</html>