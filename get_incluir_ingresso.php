<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: cadastro?erro=1');
}

require_once('db_class.php');

if (($_POST['categoria'] == '') or ($_POST['estado'] == '')) {

    header('Location: publicar?erro=1');
    exit();
}

$titulo     =   strip_tags(trim(addslashes($_POST['titulo'])));
$descricao  =   strip_tags(trim(addslashes($_POST['descricao'])));
$categoria  =   strip_tags(trim(addslashes($_POST['categoria'])));
$cidade     =   strip_tags(trim(addslashes($_POST['cidade'])));
$estado     =   strip_tags(trim(addslashes($_POST['estado'])));
$valor      =   strip_tags(trim(addslashes($_POST['valor'])));
$data       =   strip_tags(trim(addslashes($_POST['data'])));

$id_usuario =   $_SESSION['id_usuario'];
$foto = $_FILES['image']['tmp_name'];

$tamanho_permitido = 2048000; //2 MB
$pasta = 'uploads';

$objDb = new db();
$link = $objDb->conecta_mysql();

if ($titulo == '' || $descricao == '' || $cidade == '' || $estado == '' || $categoria == '' || $valor == '' || $id_usuario == '') {
    header('Location: publicar?erro=1');
    exit();
}

$sql = "SELECT COUNT(id_usuario) FROM anuncios WHERE id_usuario = '$id_usuario' and data_evento >= '" . date("Y-m-d") . "' and status = '' ";

$resultado_id = mysqli_query($link, $sql);

$qnt = mysqli_fetch_array($resultado_id);

if ($qnt['COUNT(id_usuario)'] < 3) {


    if (!empty($foto)) {
        $file = getimagesize($foto);

        //TESTA O TAMANHO DO ARQUIVO
        if ($_FILES['image']['size'] > $tamanho_permitido) {

            header('Location: publicar?arquivo_grande=1');
            //echo "erro - arquivo muito grande";
            exit();
        }

        //TESTA A EXTENSÃO DO ARQUIVO
        if (!preg_match('/^image\/(?:gif|jpg|jpeg|png)$/i', $file['mime'])) {

            header('Location: publicar?extensao=1');
            //echo "erro - arquivo não é imagem";
            exit();
        }

        //CAPTURA A EXTENSÃO DO ARQUIVO
        $extensao = str_ireplace("/", "", strchr($file['mime'], "/"));

        //MONTA O CAMINHO DO NOVO DESTINO
        $novoDestino = "{$pasta}/foto" . uniqid('', true) . '.' . $extensao;
        move_uploaded_file($foto, $novoDestino);
    }

    if ($novoDestino == '') {
        //$novoDestino = 'uploads/default.png';
        header('Location: publicar?arquivo_grande=1');
        exit();
    }

    $sql = "INSERT INTO anuncios(id_usuario, titulo, descricao, categoria, cidade, estado, valor, data_evento, foto)
        VALUES('$id_usuario', '$titulo', '$descricao', '$categoria', '$cidade', '$estado', '$valor','$data', '$novoDestino')";


    mysqli_query($link, $sql);

    header('Location: meus_anuncios');
} else {
    die();
}
