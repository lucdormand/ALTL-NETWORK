<?php
session_start();
require('inc/pdo.php');
require('inc/fonctions.php');
$tab=1;
$success=false;
$errors = [];

if ($tab===0){
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
        // generate token
        $token = generateRandomString(100);
        // hashpassword
        $hashpassword = password_hash($password,PASSWORD_DEFAULT);
        // INSERT INTO
        $sql = " INSERT INTO `reseau_user`(`email`, `pseudo`, `password`, `token`, `status`, `created_at`)
                VALUES (:email,:pseudo,:password,:token,'user',NOW())";
        $query = $pdo->prepare($sql);
        $query->bindValue(':pseudo',     $pseudo,      PDO::PARAM_STR);
        $query->bindValue(':email',      $email,       PDO::PARAM_STR);
        $query->bindValue(':password',   $hashpassword,PDO::PARAM_STR);
        $query->bindValue(':token',      $token,       PDO::PARAM_STR);
        $query->execute();
        // redirection
        $success=true;
        header('refresh:5;url=index.php');
    }
}
} else if($tab===1){
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
</head>
<body>
<?php if($tab===0){ ?>
<section id="register_form">
    <div class="wrap2">
        <?php if($success==false){ ?>
        <form action="" method="post" class="wrapform" novalidate>

            <div class="info_box">
                <label for="pseudo"></label>
                <input type="text" placeholder="Nom d'utilisateur*" id="pseudo" name="pseudo" value="<?=recupInputValue('pseudo');?>">
            </div>
            <span class="error"><?= viewError($errors,'pseudo'); ?></span>
            <div class="info_box">
                <label for="email"></label>
                <input type="email" placeholder="Email*" id="email" name="email" value="<?= recupInputValue('email'); ?>">
            </div>
            <span class="error"><?= viewError($errors,'email'); ?></span>
            <div class="info_box">
                <label for="password"></label>
                <input type="password" placeholder="Mot de passe*" id="password" name="password" value="">
            </div>
            <span class="error"><?= viewError($errors,'password'); ?></span>
            <div class="info_box">
                <label for="password2"></label>
                <input type="password" placeholder="Confirmer Mot de passe*" id="password2" name="password2" value="">
            </div>

            <div class="info_box_button">
                <input type="submit" name="submitted" value="ENVOYER">
            </div>
            <p>Les champs avec * sont requis</p>
        </form>
        <?php } else {echo'<div class="info_box_success"><h2>Bienvenue ! Votre compte a bien été créé !</h2><h4>Redirection dans 5 secondes.</h4></div>';} ?>
    </div>
</section>
<?php } else if($tab=1){ ?>

    <form action="" method="post" class="wrapform" novalidate>

        <div class="info_box">
            <label for="login"></label>
            <input type="text" placeholder="Mail" id="login" name="login" value="<?= recupInputValue('login'); ?>">
            <span class="error"><?= viewError($errors,'login'); ?></span>
        </div>

        <div class="info_box">
            <label for="password"></label>
            <input type="password" placeholder="Mot de passe" id="password" name="password" value="">
            <span class="error"><?= viewError($errors,'password'); ?></span>
        </div>

        <div class="info_box_button">
            <input type="submit" name="submitted" value="SE CONNECTER">
        </div>
        <div>
            <?php  echo'<a href="mailmissingpassword.php">Mot de passe oublié ?</a>'?>
        </div>

    </form>
    </div>
    </section>
<?php }?>
</body>
</html>