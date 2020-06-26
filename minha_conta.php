<?PHP
session_start();

if (!isset($_SESSION['id_usuario'])) {
  header('Location: cadastro?erro=1');
}

require_once('db_class.php');

$id_usuario = $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "SELECT apelido FROM cadastro where id_usuario = $id_usuario";

$resultado_id = mysqli_query($link, $sql);

$dados_usuario = mysqli_fetch_array($resultado_id);

// if ($dados_usuario == NULL) {
//   echo "<script>alert('MAS ANTES, COMPLETE SEU CADASTRO!');</script>";
// }

?>
<?PHP
$senhaerrada              = isset($_GET['senhaerrada']) ? $_GET['senhaerrada'] : 0;
$senhasdiferentes       = isset($_GET['senhasdiferentes']) ? $_GET['senhasdiferentes'] : 0;
$sucesso           = isset($_GET['sucesso']) ? $_GET['sucesso'] : 0;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php
  if ($dados_usuario == NULL) {
    echo "<script>alert('MAS ANTES, COMPLETE SEU CADASTRO!');</script>";
  }
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Minha Conta - Ticket Club</title>
  <link rel="icon" href="img/icon.png">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/estilo.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <!-- Mascaras -->
  <script src="js/jquery.mask.min.js" type="text/javascript"></script>
  <script src="js/bootstrap-notify.min.js" type="text/javascript"></script>
  <!-- Mascaras -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <script type="text/javascript">
    $(document).ready(function() {

      $('.phone').mask('(00) 00000-0000');
      $('.cpf').mask('000.000.000-00', {
        reverse: true
      });
      $('.cep').mask('00000-000');

    });



    $(document).ready(function() {

      $('#btn-salvar').click(function() {

        var campo_vazio = false;

        if ($('#nome').val() == '') {
          $('#nome').css({
            'border-color': 'rgba(255, 0, 0, 0.28)',
            'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
          });
          campo_vazio = true;
        } else {
          $('#nome').css({
            'border-color': '#CCC',
            'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'
          });
        }

        if ($('#apelido').val() == '') {
          $('#apelido').css({
            'border-color': 'rgba(255, 0, 0, 0.28)',
            'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
          });
          campo_vazio = true;
        } else {
          $('#apelido').css({
            'border-color': '#CCC',
            'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'
          });
        }
        if ($('#cpf').val() == '') {
          $('#cpf').css({
            'border-color': 'rgba(255, 0, 0, 0.28)',
            'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
          });
          campo_vazio = true;
        } else {
          $('#cpf').css({
            'border-color': '#CCC',
            'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'
          });
        }
        if ($('#celular').val() == '') {
          $('#celular').css({
            'border-color': 'rgba(255, 0, 0, 0.28)',
            'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
          });
          campo_vazio = true;
        } else {
          $('#celular').css({
            'border-color': '#CCC',
            'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'
          });
        }
        if ($('#sexo').val() == '') {
          $('#sexo').css({
            'border-color': 'rgba(255, 0, 0, 0.28)',
            'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
          });
          campo_vazio = true;
        } else {
          $('#sexo').css({
            'border-color': '#CCC',
            'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'
          });
        }

        if (campo_vazio) return false;

      });

    });




    $(document).ready(function() {
      function atualizainfo_cadastro() {
        $.ajax({
          url: 'get_info_cadastro',
          success: function(data) {
            $('#info_cadastro').html(data);
          }
        });
      }
      atualizainfo_cadastro();
    });
  </script>

</head>

<body>

  <!-- Barra navegação -->

  <?php include('header.php'); ?>

  <div class="espaço"></div>

  <section id="servicos">

    <div class="container">
      <br /><br />

      <ul class="nav nav-tabs">
        <li><a href="meus_anuncios">
            <h5><b>Meus Anúncios</b></h5>
          </a></li>
        <li class="active"><a data-toggle="tab" href="#home">
            <h5><b>Minha Conta</b></h5>
          </a></li>
        <!-- <li><a href="#"><h5><b>Chat</b></h5></a></li> -->
      </ul>

      <div id="home" class="tab-pane fade in active">
        <div class="cont-usuario ">
          <div class="caixa-usuario-2">
            <div class="row ">
              <div class="col-sm-12">
                <h3><B>MEUS DADOS</B></h3>
                <hr>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-sm-6">
                <form id="form_cadastrar" name="cadastro_completo" type="text" method="post" enctype="multipart/form-data" action="get_cadastro_completo">
                  <div class="row">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="inputdefault">Nome Completo: *</label>
                        <input class="form-control  input-lg" type="text" id="nome" name="nome" placeholder="Nome Completo">
                      </div>
                    </div>
                  </div>

                  <br><br>

                  <div class="row">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="inputdefault">Apelido: *</label>
                        <input class="form-control  input-lg" type="text" id="apelido" name="apelido" placeholder="Apelido">
                      </div>
                    </div>
                  </div>

                  <br><br>

                  <div class="row">
                    <div class="form-group">
                      <div class="col-sm-6">
                        <label for="inputdefault">CPF: *</label>
                        <p>(somente números)</p>
                        <input class='form-control  input-lg cpf' type='text' class="" name='cpf' id='cpf' maxlength='11' placeholder='Ex.: 000-000-000.00'>
                      </div>
                    </div>
                  </div>

                  <br><br>

                  <div class="row">
                    <div class="form-group">
                      <div class="col-sm-6">
                        <label for="inputdefault">Sexo: *</label>
                        <div class="radio">
                          <label class="checkbox-inline"><input type="radio" name="sexo" id="sexo" value="M"> Masculino</label>
                          <label class="checkbox-inline"><input type="radio" name="sexo" id="sexo" value="F"> Feminino</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <br><br>

                  <div class="row">
                    <div class="form-group">
                      <div class="col-sm-6">
                        <label for="inputdefault">Celular: *</label>
                        <p>(somente números)</p>
                        <input class='form-control  input-lg phone' type='text' name='celular' id='celular' maxlength='12' placeholder='Ex.: (99) 99999-999'><br>
                        <label class="checkbox-inline"><input type="checkbox" name="wpp" id="wpp" value="S">WHATSAPP?</label>
                      </div>
                    </div>
                  </div>

                  <br><br>

                  <label for="inputdefault">Endereço: </label>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="row ">
                          <div class="col-sm-12">
                            <input type="text" class="form-control input-lg" name="cidade" id="cidade" placeholder="Cidade">
                          </div>
                        </div></br>

                        <div class="row ">
                          <div class="col-sm-8">
                            <!-- <input type="text" class="form-control input-lg" id="estado" name="estado" placeholder="Estado"> -->
                            <select class="form-control input-lg" placeholder="Estados" id="estado" name="estado">
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
                            </select>
                          </div>
                        </div></br>

                        <div class="row ">
                          <div class="col-sm-6">
                            <input type="text" class="form-control input-lg cep" id="cep" maxlength="8" class="cep" name="cep" placeholder="CEP">
                          </div>
                        </div></br>

                        <div class="row ">
                          <div class="col-sm-4">
                            <input type="text" class="form-control input-lg" id="numero" name="numero" placeholder="Número">
                          </div>

                          <div class="col-sm-8">
                            <input type="text" class="form-control input-lg" id="complemento" name="complemento" placeholder="Complemento">
                          </div>
                        </div></br>
                      </div>
                    </div>
                  </div>
                  </br>

                  <div class="row">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-publicar" id="btn-salvar">Salvar</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <div class="col-sm-6">

                <div id="info_cadastro" class="group6"></div>
                <br>

                <div class="row ALIGN=" CENTER" ">
              <div class=" col-sm-3 "></div>

              <div class=" col-sm-6 cinza">
                  <h3>Altere sua senha.</h3>

                  <form method="post" action="get_alterar_senha" id="senha"><br>
                    <input class="form-control" type="password" name="senha" value="" placeholder="Digite sua senha ATUAL" /><br>
                    <input class="form-control" type="password" name="novasenha" value="" placeholder="Digite sua senha nova" /><br>
                    <input class="form-control" type="password" name="confirmanovasenha" value="" placeholder="Confirme sua senha" />
                    <br>
                    <input class="btn btn-cadastro" type="submit" value="Enviar" />
                  </form>
                  <?php
                  if ($sucesso) {
                    echo '<br><span class="sucesso3"><span  class="glyphicon glyphicon-ok"> <b class="sucesso3">SENHA ALTERADA COM SUCESSO.<p></b></span></span>';
                  }
                  if ($senhaerrada) {
                    echo '<br><span class="erro_usuario">Senha atual errada!</span></p>';
                  }
                  if ($senhasdiferentes) {
                    echo '<br><span class="erro_usuario">Senhas Diferentes!</span></p>';
                  }
                  ?>
                  <br>
                </div>
              </div>

            </div>
          </div>
        </div><!-- fecha caixa-usuario-2  !-->
      </div><!--   fecha cont-usuario !-->
    </div><!--   menu1 !-->

    </div><!--   tab-content !-->
    </div> <!-- FECHA CONTAINER -->

    <br /><br /><br />

  </section>
</body>
<main></main>

<!-- rodape -->

<?php include('footer.php'); ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="../js/jquery.mask.min.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>