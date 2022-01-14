<?php
require('inc/pdo.php');
require('inc/fonctions.php');
require('inc/request.php');
verifUserAlreadyConnected();
$success=false;
$token=urldecode($_GET['token']);
$email=urldecode($_GET['email']);
$user=getUserResetPassword($email,$token);

if(empty($user)){
    header('Location: index.php');
}

$errors = [];
if(!empty($_POST['submitted'])) {
    // Faille xss
    $password  = cleanXss('password');
    $password2 = cleanXss('password2');

    // Validation
    if(empty($errors['email'])) {
        $sql = "SELECT * FROM reseau_user WHERE token=:token ";
        $query = $pdo->prepare($sql);
        $query->bindValue(':token',$token,PDO::PARAM_STR);
        $query->execute();
        $user = selectAllUserToken($token);
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
    if(count($errors) == 0) {
        // hashpassword
        $hashpassword = password_hash($password,PASSWORD_DEFAULT);
        // INSERT INTO
        updatePassword($hashpassword,$token);
        // redirection
        $success=true;
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

</head>
<body>

<section id="register_form">

    <div class="wrap2">
        <?php if($success==true) { ?>
            <div class="info_box">
                <h2>Mot de passe mis à jour avec succès</h2>
                <a href="index.php">Retour à l'acceuil</a>
            </div>
        <?php  } else { ?>
            <form action="" method="post" class="wrapform" novalidate>

                <div class="info_box">
                    <label for="password"></label>
                    <input type="password" placeholder="Nouveau mot de passe" id="password" name="password" value="">
                    <span class="error"><?= viewError($errors,'password'); ?></span>
                </div>
                <div class="info_box">
                    <label for="password2"></label>
                    <input type="password" placeholder="Confirmer Mot de passe" id="password2" name="password2" value="">
                </div>

                <div class="info_box_button">
                    <input type="submit" name="submitted" value="ENVOYER">
                </div>
                <p>Les champs avec * sont requis</p>
            </form>
        <?php  }?>
    </div>
</section>

</body>
</html>