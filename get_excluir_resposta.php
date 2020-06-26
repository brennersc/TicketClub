<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: cadastro?erro=1');
}

require_once('db_class.php');

$id_pergunta = base64_decode($_GET['er']);

$id_usuario = $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql();


$SQLUSUARIO = "SELECT a.id_anuncio, a.id_usuario, p.id_anuncio, u.id FROM usuarios as u 
join anuncios as a 
join perguntas as p 
ON (u.id = a.id_usuario) and (a.id_anuncio = p.id_anuncio) 
where id_perguntas = $id_pergunta ";

$resultadoemail = mysqli_query($link, $SQLUSUARIO);
$registroemail  = mysqli_fetch_array($resultadoemail, MYSQLI_ASSOC);

// echo $SQLUSUARIO;

// echo '<br>';
// echo $registroemail['id_usuario'];
// echo '<br>';
// echo $id_usuario;
// echo '<br>';
// echo $id_pergunta;


$sql = "UPDATE perguntas set resposta = '' where id_anuncio = " . $registroemail['id_anuncio'] . " and id_perguntas = '$id_pergunta' ";

//echo $sql;

if (mysqli_query($link, $sql)) {

    header('Location: meus_anuncios');
} else {

    echo "Erro ao registrar o usu�rio!";
}
