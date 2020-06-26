<?php

    session_start();

      if(!isset($_SESSION['id_usuario'])){
          header('Location: cadastro?erro=1');
      }

	require_once('db_class.php');

	$id_usuario = $_SESSION['id_usuario'];

	$objDb = new db();
  $link = $objDb->conecta_mysql();
 

  $sql = "SELECT c.nome, c.apelido, c.cidade, c.estado, c.cep,c.numero, c.complemento, c.cpf, c.celular, c.wpp, DATE_FORMAT(c.data_cadastro, '%d/%m/%Y - %H:%i') AS data_cadastro_formatada, u.email FROM cadastro AS c JOIN usuarios AS u ON (c.id_usuario = u.id) where id_usuario = '$id_usuario'";


  $resultado_id = mysqli_query($link, $sql);

  $dados_usuario = mysqli_fetch_array($resultado_id);


    if($dados_usuario == NULL){
        
          echo'<div class="row group6">';
              echo'<div class="col-sm-12">';
                  echo'<h1><center>Complete seu cadastro!</center></h1>';
                  echo'<br>';
                  echo'<h4><center>Preencha o formulário abaixo. <p>Isso facilita sua comunicação com o comprador!</center></h4>';
                  echo'<br><br><br><br><br><br><br><br>';
              echo'</div>';
          echo'</div>';


    }else{

      $dados_usuario = 0;

      $resultado_id = mysqli_query($link, $sql);

      if($resultado_id){
        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

          $registro['apelido']     = htmlspecialchars($registro['apelido']);
          $registro['nome']        = htmlspecialchars($registro['nome']);
          $registro['cidade']      = htmlspecialchars($registro['cidade']);
          $registro['estado']      = htmlspecialchars($registro['estado']);
          $registro['complemento'] = htmlspecialchars($registro['complemento']);

        if($registro['wpp'] == 'S'){
          $registro['wpp'] = '- WhatsApp';
          }

            echo'<div class="row group6  ">';
              echo'<div class="col-sm-12">';
                  echo'<h2><B>'.$registro['apelido'].'</B></h2>';
              echo'</div>';
            echo'</div>';


              echo'<div class="row ">';
                  echo'<div class="col-sm-12">';

                    echo'<div class="row">'  ;
                      echo'<div class="col-sm-12">';
                        echo'<H4><b>Nome:</b> '.$registro['nome'].'</H4>';
                      echo'</div>';
                    echo'</div>';

                    echo'<div class="row">'  ;
                      echo'<div class="col-sm-12">';
                        echo'<p><b><h4>Cpf:</b> '.$registro['cpf'].'</h4></p>';
                      echo'</div>';
                    echo'</div>';

                    echo'<div class="row">'  ;
                      echo'<div class="col-sm-12">';
                        echo'<p><b><h4>Email:</b> '.$registro['email'].'</h4></p>';
                      echo'</div>';
                    echo'</div>';
                  
                    echo'<div class="row">';
                        echo'<div class="col-sm-12">';
                          echo '<p><h4><b>Local:</b> '.$registro['cidade'].' / '.$registro['estado'].' - '.$registro['cep'].'</h4></p>';
                        echo'</div>' ;
                    echo'</div>';

                    echo'<div class="row">';
                        echo'<div class="col-sm-12">';
                          echo '<p><h4><b></b>'.$registro['complemento'].' - '.$registro['numero'].'</h4></p>';
                        echo'</div>' ;
                    echo'</div>';

                    echo'<div class="row">';
                      echo'<div class="col-sm-12"> ';
                           echo'<p></h4><b>Telefone:</b> '.$registro['celular'].' '.$registro['wpp'].'</h4></p>';
                      echo'</div>';
                    echo'</div>';

                     echo'<div class="row">';
                        echo'<div class="col-sm-12">';
                          echo'<p> <b>Atualizado em: </b>'.$registro['data_cadastro_formatada'].'</p>';
                        echo'</div> ';
                    echo'</div>';
                    echo'(Somente você e a Ticket Club tem essas informaçôes, nenhum outro usuário)';
                    echo '<br><br>';
                  echo'</div>';
              echo'</div>';   
      }

  } else {
    echo '<div class=" group">';
            echo'<div class="row ">';
              echo'<div class="titulo" class="col-sm-12">';
                  echo'<h3><B><center>Erro na consulta de Anuncios no banco de dados!</center></B></h3>';
              echo'</div>';
            echo'</div>';
        echo'</div>';
          }
        }
