<?php

session_start();

      if(!isset($_SESSION['id_usuario'])){
          header('Location: cadastro?erro=1');
      }

require_once('db_class.php');

$id_usuario = $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " SELECT id_anuncio, titulo, descricao, cidade, estado, categoria, valor, foto, DATE_FORMAT(anuncios.data_publicacao, '%d/%m/%Y - %H:%i') AS data_inclusao_formatada FROM anuncios ORDER BY data_publicacao DESC ";

$resultado_id = mysqli_query($link, $sql);

$dados_usuario = mysqli_fetch_array($resultado_id);

if($dados_usuario == NULL){

  echo'<div class="caixa-anuncio-info  group2">';
    echo'<div class="row">';
      echo'<div class="col-sm-12">';
        echo '<br><br><br><br><br><br>';
        echo'<div class="row">';
          echo'<div class="col-sm-12">';
            echo'<center><span class="semingresso" class="img-responsive">sem ingresso</span></center>';
          echo '</div>';
        echo '</div>';
        echo'<h3 class="rosa"><B><center>Você ainda não possui nenhum anúncio!</center></B></h3>';
        echo '<br><br><br>';
        echo'<h4><center><a href="publicar"">Publique seu ingresso</a></center></h4>';
        echo '<br><br><br>';
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
    
      echo '<div class="caixa-anuncio-info group2">
      <div class="row">
      <div class="col-sm-12">
      <div class="titulo">
      <h2><B>'.$registro['titulo'].'</B></h2>
      </div>  
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
      <div class="row ">
      <div class="col-sm-12 ">
      <p><b>Local:</b> '.$registro['cidade'].' / '.$registro['estado'].'</p>
      </div>
      </div>
      <div class="row">
      <div class="col-sm-7 "> 
      <p><b>Categoria:</b> '.$registro['categoria'].'</p>
      </div>
      <div class="col-sm-5 ">
      <br><br>   
      <p style="text-align: right;"><b><font size="6">R$: '.$registro['valor'].'</font></b></p>              
      </div>
      </div>';
      echo'<div class="row">';

      echo'<div class="col-sm-7 ">';
      echo'<p>'.$registro['data_inclusao_formatada'].'</p>';
      echo'</div> ';

      echo'<div class="col-sm-3  ">';                          
      echo'<!-- Button trigger modal -->';
      echo'<a href="#" data-toggle="modal" id="alterar-imagem" data-target="#IMAGEMModalCenter'.$registro['id_anuncio'].'">';
      echo'<h4>Alterar Imagem</h4>';
      echo'</a>';
      echo'</div> ';

      echo'<div class="col-sm-1  ">';
      echo'<!-- Button trigger modal -->';
      echo'<h4><a href="#"  data-toggle="modal" data-target="#ATUALIZARModalCenter'.$registro['id_anuncio'].'">Editar </a></h4>';
      echo'</div> ';

      echo'<div class="col-sm-1  ">';                          
      echo'<!-- Button trigger modal -->';
      echo'<a href="#" data-toggle="modal" data-target="#EXCLUIRModalCenter'.$registro['id_anuncio'].'">';
      echo'<h4>Excluir</h4>';
      echo'</a>';
      echo'</div> ';
      
      echo'</div>';
      echo'
      </div>
      </div>
      </div>
      </div>';
      echo'</div>';
      echo'<br>';

      // echo'<!-- Modal EXCLUIR -->';
      echo'<div class="modal fade" id="EXCLUIRModalCenter'.$registro['id_anuncio'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
        echo'<div class="modal-dialog modal-dialog-centered" role="document">';
          echo'<div class="modal-content">';
            echo'<div class="modal-header">';
              echo'<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                echo'<span aria-hidden="true">&times;</span>';
              echo'</button>';
              echo'<h3 class="modal-title" id="exampleModalCenterTitle">Tem certeja que deseja excluir?</h3>';
            echo'</div>';
            echo'<div class="modal-body">';
              echo'<h4>O Anúncio '.$registro['titulo'].'</h4>';
            echo'</div>';
            echo'<div class="modal-footer">';
              echo'<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button> &nbsp;';
              echo'<a href="get_excluir_anuncio?ex='.base64_encode($registro['id_anuncio']).'" id="excluir"><button type="button" class="btn btn-danger">Excluir</button></a>';
            echo'</div>';
          echo'</div>';
        echo'</div>';
      echo'</div>';


      // <!-- Modal Atualizar-->
          echo'<div class="modal fade" id="ATUALIZARModalCenter'.$registro['id_anuncio'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
            echo'<div class="modal-dialog modal-dialog-centered" role="document">';
              echo'<div class="modal-content">';
                echo'<div class="modal-header">';                               
                  echo'<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo'<span aria-hidden="true">&times;</span>';
                  echo'</button>';
                  echo'<h3 class="modal-title" id="exampleModalCenterTitle">Atualizar Anúncio</h3>';
                echo'</div>';
                echo'<div class="modal-body">';
                 echo'<form id="form_atualizar_anuncio" method="post" enctype="multipart/form-data" action="get_atualizar_anuncio?at='.base64_encode(base64_encode($registro['id_anuncio'])).'"> ';
                      echo'<div class="row">';
                        echo'<div class="form-group"><div class="col-sm-12">';
                          echo'<label for="inputdefault">Titulo da Publicação</label>';
                          echo'<input class="form-control  input-lg" type="text" id="titulo" maxlength="80" name="titulo" placeholder="'.$registro['titulo'].'">';
                        echo'</div>';
                      echo'</div>';
                    echo'</div>';
                    echo'<br><br>';
                    echo'<div class="row">';
                      echo'<div class="form-group">';
                        echo'<div class="col-sm-12">';
                          echo'<label for="exampleFormControlTextarea1">Descreva seu ingresso</label>';
                          echo'<textarea class="form-control input-lg" id="descricao" name="descricao" maxlength="200" rows="5" placeholder="'.$registro['descricao'].'"/>    ';      
                        echo'</div>';
                      echo'</div>';
                    echo'</div>';
                    echo'<br><br>';
                    echo'<div class="row"> ';
                      echo'<div class="form-group">';
                        echo'<div class="col-sm-12">';
                          echo'<label for="exampleFormControlSelect1" placeholder="Categorias">Selecione a categoria do evento</label>';
                          echo'<select class="form-control input-lg" id="categoria" name="categoria" placeholder="Show, Musica e Festa">';
                            echo'<option>Congresso, Seminario</option>';
                            echo'<option>Cursos, Workshop</option>';
                            echo'<option>Encontros, Networking</option>';
                            echo'<option>Espotivo</option>';
                            echo'<option>E-sports (Gamer)</option>';
                            echo'<option>Feira, Exposição</option> ';
                            echo'<option>Filme, Cinema e Teatro</option>  ';
                            echo'<option>Religioso, Espiritual</option>';
                            echo'<option>Show, Musica e Festa</option>';
                            echo'<option>Outros Eventos</option>';
                          echo'</select>';
                        echo'</div>';
                      echo'</div>';
                    echo'</div>';
                    echo'<br><br>';
                    echo'<label for="inputdefault">Endereço: </label>';
                    echo'<div class="row">';
                      echo'<div class="col-sm-12">';
                        echo'<div class="form-group">';
                          echo'<div class="row ">';
                            echo'<div class="col-sm-12">';   
                              echo'<input type="text" class="form-control input-lg" id="cidade" maxlength="50" name="cidade" placeholder="'.$registro['cidade'].'">';
                            echo'</div>';
                          echo'</div>';
                          echo'<br>';
                          echo'<div class="row ">';
                            echo'<div class="col-sm-8">';
                              echo'<input type="text" class="form-control input-lg" id="estado" maxlength="50" name="estado" placeholder="'.$registro['estado'].'">';
                            echo'</div>';
                          echo'</div>';
                          echo'<br>';
                        echo'</div>';
                      echo'</div>';
                    echo'</div>';
                    echo'<div class="row">';
                      echo'<div class="form-group">';
                        echo'<div class="col-sm-4">';
                          echo'<label for="inputdefault">Valor</label>';
                          echo'<input class="form-control input-lg money" id="valor" type="text" maxlength="20" name="valor" placeholder="'.$registro['valor'].'">'; 
                           echo'</div>';
                      echo'</div>';
                    echo'</div>';
                    echo'<br>';
                    
                    echo'<button type="submit" class="btn btn btn-success" id="btn-atualizar-anuncio">Atualizar</button>';

                  echo'</form>  ';
                echo'</div>';
                echo'<div class="modal-footer">';
                  echo'<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>';
                echo'</div>';
              echo'</div>';
            echo'</div>';
          echo'</div>';

//<!-- Modal IMAGEM -->
          echo'
          <div class="modal fade" id="IMAGEMModalCenter'.$registro['id_anuncio'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h3 class="modal-title" id="exampleModalCenterTitle">Altere a imagem do anúncio.</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form id="form-imagem" name="imagem" type="text" method="post" enctype="multipart/form-data" action="get_imagem_ingresso?img='.base64_encode($registro['id_anuncio']).'">
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


          echo'<script type="text/javascript">';

          echo"$(document).ready(function(){";
          echo"$('#btn-atualizar-imagem').click(function(){";
         

          echo"var campo_vazio = false;";

          echo"if($('#foto').val() == ''){";
          echo"$('#foto').css({'color' : '#ff0000'});";
          echo"campo_vazio = true;";
          echo"}else{";
          echo"$('#foto').css({'color' : '#CCC'});";
          echo"}";

          echo"if(campo_vazio) return false;";

          

          echo"});";

          echo"});";
          


          echo"$(document).ready(function(){";
          echo'$("#btn-atualizar-anuncio").click(function(){';

          echo"var campo_vazio = false;";

          echo"if($('#titulo').val() == ''){";
          echo"$('#titulo').css({'border-color' : '#ff0000'});";
          echo"campo_vazio = true;";
          echo"}else{";
          echo"$('#titulo').css({'border-color' : '#CCC'});";
          echo"}";

          echo"if($('#descricao').val() == ''){";
          echo"$('#descricao').css({'border-color' : '#ff0000'});";
          echo"campo_vazio = true;";
          echo"}else{";
          echo"$('#descricao').css({'border-color' : '#CCC'});";
          echo"}";

          echo"if($('#cidade').val() == ''){";
          echo"$('#cidade').css({'border-color' : '#ff0000'});";
          echo"campo_vazio = true;";
          echo"}else{";
          echo"$('#cidade').css({'border-color' : '#CCC'});";
          echo"}";

          echo"if($('#estado').val() == ''){";
          echo"$('#estado').css({'border-color' : '#ff0000'});";
          echo"campo_vazio = true;";
          echo"}else{";
          echo"$('#estado').css({'border-color' : '#CCC'});";
          echo"}";

          echo"if($('#valor').val() == ''){";
          echo"$('#valor').css({'border-color' : '#ff0000'});";
          echo"campo_vazio = true;";
          echo"}else{";
          echo"$('#valor').css({'border-color' : '#CCC'});";
          echo"}";

          echo"if(campo_vazio) return false;";

          echo"});";

          echo"});";

          echo'</script>';
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
}


?>