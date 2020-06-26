<?php

session_start();


require_once('db_class.php');


$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " SELECT id_anuncio, titulo, descricao, cidade, estado, categoria, valor, foto, DATE_FORMAT(anuncios.data_publicacao, '%d/%m/%Y - %H:%i') AS data_inclusao_formatada FROM anuncios WHERE data_evento >=  '" . date("Y-m-d") . "' and status = '' ORDER BY data_publicacao DESC ";

$resultado_id = mysqli_query($link, $sql);

$dados_usuario = mysqli_fetch_array($resultado_id);

if ($dados_usuario == NULL) {

  echo '<div class="caixa-anuncio-info group">';
  echo '<div class="row">';
  echo '<div class="col-sm-12">';
  echo '<br><br><br><br><br><br>';
  echo '<div class="row">';
  echo '<div class="col-sm-12">';
  echo '<center><span class="semingressoindex" class="img-responsive">sem ingresso index</span></center>';
  echo '</div>';
  echo '</div>';
  echo '<h3 class="rosa"><B><center>Seja o primeiro a fazer um anúncio!</center></B></h3>';
  echo '<br><br><br>';
  echo '<h4><center><a href="publicar"">Publique seu ingresso</a></center></h4>';
  echo '<br><br><br>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
} else {

  $dados_usuario = 0;

  $resultado_id = mysqli_query($link, $sql);

  if ($resultado_id) {
    while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {

      $registro['titulo']     = htmlspecialchars($registro['titulo']);
      $registro['descricao']  = htmlspecialchars($registro['descricao']);
      $registro['cidade']     = htmlspecialchars($registro['cidade']);
      $registro['estado']     = htmlspecialchars($registro['estado']);
      $registro['categoria']  = htmlspecialchars($registro['categoria']);
      $registro['foto']       = htmlspecialchars($registro['foto']);

      echo '<a href="info_ingressos?ingresso=' . base64_encode($registro['id_anuncio']) . '">';

      echo '<div class="caixa-anuncio group">

        <div class="row">
          <div class="col-sm-12">
          <div class="titulo">
            <B>' . $registro['titulo'] . '</B>
          </div>  
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3" src="img/fundo.png" class="imagem" class="img-responsive">
            <center><img src="' . $registro['foto'] . '" class="imagem" class="img-responsive"></center>
          </div>
          <div class="col-lg-9">
            <div class="row">
              <div class="col-sm-12 ">
                <H4><b>Descri&ccedil;&atilde;o:</b> ' . $registro['descricao'] . '</H4>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12 ">
                <p><b>Local:</b> ' . $registro['cidade'] . ' / ' . $registro['estado'] . '</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 "> 
                <p><b>Categoria:</b> ' . $registro['categoria'] . '</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 valor">  
                <b>R$: ' . $registro['valor'] . '</b>              
              </div>
            </div>
              <div class="row">
                <div class="col-sm-12 ">
                  <p>' . $registro['data_inclusao_formatada'] . '</p>
                </div> 
              </div>
            </div>
          </div>
        </div>';
      echo '</a>';
      echo '<br>';
    }
  } else {
    echo '<div class="caixa-anuncio group">';
    echo '<div class="row ">';
    echo '<div class="titulo" class="col-sm-12">';
    echo '<h3><B><center>Erro na consulta de Anuncios no banco de dados!</center></B></h3>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
}
