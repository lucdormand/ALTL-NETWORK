<?php
require_once('PDO.php');
//include('headerdashboard.php');
//$tab = [
//    'code' => 200,
//    'message' => 'insertion BDD ok'
//];
//echo json_encode($_POST);


$sql = "DELETE FROM trames";
$query = $pdo ->prepare($sql);
$query ->execute();
//echo 'ajax2';
//header("Location: ../dashboard.php");
//include('inc/footer.php');



