<?php

session_start();

require_once('db_class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();


if (isset($_GET['verifica'])) {

  $codigo = $_GET['verifica'];

  $email_codigo = base64_decode($codigo);

  $sql = "SELECT * FROM usuarios WHERE email = '$email_codigo' And data_validade > NOW() ";

  $resultado_id = mysqli_query($link, $sql);

  $dados_usuario = mysqli_fetch_array($resultado_id);

  if ($dados_usuario == NULL) {

    header('Location: confirma_email?link_inpirado=1');
    
  } else {

    $dados_usuario = 0;

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {

      $sql = "UPDATE usuarios SET codigo = 'valido', data_validade = ' ' Where email = '$email_codigo' ";

      mysqli_query($link, $sql);

      header('Location: confirma_email');
    }
  }
}

?>

<?php

$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : 0;
$link_inpirado = isset($_GET['link_inpirado']) ? $_GET['link_inpirado'] : 0;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Confima email - Ticket Club</title>
  <link rel="icon" href="img/icon.png">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/estilo.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <!--         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="./css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="./js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
  <script src="./js/plugins/sortable.min.js" type="text/javascript"></script>
  <script src="./js/plugins/purify.min.js" type="text/javascript"></script>
  <script src="./js/fileinput.min.js"></script>
  <!--         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script> -->
  <script src="./themes/fa/theme.js"></script>
  <script src="./js/locales/<lang>.js"></script>

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


  <!-- Cabeçalho -->

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
            echo '<h2 align="center">Confirmação de Email!</h2>';
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
                      echo '<h4><center>Enviamos um novo link para seu email</center></h4>';
                      echo '<br><br><br>';
                    } else {

                      echo '<br>';
                      echo '<center><br><span class="sucesso3"><span  class="glyphicon glyphicon-ok"> <b class="sucesso3">EMAIL CONFIRMADO COM SUCESSO!</b></span></span></center>';
                      echo '<br>';
                      echo '<h4><center><a href="cadastro"">Faça o Login</a></center></h4>';
                      echo '<br><br><br>';
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