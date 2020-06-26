<?php


session_start();

      if(!isset($_SESSION['id_usuario'])){
          header('Location: cadastro?erro=1');
      }

require_once('db_class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();

$id_usuario = $_SESSION['id_usuario'];

$id_anuncio = base64_decode($_GET['img']);

$sql = "SELECT foto FROM anuncios WHERE id_anuncio = $id_anuncio and id_usuario = $id_usuario ";

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){
    while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

        unlink(''.$registro['foto'].'');
    }
}

$foto = $_FILES['image']['tmp_name'];


$tamanho_permitido = 2048000; //2 MB
$pasta = 'uploads';

if (!empty($foto)){
    $file = getimagesize($foto);

//TESTA O TAMANHO DO ARQUIVO
    if($_FILES['image']['size'] > $tamanho_permitido){

        header('Location: meus_anuncios?arquivo_grande=1');
    }

//TESTA A EXTENSÃO DO ARQUIVO
    if(!preg_match('/^image\/(?:gif|jpg|jpeg|png)$/i', $file['mime'])){

        header('Location: meus_anuncios?extensao=1');
    }

//CAPTURA A EXTENSÃO DO ARQUIVO
    $extensao = str_ireplace("/", "", strchr($file['mime'], "/"));

//MONTA O CAMINHO DO NOVO DESTINO
    $novoDestino = "{$pasta}/foto".uniqid('', true) . '.' . $extensao;  
    move_uploaded_file ($foto , $novoDestino );

} 

if ($novoDestino == '') {
    //$novoDestino = 'uploads/default.png';
    header('Location: publicar?arquivo_grande=1');
    exit();
}


$sql = "UPDATE anuncios set foto = '$novoDestino' where id_anuncio = $id_anuncio and id_usuario = $id_usuario ";

mysqli_query($link, $sql);

header('Location: meus_anuncios');


?>