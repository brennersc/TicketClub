<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
  header('Location: cadastro?erro=1');
}

require_once('db_class.php');

$status = $_POST['status'];

$id_usuario = $_SESSION['id_usuario'];

$id_anuncio = base64_decode($_GET['ex']);

$objDb = new db();
$link = $objDb->conecta_mysql();

// $sql = "SELECT foto FROM anuncios WHERE id_anuncio = $id_anuncio and id_usuario = $id_usuario ";

// $resultado_id = mysqli_query($link, $sql);

// if($resultado_id){
//   while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

//     unlink(''.$registro['foto'].'');
//   }
// }

// $resultado_id = 0;
//$sql = "UPDATE anuncios set titulo = '$titulo', descricao = '$descricao', categoria = '$categoria', cidade = '$cidade', estado = '$estado', data_evento = '$data', valor = '$valor' where id_anuncio = $id_anuncio and id_usuario = $id_usuario ";

$sql = "UPDATE anuncios set status = '$status' WHERE id_anuncio = $id_anuncio and id_usuario = $id_usuario";

//echo $sql;

if (mysqli_query($link, $sql)) {

  header('Location: meus_anuncios');

} else {
  echo '<div class="caixa-anuncio group">';
  echo '<div class="row ">';
  echo '<div class="titulo" class="col-sm-12">';
  echo '<h3><B><center>Erro na consulta de Anuncios no banco de dados!</center></B></h3>';
  echo '<h3><B><center><a href="./">Voltar</a></center></B></h3>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}
