<?php
header('Content-Type: text/json; charset=uft-8');

include 'dbConnection.php';

$response = array();
$response['erro'] = true;

#if ( $_SERVER['REQUEST_METHOD'] == 'post'){

	/* A partir dessa linha, eu estou dizendo que so vai fazer alguma coisa
	se o metodo for post, por isso precisamos do postman, pois la eu posso 
	escolher o metodo
	*/
	
	//$login = "'".$_POST['login']."'"; 
	//$senha = "'".$_POST['senha']."'";
	
	//x
	$sql = "SELECT *FROM usuario WHERE login = $login AND senha = $senha";
	$sql = $pdo->query($sql);

	if($sql->rowCount() > 0){
		$dado = $sql->fetch();	
		$response['registros'] = $sql->rowCount();
		$response['erro']      = false;
		$response['login']     = $dado['login'];
		$response['senha']     = $dado['senha'];
		$response['perfil']    = $dado['fk_id_perfil'];
		$response['inclusao']  = $dado['datainc'];
	}else{
		$response['mensagem']  = "Usuario ou senha inválidos!";
		
	}	
#}

echo json_encode($response);
?>