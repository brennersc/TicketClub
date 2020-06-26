<?php


    session_start();

	require_once('db_class.php');

    //$id_usuario = $_SESSION['id_usuario'];
    
    $procurar_anuncio = strip_tags(trim(addslashes($_POST['procurar_anuncio'])));

	  $objDb = new db();
    $link = $objDb->conecta_mysql();

    // $sql = "SELECT * FROM anuncios ORDER BY data_publicacao DESC "

   // $sql = "SELECT id_anuncio, titulo, descricao, cidade, estado, categoria, CONCAT(REPLACE(REPLACE(REPLACE(FORMAT(anuncios.valor, 2),'.',';'),',','.'),';',',')) AS valor_For, DATE_FORMAT(anuncios.data_publicacao, '%d/%m/%Y - %H:%i') AS data_inclusao_formatada FROM anuncios WHERE titulo like '%$procurar_anuncio%'  ORDER BY data_publicacao DESC ";

    $sql = " SELECT id_anuncio, titulo, descricao, cidade, estado, categoria, valor, foto, DATE_FORMAT(anuncios.data_publicacao, '%d/%m/%Y - %H:%i') AS data_inclusao_formatada FROM anuncios as anuncios WHERE titulo like '%$procurar_anuncio%' and data_evento >=  '".date("Y-m-d")."' ORDER BY data_publicacao DESC ";

    $resultado_id = mysqli_query($link, $sql);

    $dados_usuario = mysqli_fetch_array($resultado_id);

    $procurar_anuncio = htmlspecialchars($procurar_anuncio);

          echo '<div class="caixa-busca-info group1">';
          echo'<div class="container">';
              echo'<div class="row">';
                echo'<div class="titulo" class="col-sm-12">';
                    echo'<h3><B> Resultados para: '.$procurar_anuncio.'</B></h3>';
                echo'</div>';
                echo '<hr>';
              echo'</div>';
            echo'</div>';
          echo'</div>';

  if($dados_usuario == NULL){
        
          echo'<div class="caixa-anuncio-info  group2">';
            echo'<div class="row">';
              echo'<div class="col-sm-12">';
                  echo'<div class="row">';
                   echo'<center><span class="procurar" class="img-responsive">sem ingressos</span></center>';
                  echo '</div>';
                  echo '<br><br>';
                  echo'<h4 class="#"><B><center>Não houve nenhum resultado para a busca solicitada!</center></B></h4>';
                  echo '<br>';
              echo'</div>';
            echo'</div>';
          echo'</div>';

    }else{

      $dados_usuario = 0;

      $resultado_id = mysqli_query($link, $sql);

      if($resultado_id){
        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

        $registro['titulo']     = htmlspecialchars($registro['titulo']);
        $registro['descricao']  = htmlspecialchars($registro['descricao']);
        $registro['cidade']     = htmlspecialchars($registro['cidade']);
        $registro['estado']     = htmlspecialchars($registro['estado']);
        $registro['categoria']  = htmlspecialchars($registro['categoria']);
        $registro['foto']       = htmlspecialchars($registro['foto']);

        echo'<a href="info_ingressos?ingresso=' .base64_encode($registro['id_anuncio']). '">';
          echo'
      <div class="caixa-anuncio group1">

        <div class="row">
          <div class="col-sm-12">
            <div class="titulo"><B>'.$registro['titulo'].'</B></div>  
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-3" src="img/fundo.png" class="imagem" class="img-responsive">
            <center><img src='.$registro['foto'].' class="imagem" class="img-responsive"></center>
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
        
        echo'</a>';
        echo '<br>';
        }
      
        echo '<hr style="height:2px; border:none; color:#FF1493; background-color:#FF1493; margin-top: 0px; margin-bottom: 15px;">';

    } else {
        
       echo '<div class="caixa-anuncio group1">';
            echo'<div class="row ">';
              echo'<div class="titulo" class="col-sm-12">';
                  echo'<h3><B><center>Erro na consulta de Anuncios no banco de dados!</center></B></h3>';
              echo'</div>';
            echo'</div>';
        echo'</div>';
    }
  }

?>