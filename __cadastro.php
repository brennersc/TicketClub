<?php

$erro              = isset($_GET['erro']) ? $_GET['erro'] : 0;
$erro_email        = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
$sucesso           = isset($_GET['sucesso']) ? $_GET['sucesso'] : 0;

$erro_senha        = isset($_GET['erro_senha']) ? $_GET['erro_senha'] : 0;
$preencher         = isset($_GET['preencher']) ? $_GET['preencher'] : 0;
$cadastro_naoconfirmado = isset($_GET['cadastro_naoconfirmado']) ? $_GET['cadastro_naoconfirmado'] : 0;


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Cadastro - Ticket Club</title>
  <link rel="icon" href="img/icon.png">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/estilo.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <script src="js/bootstrap-notify.min.js" type="text/javascript"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script>
    //verificar se os campos de usuário e senha foram devidamente preenchidos
    $(document).ready(function() {

      $('#btn_login').click(function() {

        var campo_vazio = false;

        if ($('#campo_usuario').val() == '') {
          $('#campo_usuario').css({
            'border-color': '#ff0000'
          });
          $('#campo_usuario1').css({
            'color': '#ff0000'
          });
          campo_vazio = true;
        } else {
          $('#campo_usuario').css({
            'border-color': '#CCC'
          });
          $('#campo_usuario1').css({
            'color': '#555'
          });
        }

        if ($('#campo_senha').val() == '') {
          $('#campo_senha').css({
            'border-color': '#ff0000'
          });
          $('#campo_senha1').css({
            'color': '#ff0000'
          });
          campo_vazio = true;
        } else {
          $('#campo_senha').css({
            'border-color': '#CCC'
          });
          $('#campo_senha1').css({
            'color': '#555'
          });
        }

        if (campo_vazio) return false;

      });

    });
  </script>
</head>

<body>

  <!-- Barra navegação -->
  <!-- RODAPE -->

  <?php include('header.php'); ?>

  <br /><br /><br /><br /><br /><br /><br />

  <div class="capa">
    <div class="texto-capa">
      <div class="capa-cadastro">
        <h2><span class="titulo-cadastro">Faça seu login ou crie uma conta gratuita!</span></h2><br /><br />

        <h4>Veja todos os ingressos em um só lugar. </h4>
        <h4>Publique seus ingressos de forma rápida
          e fácil, altere seu perfil com segurança.</h4>
      </div>
    </div>
  </div>

  <br /><br /><br />


  <section id="servicos">
    <div class="container">
      <?php
      if ($sucesso) {
        ?>
        <!-- <div class="alert alert-success alert-dismissible">
              <center><button type="button" class="close" data-dismiss="alert">&times;</button>
                <br><span class="sucesso3"><span class="glyphicon glyphicon-ok"> <b class="sucesso3">CADASTRO FEITO COM SUCESSO.<p>
                        <p>Enviamos para seu email um link para confirmação da conta!</b></span></span><br></center>
            </div> -->
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Sucesso!</h4>
          <p>Parabéns, seu cadastro foi feito com sucesso. </p>
          <hr>
          <p class="mb-0">Faça o login e aproveite.</p>
        </div>
      <?php
    };
    if ($erro == 1) {
      ?>
        <div class="alert alert-danger alert-success  alert-dismissible">
          <center><button type="button" class="close" data-dismiss="alert">&times;</button><br>
            <span class="erro_usuario">Usuário e/ou senha inválidos.</span><br><br></center>
        </div>

      <?php
    }; ?>



      <div class="cont">
        <div class="row">
          <div class="col-sm-6">
            <div class="caixa-cadastro1">
              <p>LOGIN:
                <form class="form-horizontal" method="post" action="get_validar_acesso" id="login">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user" id="campo_usuario1"></i></span>
                    <input id="campo_usuario" type="email" class="form-control" name="email" placeholder="Digite seu Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                  </div><br>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" id="campo_senha1"></i></span>
                    <input id="campo_senha" type="password" class="form-control" name="senha" placeholder="Digite sua senha">
                  </div>

                  <?php

                  if ($cadastro_naoconfirmado) {
                    echo '<span class="erro_usuario"><br/>Verificamos que você não havia confirmado sua conta!</span><br>';
                    echo '<span class="erro_usuario"><br/>Enviamos um email para a confirmação, em caso de dúvida entre em contato com a gente!<br><a href="email">Ajuda e contato.</a></span><br>';
                  }

                  if ($erro == 1) {
                    echo '<span class="erro_usuario"><br/>Usuário e/ou senha inválidos.</span>';
                  }

                  ?>
                  <br>
                  <b><a class="esqueci-senha" href="esqueci_senha">Esqueci minha senha</a></b>
                  <div class="input-group">
                    <div class="checkbox">
                      <label><input type="checkbox" name="remember">Me mantenha logado</label>
                    </div>
                  </div>
                  <br>

                  <div class="input-group">
                    <button type="submit" class="btn btn-cadastro" id="btn_login">Entrar</button>

                  </div>
                </form>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="caixa-cadastro2">
              <p>CADASTRO:
                <form class="form-horizontal" method="post" action="get_registra_usuario" id="fomulario_cadastro">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user" id="campo_usuario_novo1"></i></span>
                    <input type="email " id="email" class="form-control" name="email" placeholder="Email" id="campo_usuario_novo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                  </div><br>
                  <?php
                  if ($erro_email) {
                    echo '<span class="erro_usuario">Email já existe.</span></p>';
                  }
                  ?>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" id="campo_senha_nova"></i></span>
                    <input id="password" type="password" class="form-control" name="senha" placeholder="Senha" id="campo_senha_nova">
                  </div>
                  <h5>Minimo 8 caracteres</h5>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" id="campo_confirma_senha1"></i></span>
                    <input id="passwordconfirm" type="password" class="form-control" name="senhaConfirma" placeholder="Digite a senha novamente" id="campo_confirma_senha">
                  </div>
                  <?php
                  if ($erro_senha) {
                    echo '<span class="erro_usuario"><br/>Senhas diferentes!</span>';
                  }
                  ?>
                  <?php
                  if ($preencher) {
                    echo '<span class="erro_usuario"><br/>Preencha todos os campos!</span>';
                  }
                  ?>
                  <br>
                  <div class="input-group">
                    <div class="checkbox">
                      <label><input type="checkbox" name="termos_de_uso" id="termos_de_uso" value="aceito">Aceito <a class="esqueci-senha" href="termos">Termos de Uso</a> e <a class="esqueci-senha" href="politica">Política de privacidade</a>!</label>
                    </div>
                  </div>
                  <br>
                  <div class="input-group">
                    <button type="submit" class="btn btn-cadastro" id="btn_cadastro">Cadastrar</button>
                  </div>
                  <?php
                  // if ($sucesso) {
                  //   echo '<br><span class="sucesso3"><span  class="glyphicon glyphicon-ok"> <b class="sucesso3">CADASTRO FEITO COM SUCESSO.<p>
                  //   <p>Enviamos para seu email um link para confirmação da conta!</b></span></span>';
                  // }
                  //
                  ?>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br /><br /><br />
  </section>

</body>
<main></main>

<!-- RODAPE -->

<?php include('footer.php'); ?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</html>