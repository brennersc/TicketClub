<?php

session_start();

      if(!isset($_SESSION['id_usuario'])){
          header('Location: cadastro?erro=1');
      }

require_once('db_class.php');

$titulo     =   strip_tags(trim(addslashes($_POST['titulo'])));
$descricao  =   strip_tags(trim(addslashes($_POST['descricao'])));
$categoria  =   strip_tags(trim(addslashes($_POST['categoria'])));
$cidade     =   strip_tags(trim(addslashes($_POST['cidade'])));
$estado     =   strip_tags(trim(addslashes($_POST['estado'])));
$valor      =   strip_tags(trim(addslashes($_POST['valor'])));
$data       =   strip_tags(trim(addslashes($_POST['data'])));

$id_usuario = $_SESSION['id_usuario'];

$id_anuncio = base64_decode(base64_decode($_GET['at']));

$objDb = new db();
$link = $objDb->conecta_mysql();

if($titulo == '' || $descricao == '' || $cidade == '' || $estado == '' || $valor == '' || $id_usuario == '' ){
	
	header('Location: meus_anuncios');
	die();
}

$sql = "UPDATE anuncios set titulo = '$titulo', descricao = '$descricao', categoria = '$categoria', cidade = '$cidade', estado = '$estado', data_evento = '$data', valor = '$valor' where id_anuncio = $id_anuncio and id_usuario = $id_usuario ";

mysqli_query($link, $sql);

//echo $sql;

header('Location: meus_anuncios');

?>
