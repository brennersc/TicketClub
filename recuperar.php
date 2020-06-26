<?php

session_start();

require_once('db_class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();


if (isset($_GET['codigo'])) {

  $codigo = $_GET['codigo'];
  $email_codigo = base64_decode($codigo);

  $sql = "SELECT * FROM codigos WHERE codigo = '$codigo' And data > NOW() ";

  $resultado_id = mysqli_query($link, $sql);

  $dados_usuario = mysqli_fetch_array($resultado_id);

  if ($dados_usuario == NULL) {

    header('Location: recuperar?link_inpirado=1');
  } else {

    $dados_usuario = 0;

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {

      if (isset($_POST['acao']) && $_POST['acao'] == 'mudar') {

        $nova_senha     = strip_tags(trim(addslashes(md5($_POST['novasenha']))));
        $confirmanovasenha   = strip_tags(trim(addslashes(md5($_POST['confirmanovasenha']))));

        if ($nova_senha == $confirmanovasenha) {
          $sql = "UPDATE usuarios SET senha = '$nova_senha' Where email = '$email_codigo' ";

          $atualizar = mysqli_query($link, $sql);

          if ($atualizar) {

            $sql = "DELETE FROM codigos where codigo = '$codigo'";

            $mudar = mysqli_query($link, $sql);


            header('Location: recuperar?sucesso=1');
          }
        } else {

          echo "<script>alert('Senhas diferentes!');</script> ";
        }
      }
    }
  }
}

?>

<?php
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : 0;
$erro_senha = isset($_GET['erro_senha']) ? $_GET['erro_senha'] : 0;
$link_inpirado = isset($_GET['link_inpirado']) ? $_GET['link_inpirado'] : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Recuperar Senha - Ticket Club</title>
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
          <?php
          if ($link_inpirado) {
            echo '<h2 align="center">O link expirou!</h2>';
          } else {
            echo '<h2 align="center">Crie uma nova senha!</h2>';
          } ?>
          <br><br>
          <div class="row">
            <div class="col-sm-12">
              <form method="post" action="" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-4">
                    <?php
                    if ($link_inpirado) {
                      echo '<br>';
                      echo '<center><span class=""><br/>O link enviado para o seu email expirou 
                  <p>(não é mais válido).</span></center>';
                      echo '<br>';
                      echo '<h4><center><a href="cadastro"">Faça o Login</a></center></h4>';
                      echo '<br><br><br>';
                    } else {
                      if ($sucesso) {
                        echo '<br>';
                        echo '<center><br><span class="sucesso3"><span  class="glyphicon glyphicon-ok"> <b class="sucesso3">SENHA ALTERADA COM SUCESSO.</b></span></span></center>';
                        echo '<br>';
                        echo '<h4><center><a href="cadastro"">Faça o Login</a></center></h4>';
                        echo '<br><br><br>';
                      } else {
                        echo '<input  class="form-control" type="password"  name="novasenha" value="" placeholder="Digite sua senha nova" /><br>';
                        echo '<input  class="form-control" type="password"  name="confirmanovasenha" value="" placeholder="Confirme sua senha" />';
                        echo '<input  type="hidden"  name="acao" value="mudar" />';

                        echo '<br>';
                        echo '<div class="row">';
                        echo '<div class="col-sm-4">	';
                        echo '<input class="btn btn-cadastro" type="submit" value="Enviar"/>';
                        echo '</div>';
                        echo '</div>';
                        echo '<br><br>';
                      }
                    }
                    ?>
                    <br>
                  </div>
                </div>
              </form>
            </div>
            <br><br>
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