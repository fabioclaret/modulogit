<?php
header('Content-Type: application/json charset=utf-8');

include 'dbConnection.php';
$response = array();
$response['erro'] = true;	

if ($conn){
	if($_SERVER ['REQUEST_METHOD'] == 'POST'){
		$login = "'".$_POST['login']."'";
		$senha = "'".$_POST['senha']."'";

		/*aqui crio a query - (consulta)*/
		$sql = "SELECT * FROM usuario WHERE login = $login AND senha = $senha";

		/*Aqui eu faco a requisicao ao PDO*/
		$sql = $pdo->query($sql); 

		if( $sql->rowCount() > 0){

			$registro = $sql->fetch();

			$response['erro']    = false;
			$response['linhas']  = $sql->rowCount();
			$response['login']   = $registro['login'];
			$response['senha']   = $registro['senha'];
			$response['perfil']  = $registro['fk_id_perfil'];
			$response['datainc'] = $registro['datainc'];
		} else{
			$response['mensagem'] = "Usuario não cadastrado";
		}
		$pdo=null;
	}
}else{
	echo "Tente mais tarde!";
}

$pdo = null;
echo json_encode($response);
?>
