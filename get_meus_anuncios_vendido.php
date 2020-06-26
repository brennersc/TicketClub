<?php

session_start();

      if(!isset($_SESSION['id_usuario'])){
          header('Location: cadastro?erro=1');
      }

require_once('db_class.php');

$id_usuario = $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " SELECT id_anuncio, titulo, descricao, cidade, estado, categoria, valor, foto, data_evento, status, DATE_FORMAT(anuncios.data_publicacao, '%d/%m/%Y - %H:%i') AS data_inclusao_formatada FROM anuncios WHERE id_usuario = $id_usuario and status = 'v' ORDER BY data_publicacao DESC ";


  $resultado_id = mysqli_query($link, $sql);

  if($resultado_id){
    while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){


    $registro['titulo']     = htmlspecialchars($registro['titulo']);
    $registro['descricao']  = htmlspecialchars($registro['descricao']);
    $registro['cidade']     = htmlspecialchars($registro['cidade']);
    $registro['estado']     = htmlspecialchars($registro['estado']);
    $registro['categoria']  = htmlspecialchars($registro['categoria']);
    $registro['foto']       = htmlspecialchars($registro['foto']);
       
    echo'<div class="caixa-anuncio-vendido group15">
        <div class="row">
        <div class="col-sm-12">
        <div class="titulo">
            <B>'.$registro['titulo'].'</B>
        </div>  
        </div>
        </div>
        <div class="row">
        <div class="col-lg-3" ">
            <center>
            <img src="'.$registro['foto'].'" class="imagem" class="img-responsive"> 
            </center>
        </div>
        <div class="col-lg-9">
            <div class="row">
            <div class="col-sm-12 ">
                <H4><b>Descri&ccedil;&atilde;o:</b> '.$registro['descricao'].'</H4>
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-sm-12 ">
                <p><b>Local:</b> '.$registro['cidade'].' / '.$registro['estado'].'</p>
            </div>
            
            </div>
            <div class="row">
            <div class="col-sm-12 "> 
                <p><b>Categoria:</b> '.$registro['categoria'].'</p>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-12 valor">  
                <b>R$: '.$registro['valor'].'</b>              
            </div>
            </div>
            <div class="row">
                <div class="col-sm-12 ">
                <p>'.$registro['data_inclusao_formatada'].'</p>
                </div> 
            </div>
            </div>
        </div>
      
    </div>';
    }       
    
  }else{

    echo '<div class="caixa-anuncio group">';
    echo'<div class="row ">';
    echo'<div class="titulo" class="col-sm-12">';
    echo'<h3><B><center>Erro!</center></B></h3>';
    echo'</div>';
    echo'</div>';
    echo'</div>';
  }
