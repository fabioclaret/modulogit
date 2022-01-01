<?php
header('Content-Type: text/html charset=utf-8');

include 'dbConnection.php';
/*aqui crio a query - (consulta)*/
$sql = "SELECT * FROM usuario";
/*Aqui eu faco a requisicao ao PDO*/
$sql = $pdo->query($sql); 

if( $sql->rowCount() > 0){
	
	echo "Com alguns registros";
} else{
	"Sem dados no momento...";
	
}

$pdo->close();
?>
