<?php

$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : 0;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Esqueceu a Senha? - Ticket Club</title>
  <link rel="icon" href="img/icon.png">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/estilo.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!--         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
  <script src="js/plugins/sortable.min.js" type="text/javascript"></script>
  <script src="js/plugins/purify.min.js" type="text/javascript"></script>
  <script src="js/fileinput.min.js"></script>
  <!--         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script> -->
  <script src="themes/fa/theme.js"></script>
  <script src="js/locales/<lang>.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script type="text/javascript">
  </script>
</head>

<body>

  <!-- Barra navegação -->

  <?php include('header.php'); ?>

  <div class="espaço"></div>

  <section id="servicos">
    <div class="container">
      <div class="cont-ingresso">
        <div class="caixa-anuncio-ingresso">
          <h2 align="center">Esqueceu sua senha?</h2>
          <br><br>
          <div class="row">
            <div class="col-sm-12">
              <?php
              if ($sucesso == 1) {
                echo '<br><br><br><br><span class="sucessoemail"><span  class="glyphicon glyphicon-ok"> <b class="sucessoemail">Enviamos um link de recuperação para seu Email!</b></span></span>';
                echo '<br><br><br><br>';
              } else {
                echo '<div class="row">';
                echo '<div class="col-sm-12">';
                echo '<h4>Por favor, insira seu endereço de e-mail que você usou para cadastrar sua conta.</h4>';
                echo '</div>';
                echo '</div>';
                echo '<br><br>';
                echo '<form method="post" action="get_esqueci_senha" id="recuperar" "> ';
                echo '<div class="row">';
                echo '<div class="col-sm-6">';
                echo '<input class="form-control" type="text" name="emailRecupera" id="emailRecupera" placeholder="Digite seu Email" />';
                if ($erro == 1) {
                  echo '<span class="erro_usuario"><br/>EMAIL NÃO É VALIDO!</span>';
                }
                echo '</div>';
                echo '<div class="col-sm-4">';
                echo '<input class="btn btn-cadastro" type="submit" value="Enviar"/>';
                echo '<br><br><br><br>';
                echo '</div>';
                echo '</div>';
                echo ' </form>';
              }
              ?>
              <br>
            </div>
          </div>
        </div> <!--   fecha caixa  !-->
      </div> <!--   fecha caixa-anuncio-ingresso !-->
    </div> <!--   fecha CONTEINER !-->
    <br><br><br>
  </section> <!--   fecha serviços !-->


</body>
<main></main>

<!-- rodape -->

<?php include('footer.php'); ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</html>