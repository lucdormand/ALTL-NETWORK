<?php
require_once('PDO.php');
//$tab = [
//    'code' => 200,
//    'message' => 'insertion BDD ok'
//];
//echo json_encode($_POST);


$sql = "DELETE FROM trames";
$query = $pdo ->prepare($sql);
$query ->execute();
echo 'bdd ok';
//echo 'ajax2';


