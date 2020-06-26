<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
  header('Location: cadastro?erro=1');
}

require_once('db_class.php');

$id_usuario = $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql();


// $sql = " SELECT a.id_anuncio, a.titulo, a.descricao, a.cidade, a.estado, a.categoria, a.valor, a.foto, 
// DATE_FORMAT(a.data_evento, '%d/%m/%Y') AS data_evento_formatada, 
// DATE_FORMAT(a.data_publicacao, '%d/%m/%Y - %H:%i') AS data_inclusao_formatada, p.pergunta, p.resposta, p.id_perguntas
// FROM anuncios AS a
// LEFT OUTER JOIN perguntas AS p ON (a.id_anuncio = p.id_anuncio)
// WHERE a.id_usuario = $id_usuario  and a.data_evento >= '" . date("Y-m-d") . "' and a.status = '' ORDER BY a.data_publicacao DESC 
// ";


// ------------------------------- OLD ------------------------------
$sql = " SELECT id_anuncio, titulo, descricao, cidade, estado, categoria, valor, foto, DATE_FORMAT(anuncios.data_evento, '%d/%m/%Y') AS data_evento_formatada, DATE_FORMAT(anuncios.data_publicacao, '%d/%m/%Y - %H:%i') AS data_inclusao_formatada 
FROM anuncios 
WHERE id_usuario = $id_usuario  and data_evento >= '" . date("Y-m-d") . "' and status = '' ORDER BY data_publicacao DESC ";
// ------------------------------- OLD ------------------------------

$resultado_id = mysqli_query($link, $sql);

$dados_usuario = mysqli_fetch_array($resultado_id);

if ($dados_usuario == NULL) {

  echo '<div class="caixa-anuncio-info  group2">';
  echo '<div class="row">';
  echo '<div class="col-sm-12">';
  echo '<br><br><br><br>';
  echo '<div class="row">';
  echo '<div class="col-sm-12">';
  echo '<center><span class="semingresso" class="img-responsive">sem ingresso</span></center>';
  echo '</div>';
  echo '</div>';
  echo '<h3 class="rosa"><B><center>Você ainda não possui nenhum anúncio!</center></B></h3>';
  echo '<br><br>';
  echo '<h4><center><a href="publicar"">Publique seu ingresso</a></center></h4>';
  echo '<br>';
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

      echo '<div class="caixa-anuncio-info group2">
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
          <div class="row">
          <div class="col-sm-7 "> 
          <p><b>Categoria:</b> ' . $registro['categoria'] . '</p>
          </div>
          <div class="col-sm-5 ">
          <br><br>   
          <p style="text-align: right;"><b><font size="6">R$: ' . $registro['valor'] . '</font></b></p>              
          </div>
          </div>';
      echo '<div class="row">';

      echo '<div class="col-sm-7 ">';
      echo '<p>' . $registro['data_inclusao_formatada'] . '</p>';
      echo '</div> ';

      echo '<div class="col-sm-3 ">';
      echo '<!-- Button trigger modal -->';
      echo '<a href="#" data-toggle="modal" id="alterar-imagem" data-target="#IMAGEMModalCenter' . $registro['id_anuncio'] . '">';
      echo '<h4 style="text-align:right">Alterar Imagem</h4>';
      echo '</a>';
      echo '</div> ';

      // echo '<div class="col-sm-2  ">';
      //   echo '<!-- Button trigger modal -->';
      //   echo '<h4><a href="#"  data-toggle="modal" data-target="#ATUALIZARModalCenterDF' . $registro['id_anuncio'] . '">Perguntas </a></h4>';
      // echo '</div> ';

      echo '<div class="col-sm-1  ">';
      echo '<!-- Button trigger modal -->';
      echo '<h4 style="text-align:right"><a href="#"  data-toggle="modal" data-target="#ATUALIZARModalCenter' . $registro['id_anuncio'] . '">Editar </a></h4>';
      echo '</div> ';

      echo '<div class="col-sm-1  ">';
      echo '<!-- Button trigger modal -->';
      echo '<a href="#" data-toggle="modal" data-target="#EXCLUIRModalCenter' . $registro['id_anuncio'] . '">';
      echo '<h4 style="text-align:right"> Excluir </h4>';
      echo '</a>';
      echo '</div> ';

      echo '</div>';

      echo '</div>';
      echo '</div>';

      $contador = "SELECT COUNT(id_anuncio) FROM perguntas WHERE id_anuncio = " . $registro['id_anuncio'] . " and resposta = ' ' ";
      $contadorpeguntasN = mysqli_query($link, $contador);
      $cont = mysqli_fetch_array($contadorpeguntasN);

      // echo $contador;
      // echo '<hr>';
      // echo $cont['COUNT(id_anuncio)'];


      echo '
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThreer' . $registro['id_anuncio'] . '" aria-expanded="false" aria-controls="collapseThree">';
      if ($cont['COUNT(id_anuncio)'] == 0) {
        echo '<a><h4 style="text-align:right">Não há novas perguntas</h4></a>';
      } else {
        echo '<a><h4 style="text-align:right">' . $cont['COUNT(id_anuncio)'] . ' Perguntas</h4></a>';
      }

      echo '
              </button>
            </h2>
          </div>
        </div>
      </div>
      <div id="collapseThreer' . $registro['id_anuncio'] . '" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">';

      $sqlPERGUNTAS = " SELECT id_perguntas, pergunta, resposta FROM perguntas WHERE id_anuncio = " . $registro['id_anuncio'] . " ORDER BY data_pergunta DESC";

      $resultado_id_perg = mysqli_query($link, $sqlPERGUNTAS);

      while ($registroperguntas = mysqli_fetch_array($resultado_id_perg, MYSQLI_ASSOC)) {


        $registroperguntas['pergunta']   = htmlspecialchars($registroperguntas['pergunta']);
        $registroperguntas['resposta']   = htmlspecialchars($registroperguntas['resposta']);
        echo '<hr>';

        echo '
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree' . $registroperguntas['id_perguntas'] . '" aria-expanded="false" aria-controls="collapseThree">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
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
                -2.17188,-3.14062 -2.17188,-5.25z" fill="#e3f2fd"></path></g></g></g></svg>&nbsp;&nbsp;<span style="font-size:15px;">' . $registroperguntas['pergunta'] . ' </span>
                ';

        if ($registroperguntas['resposta'] != '') {
          echo ' &nbsp;&nbsp;<span style="font-size:15px; color:#31B404"><span class="glyphicon glyphicon-ok"></span></span>';
        } else {
          echo ' &nbsp;&nbsp;<span style="font-size:15px; color:#FF0000"><span class="glyphicon glyphicon-share-alt"></span></span>';
        };
        echo '
        </button>
            </h2>
          </div>
          <div id="collapseThree' . $registroperguntas['id_perguntas'] . '" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">';
        if ($registroperguntas['resposta'] != '') {
          echo '<div class="row">';
            echo '<div class="col-md-11">';
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
            echo'</div>';
            echo '<div class="col-md-1">';
              echo ' &nbsp;&nbsp;&nbsp;
              <a href="get_excluir_resposta.php?er=' . base64_encode($registroperguntas['id_perguntas']) . '"><span style="font-size:17px;"><span class="glyphicon glyphicon-trash"></span></span></a>
              ';
            echo'</div>';
          echo'</div>';
          echo '<br>';
        } else {
          echo '<form id="form_resposta" name="resposta" type="text" method="post" enctype="multipart/form-data" action="get_resposta?r=' . base64_encode($registroperguntas['id_perguntas']) . '">';
          echo '<input class="form-control  input-sm" type="text" id="resposta" name="resposta" placeholder="Responda..." > <br>';
          echo '<div class="text-right" >';
          echo '<button type="submit" class="btn btn-success btn-sm" id="btn-publicar" >Responder</button>';
          echo '</div>';
          echo '</form>';
        }
        echo '
            </div>
          </div>
        </div>
      </div>';
      }

      echo '</div>';


      echo '</div>';
      echo '</div>';

      echo '</div>';
      echo '<br>';

      // echo'<!-- Modal EXCLUIR -->';
      echo '<div class="modal fade" id="EXCLUIRModalCenter' . $registro['id_anuncio'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
      echo '<div class="modal-dialog modal-dialog-centered" role="document">';
      echo '<div class="modal-content">';
      echo '<div class="modal-header">';
      echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
      echo '<span aria-hidden="true">&times;</span>';
      echo '</button>';
      echo '<h3 class="modal-title" id="exampleModalCenterTitle">Tem certeja que deseja excluir?</h3>';
      echo '</div>';
      echo '<div class="modal-body">';
      echo '<h4>O Anúncio ' . $registro['titulo'] . ' foi?</h4>';

      echo '
          <form id="form_excluir_anuncio" method="post" enctype="multipart/form-data" action="get_excluir_anuncio?ex=' . base64_encode($registro['id_anuncio']) . '">
            <div class="row">
              <div class="form-group">
                <div class="col-sm-12">

                  <div class="radio">
                      <label class="checkbox-inline"><input type="radio" name="status" id="status" value="v"> Vendido</label><br>
                      <label class="checkbox-inline"><input type="radio" name="status" id="status" value="f"> Está errado</label><br>
                      <label class="checkbox-inline"><input type="radio" name="status" id="status" value="f"> Desistir de vender</label><br>
                      <label class="checkbox-inline"><input type="radio" name="status" id="status" value="f"> Outro motivo</label><br>
                  </div><br><br>

                  <button type="submit" class="btn btn-danger" id="excluir">Excluir</button>
                </div>
              </div>
            </div>
          </form>
          ';

      echo '</div>'; //fecha body

      echo '<div class="modal-footer">';
      echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button> &nbsp;';
      //echo'<a href="get_excluir_anuncio?ex='.base64_encode($registro['id_anuncio']).'" id="excluir"><button type="button" class="btn btn-danger">Excluir</button></a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';


      // <!-- Modal Atualizar-->
      echo '<div class="modal fade" id="ATUALIZARModalCenter' . $registro['id_anuncio'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
      echo '<div class="modal-dialog modal-dialog-centered" role="document">';
      echo '<div class="modal-content">';
      echo '<div class="modal-header">';
      echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
      echo '<span aria-hidden="true">&times;</span>';
      echo '</button>';
      echo '<h3 class="modal-title" id="exampleModalCenterTitle">Atualizar Anúncio</h3>';
      echo '</div>';
      echo '<div class="modal-body">';
      echo '<form id="form_atualizar_anuncio" method="post" enctype="multipart/form-data" action="get_atualizar_anuncio?at=' . base64_encode(base64_encode($registro['id_anuncio'])) . '"> ';
      echo '<div class="row">';
      echo '<div class="form-group"><div class="col-sm-12">';
      echo '<label for="inputdefault">Titulo da Publicação: *</label>';
      echo '<input class="form-control  input-lg" type="text" id="titulo" maxlength="80" name="titulo" placeholder="' . $registro['titulo'] . '">';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<br><br>';
      echo '<div class="row">';
      echo '<div class="form-group">';
      echo '<div class="col-sm-12">';
      echo '<label for="exampleFormControlTextarea1">Descreva seu ingresso: *</label>';
      echo '<textarea class="form-control input-lg" id="descricao" name="descricao" maxlength="200" rows="5" placeholder="' . $registro['descricao'] . '"/>    ';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<br><br>';
      echo '<div class="row"> ';
      echo '<div class="form-group">';
      echo '<div class="col-sm-12">';
      echo '<label for="exampleFormControlSelect1" placeholder="Categorias">Selecione a categoria do evento: *</label>';
      echo '<select class="form-control input-lg"  id="categoria" name="categoria" placeholder="Categorias" >';
      echo '<option value="categoria" disabled selected>Selecione... </option>';
      echo '<option>Congresso, Seminario</option>';
      echo '<option>Cursos, Workshop</option>';
      echo '<option>Encontros, Networking</option>';
      echo '<option>Espotivo</option>';
      echo '<option>E-sports (Gamer)</option>';
      echo '<option>Feira, Exposição</option>';
      echo '<option>Filme, Cinema e Teatro</option>  ';
      echo '<option>Religioso, Espiritual</option>';
      echo '<option>Show, Musica e Festa</option>';
      echo '<option>Outros Eventos</option> ';
      echo '</select>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<br><br>';
      echo '<label for="inputdefault">Endereço: * </label>';
      echo '<div class="row">';
      echo '<div class="col-sm-12">';
      echo '<div class="form-group">';
      echo '<div class="row ">';
      echo '<div class="col-sm-12">';
      echo '<input type="text" class="form-control input-lg" id="cidade" maxlength="50" name="cidade" placeholder="' . $registro['cidade'] . '">';
      echo '</div>';
      echo '</div>';
      echo '<br>';
      echo '<div class="row ">';
      echo '<div class="col-sm-8">';
      echo '<select class="form-control input-lg"  id="estado" name="estado" placeholder="Estados">
                        <option value="estado" disabled selected>Estados </option>
                        
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="ET">Estrangeiro</option>
                    </select>';
      echo '</div>';
      echo '</div>';
      echo '<br>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<div class="row ">';
      echo '<div class="col-sm-8">';
      echo '<label for="inputdefault">Data Evento: *  ' . $registro['data_evento_formatada'] . '</label>';
      echo '<input class="form-control input-lg" id="data" type="date"  min="' . date("Y-m-d") . '" name="data" placeholder="">';
      echo '</div>';
      echo '</div>';
      echo '<br>';
      echo '<br>';
      echo '<div class="row">';
      echo '<div class="form-group">';
      echo '<div class="col-sm-4">';
      echo '<label for="inputdefault">Valor: *</label>';
      echo '<input class="form-control input-lg money" id="valor" type="text" maxlength="20" name="valor" placeholder="' . $registro['valor'] . '">';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<br>';
      echo '<br>';
      echo '<button type="submit" class="btn btn btn-success" id="btn-atualizar-anuncio">Atualizar</button>';

      echo '</form>  ';
      echo '</div>';
      echo '<div class="modal-footer">';
      echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';

      //<!-- Modal IMAGEM -->
      echo '
      <div class="modal fade" id="IMAGEMModalCenter' . $registro['id_anuncio'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h3 class="modal-title" id="exampleModalCenterTitle">Altere a imagem do anúncio.</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form id="form-imagem" name="imagem" type="text" method="post" enctype="multipart/form-data" action="get_imagem_ingresso?img=' . base64_encode($registro['id_anuncio']) . '">
                          <br><br>
                          <h4><input type="file" name="image" id="foto" class="file"/></h4>
                          <br><br>
                          <input type="submit" value="Atualizar" name="Atualizar" class="btn btn btn-success" id="btn-atualizar-imagem"/>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  </div>
              </div>
          </div>
      </div>';


      echo '<script type="text/javascript">';

      echo "$(document).ready(function(){";
      echo "$('#btn-atualizar-imagem').click(function(){";


      echo "var campo_vazio = false;";

      echo "if($('#foto').val() == ''){";
      echo "$('#foto').css({'color' : '#ff0000'});";
      echo "campo_vazio = true;";
      echo "}else{";
      echo "$('#foto').css({'color' : '#CCC'});";
      echo "}";

      echo "if(campo_vazio) return false;";



      echo "});";

      echo "});";



      echo "$(document).ready(function(){";
      echo '$("#btn-atualizar-anuncio").click(function(){';

      echo "var campo_vazio = false;";

      echo "if($('#titulo').val() == ''){";
      echo "$('#titulo').css({'border-color' : '#ff0000'});";
      echo "campo_vazio = true;";
      echo "}else{";
      echo "$('#titulo').css({'border-color' : '#CCC'});";
      echo "}";

      echo "if($('#descricao').val() == ''){";
      echo "$('#descricao').css({'border-color' : '#ff0000'});";
      echo "campo_vazio = true;";
      echo "}else{";
      echo "$('#descricao').css({'border-color' : '#CCC'});";
      echo "}";

      echo "if($('#cidade').val() == ''){";
      echo "$('#cidade').css({'border-color' : '#ff0000'});";
      echo "campo_vazio = true;";
      echo "}else{";
      echo "$('#cidade').css({'border-color' : '#CCC'});";
      echo "}";

      echo "if($('#estado').val() == ''){";
      echo "$('#estado').css({'border-color' : '#ff0000'});";
      echo "campo_vazio = true;";
      echo "}else{";
      echo "$('#estado').css({'border-color' : '#CCC'});";
      echo "}";

      echo "if($('#valor').val() == ''){";
      echo "$('#valor').css({'border-color' : '#ff0000'});";
      echo "campo_vazio = true;";
      echo "}else{";
      echo "$('#valor').css({'border-color' : '#CCC'});";
      echo "}";

      echo "if(campo_vazio) return false;";

      echo "});";

      echo "});";

      echo '</script>';
    }
  }
}
