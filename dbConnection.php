<?php

$ambiente = false;
$conn = false;

if($ambiente){
	$dns    = "mysql:dbname=etecuira_appLogin;host=localhost";
	$dbuser = "etecuira_fabio";
	$dbpass = "@fabioT14";
}else{
	$dns    = "mysql:dbname=applogin;host=localhost";
	$dbuser = "root";
	$dbpass = "";
}

try{
	$pdo = new PDO($dns, $dbuser,$dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn = true;
	echo "conectei";
} catch(PDOException $e) {
    echo 'Falhou: ' . $e->getMessage();
    $conn = false;
}

?>
	