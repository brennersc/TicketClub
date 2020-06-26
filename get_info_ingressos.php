<?php

session_start();


require_once('db_class.php');


$id_anuncio = base64_decode($_GET['ingresso']);

$objDb = new db();

$link = $objDb->conecta_mysql();


$sql = " SELECT a.id_anuncio, a.id_usuario, a.titulo, a.descricao, a.cidade, a.estado, a.categoria, a.valor, a.foto,
DATE_FORMAT(a.data_publicacao, '%d/%m/%Y - %H:%i') 
AS data_inclusao_formatada, c.apelido, c.celular, c.wpp, p.pergunta, p.id_perguntas
FROM anuncios AS a 
INNER JOIN cadastro AS c ON (a.id_usuario = c.id_usuario) 
LEFT OUTER JOIN perguntas AS p ON (a.id_anuncio = p.id_anuncio)
WHERE a.id_anuncio = $id_anuncio ORDER BY a.data_publicacao DESC ";


$resultado_id = mysqli_query($link, $sql);


if ($resultado_id) {

  $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

  $sqlPERGUNTAS = " SELECT pergunta, resposta FROM perguntas WHERE id_anuncio = " . $registro['id_anuncio'] . " and resposta != '' ORDER BY data_pergunta DESC";

  $resultado_id_perg = mysqli_query($link, $sqlPERGUNTAS);

  $dados_perg = mysqli_fetch_array($resultado_id_perg);

  if ($registro['wpp'] == 'S') {
    $registro['wpp'] = '- WhatsApp';
  }

  $registro['titulo']     = htmlspecialchars($registro['titulo']);
  $registro['descricao']  = htmlspecialchars($registro['descricao']);
  $registro['cidade']     = htmlspecialchars($registro['cidade']);
  $registro['estado']     = htmlspecialchars($registro['estado']);
  $registro['categoria']  = htmlspecialchars($registro['categoria']);
  $registro['foto']       = htmlspecialchars($registro['foto']);

  echo '
      <div class="caixa-anuncio-info group5">
        <div class="row">
          <div class="col-sm-12">
          <div class="titulo">
            <h2><B>' . $registro['titulo'] . '</B></h2>
          </div>  
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3" src="img/fundo.png" class="imagem" class="img-responsive">
            <center><img src=' . $registro['foto'] . ' class="imagem" class="img-responsive"></center>
          </div>
          <div class="col-lg-9">
            <div class="row">
              <div class="col-sm-12 ">
                <H4><b>Descri&ccedil;&atilde;o:</b> ' . $registro['descricao'] . '</H4>
              </div>
            </div>
            <br>
            <div class="row ">
              <div class="col-sm-12 ">
                <p><b>Local:</b> ' . $registro['cidade'] . ' / ' . $registro['estado'] . '</p>
              </div>
            </div>
            <div class="row ">
              <div class="col-sm-7 "> 
                <p><b>Categoria:</b> ' . $registro['categoria'] . '</p>
              </div>
              <div class="col-sm-5 ">
                <br><br>   
                <p style="text-align: right;"><b><font size="6">R$: ' . $registro['valor'] . '</font></b></p>              
                </div>
              </div>
              <div class="row ">
                <div class="col-sm-12 ">
                  <p>' . $registro['data_inclusao_formatada'] . '</p>
                </div> 
              </div>
            </div>
            </div>';

  echo '<hr>';

  echo '<div class="row ">';
  echo '<div class="titulo" class="col-sm-12">';
  echo '<h3><B>Dados do anunciante para contato</B></h3>';
  echo '</div>';

  echo '<div class="titulo" class="col-sm-12">';
  echo '<h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span><B> ' . $registro['apelido'] . '</B></h4>';
  echo '</div>';

  echo '<div class="titulo" class="col-sm-12">';
  echo '<h4><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><B> ' . $registro['celular'] . ' ' . $registro['wpp'] . '</B></h4>';
  echo '</div>';
  echo '</div>';
  echo '<hr>';
  echo '<h4><B>Perguntas e respostas:</B></h4>';

  $sqlPERGUNTAS = " SELECT pergunta, resposta FROM perguntas WHERE id_anuncio = " . $registro['id_anuncio'] . " and resposta != '' ORDER BY data_pergunta DESC";

  $resultado_id_perg = mysqli_query($link, $sqlPERGUNTAS);

  // $dados_perg = mysqli_fetch_array($resultado_id_perg);
  
  if ($resultado_id_perg) {

    while ($registroperguntas = mysqli_fetch_array($resultado_id_perg, MYSQLI_ASSOC)) {

      $registroperguntas['pergunta']   = htmlspecialchars($registroperguntas['pergunta']);

      $registroperguntas['resposta']   = htmlspecialchars($registroperguntas['resposta']);

      echo '<br>';
      echo '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
      width="25" height="25"
      viewBox="0 0 192 192"
      style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" 
      stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" 
      style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g><g id="surface1">
      <path d="M156,24h-120c-6.625,0 -12,5.375 -12,12v132l34.21875,-32h97.78125c6.625,0 12,-5.375 12,-12v-88c0,-6.625 -5.375,-12 -12,-12z" fill="#3498db"></path>
      <path d="M90.75,93.84375c0,-4.53125 0.54688,-8.125 1.65625,-10.79688c1.10937,-2.6875 3.14062,-5.32812 6.07812,-7.92188c2.95312,-2.59375 4.92188,-4.71875 
      5.89062,-6.34375c0.98438,-1.64063 1.46875,-3.35938 1.46875,-5.17188c0,-5.45312 -2.54688,-8.1875 -7.625,-8.1875c-2.40625,0 -4.32813,0.73438 
      -5.78125,2.20312c-1.45312,1.46875 -2.20312,3.5 -2.26562,6.09375h-14.17188c0.0625,-6.17188 2.07812,-11 6.03125,-14.48438c3.95312,-3.48438 9.34375,
      -5.23438 16.1875,-5.23438c6.90625,0 12.25,1.65625 16.07812,4.96875c3.79688,3.3125 5.70312,7.96875 5.70312,14.01562c0,2.75 -0.60938,5.32812 -1.85938,
      7.76562c-1.23437,2.45312 -3.40625,5.15625 -6.5,8.125l-3.9375,3.71875c-2.48437,2.35937 -3.90625,5.125 -4.26562,8.29687l-0.1875,2.95313zM89.32812,108.67188c0,
      -2.15625 0.75,-3.92188 2.23438,-5.32812c1.48438,-1.40625 3.375,-2.10938 5.6875,-2.10938c2.3125,0 4.20312,0.70312 5.6875,2.10938c1.48438,1.40625 2.21875,3.17187 
      2.21875,5.32812c0,2.10938 -0.71875,3.875 -2.17188,5.25c-1.45312,1.375 -3.35938,2.07812 -5.73438,2.07812c-2.39062,0 -4.29688,-0.70312 -5.75,-2.07812c-1.4375,-1.375 
      -2.17188,-3.14062 -2.17188,-5.25z" fill="#e3f2fd"></path></g></g></g></svg>&nbsp;&nbsp;<span style="font-size:15px;">' . $registroperguntas['pergunta'] . '</span>';
      echo '<br>';
      echo '<br>';
      if ($registroperguntas['resposta'] != '') {
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;">
      <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" s
      troke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
      <path d="M0,192v-192h192v192z" fill="none"></path><g><g id="surface1"><path d="M156,24h-120c-6.625,0 -12,5.375 -12,12v132l34.21875,-32h97.78125c6.625,
      0 12,-5.375 12,-12v-88c0,-6.625 -5.375,-12 -12,-12z" fill="#2ecc71"></path><path d="M90.75,93.84375c0,-4.53125 0.54688,-8.125 1.65625,-10.79688c1.10937,
      -2.6875 3.14062,-5.32812 6.07812,-7.92188c2.95312,-2.59375 4.92188,-4.71875 5.89062,-6.34375c0.98438,-1.64063 1.46875,-3.35938 1.46875,-5.17188c0,-5.45312 
      -2.54688,-8.1875 -7.625,-8.1875c-2.40625,0 -4.32813,0.73438 -5.78125,2.20312c-1.45312,1.46875 -2.20312,3.5 -2.26562,6.09375h-14.17188c0.0625,-6.17188 2.07812,
      -11 6.03125,-14.48438c3.95312,-3.48438 9.34375,-5.23438 16.1875,-5.23438c6.90625,0 12.25,1.65625 16.07812,4.96875c3.79688,3.3125 5.70312,7.96875 5.70312,
      14.01562c0,2.75 -0.60938,5.32812 -1.85938,7.76562c-1.23437,2.45312 -3.40625,5.15625 -6.5,8.125l-3.9375,3.71875c-2.48437,2.35937 -3.90625,5.125 
      -4.26562,8.29687l-0.1875,2.95313zM89.32812,108.67188c0,-2.15625 0.75,-3.92188 2.23438,-5.32812c1.48438,-1.40625 3.375,-2.10938 5.6875,-2.10938c2.3125,
      0 4.20312,0.70312 5.6875,2.10938c1.48438,1.40625 2.21875,3.17187 2.21875,5.32812c0,2.10938 -0.71875,3.875 -2.17188,5.25c-1.45312,1.375 -3.35938,2.07812 
      -5.73438,2.07812c-2.39062,0 -4.29688,-0.70312 -5.75,-2.07812c-1.4375,-1.375 -2.17188,-3.14062 -2.17188,-5.25z" fill="#e3f2fd"></path></g></g></g></svg>&nbsp;&nbsp;';
        echo '<span style="font-size:15px;">' . $registroperguntas['resposta'] . '</span>';
        //echo'<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;&nbsp;<span style="font-size:20px;">'.$registro['pergunta'].'</span>';
        echo '<br>';
      }
    } //while
  } else {
    echo '<div class="caixa-anuncio group">';
    echo '<div class="row ">';
    echo '<div class="titulo" class="col-sm-12">';
    echo '<h3><B><center>Erro na consulta de Anuncios no banco de dados!</center></B></h3>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
  //}
  echo '<hr>';

  if (isset($_SESSION['id_usuario'])) {
    $sessao = $_SESSION['id_usuario'];

    if ($sessao != $registro['id_usuario']) {
      //echo 'pode pergunta';
      echo '<form id="form_pergunta" name="pergunta" type="text" method="post" enctype="multipart/form-data" action="get_pergunta?p=' . base64_encode($id_anuncio) . '">';
      echo '<div class="form-row">';
      echo '<input class="form-control  input-sm" type="text" id="pergunta" name="pergunta" placeholder="Faça uma pergunta" required> <br>';
      echo '<div class="text-right" >';
      echo '<button type="submit" class="btn btn-success btn-sm" id="btn-publicar" >Publicar</button>';
      echo '</div>';
      echo '</div>';
      echo '</form>';
      echo '</div>';
    } else {
      //echo 'nao pode a si mesmo';
      echo '<form id="form_pergunta" name="pergunta" type="text" method="post" enctype="multipart/form-data" action="" disabled>';
      echo '<input class="form-control  input-sm" type="text" id="pergunta" name="pergunta" placeholder="Você não pode perguntar a si mesmo!" disabled> <br>';
      echo '<div class="text-right" >';
      echo '<button type="submit" class="btn btn-success btn-sm" id="btn-publicar" disabled>Publicar</button>';
      echo '</div>';
      echo '</form>';
      echo '</div>';
    }
  } else {
    //echo 'nao pode logue';
    echo '<form id="form_pergunta" name="pergunta" type="text" method="post" enctype="multipart/form-data" action="" disabled>';
    echo '<input class="form-control  input-sm" type="text" id="pergunta" name="pergunta" placeholder="Faça o login para perguntar ao vendedor"disabled > <br>';
    echo '<div class="text-right" >';
    echo '<button type="submit" class="btn btn-success btn-sm" id="btn-publicar" disabled>Publicar</button>';
    echo '</div>';
    echo '</form>';
    echo '</div>';
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

echo '<script>';

echo "$(document).ready(function(){";
  echo '$("#btn-publicar").click(function(){';

  echo "var campo_vazio = false;";

  echo "
  if ($('#pergunta').val() == '') {
    $('#pergunta').css({
        'border-color': 'rgba(255, 0, 0, 0.28)',
        'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
    });
    campo_vazio = true;
} else {
    $('#pergunta').css({
        
        'border-color': '#CCC',
        'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'
    });
}
";

  echo "if(campo_vazio) return false;";

  echo "});";

  echo "});";

  echo '</script>';