<?php

function debug($tab) {
    echo '<pre style="height: 200px;overflow-y: scroll;font-size: 0.7rem; padding: 0.5rem; font-family: Consolas, monospace; background-color: black; color: palegreen;  text-shadow:0 0 15px forestgreen,
    0 0 20px forestgreen,
    0 0 31px forestgreen,
    0 0 42px forestgreen,
    0 0 92px forestgreen,
    0 0 102px forestgreen,
    0 0 112px forestgreen,
    0 0 161px forestgreen;
    
}">';
    print_r($tab);
    echo '</pre>';
};

function cleanXss($key) {
    return trim(strip_tags($_POST[$key]));
}
function cleanXssData($key) {
    return trim(strip_tags($key));
}
function echoError($errors,$key) {
    if (!empty($errors[$key])) {
        echo $errors[$key];
    }
};

function recupInputValue($key) {
    if (!empty($_POST[$key])) {
        echo $_POST[$key];
    }
}

function textValidation($errors,$value,$name,$min,$max) {

    if (empty($value)){
        $errors[$name] = 'Veuillez renseigner ce champ';
    } elseif (strlen($value)<$min) {
        $errors[$name] = 'Veuillez renseigner plus de '.($min-1).' caractères';
    } elseif (strlen($value)>$max) {
        $errors[$name] = 'Veuillez renseigner moins de '.($max+1).' caractères';
    }
    return $errors;
}

function uniqueValidation($errors,$value,$name,$target) {

    if (!empty($value)){
        $errors[$name] = $target.' is already in use';
    }
    return $errors;
}


function intValidation($errors,$value,$name,$num) {

    if (empty($value)){
        $errors[$name] = 'veuillez renseigner ce champ';
    } elseif (strlen($value)!= $num) {
        $errors[$name] = 'veuillez renseigner '.$num.' caractères';
    }
    return $errors;
};

function confPassword($errors,$pw1,$pw2,$name) {

    if ($pw1 != $pw2){
        $errors[$name] = 'Passwords doesn\'t match password confirmation';
    }
    return $errors;
}



function selectValidation($errors, $id, $name) {

    if (empty($id)){
        $errors[$name] = 'veuillez renseigner ce champ';
    }
    return $errors;
}


function getEntityById($table,$id) {
    global $pdo;
    $sql = "SELECT * FROM $table WHERE id = :id";
    $query = $pdo ->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query ->execute();
    return  $query->fetch();
}

function redirect404()
{
    header('HTTP/1.1 404 Not Found');
    exit;
}

function verifyUpdate($errors,$key,$target) {

    if (count($errors) > 0) { recupInputValue($key); }
    else {echo $target[$key];}
}

function dateFormat($target,$format='d/m/Y | h:i') {
    if (!empty($target))
        echo date($format, strtotime($target));
};

function clearXssAll($p) {
    $post = array();
    foreach ($p as $key => $value) {
        $post[$key] = trim(strip_tags($value));
    }
    return $post;
};

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function verifUserConnected(){
    if (isLogged()==false){
        header('Location: login.php');
    }
}

function isLogged()
{
    if(!empty($_SESSION['user'])) {
        if (!empty($_SESSION['user']['id'])) {
            if (!empty($_SESSION['user']['email'])) {
                if (!empty($_SESSION['user']['status'])) {
                    if (!empty($_SESSION['user']['ip'])) {
                        if ($_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
                            return true;
                        }
                    }
                }
            }
        }
    }
    return false;
}
function verifUserAlreadyConnected(){
    if (isLogged()==true){
        header('Location: index.php');
    }else{ }
}


function viewError($errors,$key)
{
    if(!empty($errors[$key])) {
        echo $errors[$key];
    }
}

function mailValidation($errors,$value,$key){
    if(!empty($value)){
        if (filter_var($value, FILTER_VALIDATE_EMAIL)==false) {
            $errors[$key]='Veuillez renseigner un email valide';
        }
    } else{
        $errors[$key]='Veuillez renseigner ce champ';
    }
    return $errors;
}

