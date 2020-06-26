<?php

session_start();

      if(!isset($_SESSION['id_usuario'])){
          header('Location: cadastro?erro=1');
      }

require_once('db_class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();

$id_usuario = $_SESSION['id_usuario'];

$senha 				= strip_tags(trim(addslashes(md5($_POST['senha']))));
$novasenha 			= strip_tags(trim(addslashes(md5($_POST['novasenha']))));
$confirmanovasenha 	= strip_tags(trim(addslashes(md5($_POST['confirmanovasenha']))));

$sql = "SELECT senha FROM usuarios WHERE id = '$id_usuario' ";

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){

	while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

		if ($registro['senha'] == $senha) {

			if ($novasenha == $confirmanovasenha) {

				$sql = "UPDATE usuarios SET senha = '$novasenha' Where id = '$id_usuario' ";

				$atualizar = mysqli_query($link, $sql);

				header('Location: minha_conta?sucesso=1');

			}else{
				header('Location: minha_conta?senhasdiferentes=1');
			}

		}else{
			header('Location: minha_conta?senhaerrada=1');
			
		}
	}
}else{
	echo "Erro na execução da consulta, favor entrar em contato com o admin do site";
}

?>