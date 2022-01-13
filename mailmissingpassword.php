<?php

session_start();

require('inc/pdo.php');
require('inc/fonctions.php');

verifUserAlreadyConnected();
$errors = [];
if (!empty($_POST['submitted'])) {
    // Faille xss
    $email = trim(strip_tags($_POST['email']));


    if (empty($errors['email'])) {
        $sql = "SELECT * FROM reseau_user WHERE email = :email";
        $query = $pdo->prepare($sql);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $verifPseudo = $query->fetch();
        if (empty($verifPseudo)) {
            $errors['email'] = 'Aucune compte avec cet email ';
        }
    }
    if (count($errors) == 0) {
//        mail($_POST['email'], 'Reinitialisation de votre mot de passe', 'Si vous n\'êtes pas à l\'origine de cette demande, vous pouvez l\'ignorer. Veuillez cliquez sur ce lien pour choisir un nouveau mot de passe : lien/resetpassword?state=confirmed&token= ', 'From: theofradin@outlook.com ');
        echo 'Reception du lien qui emmène sur : <a href="modifpassword.php?token=' . urldecode($verifPseudo['token']) . '&email=' . urldecode($verifPseudo['email']) . '">Cette page</a>';
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
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/responsive.css">
</head>
<body>


<section id="register_form">

    <div class="wrap2">
        <form action="" method="post" class="wrapform" novalidate>

            <div class="info_box">
                <label for="email">Veuillez renseignez une adresse mail</label>
                <input type="text" placeholder="Mail" id="email" name="email" value="<?= recupInputValue('email'); ?>">
                <span class="error"><?= viewError($errors, 'email'); ?></span>
            </div>

            <div class="info_box_button">
                <input type="submit" name="submitted" value="ENVOYER">
            </div>
            <div>
                <?php  echo'<a class="miss" href="login.php">Vous possédez déjà un compte ? <strong>Connectez-vous directement</strong></a><br>'?>
                <?php  echo'<a class="miss" href="register.php">Vous n\'avez pas de compte ? <strong>Inscrivez-vous gratuitement</strong></a>'?>
            </div>

        </form>
    </div>
</section>


