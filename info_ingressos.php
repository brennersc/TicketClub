<?PHP
session_start();

// if(!isset($_SESSION['email'])){
//     header('Location: cadastro.php?erro=1');
// }

$ingressos = $_GET['ingresso'];

//$teste = 'ingresso' + $ingressos;

//$sucesso           = isset($_GET['sucesso']) ? $_GET['sucesso'] : 0;

$erro = isset($_GET['' . base64_encode($ingressos) . '']) ? $_GET['' . base64_encode($ingressos) . ''] : 0;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Ticket Club</title>
  <link rel="icon" href="img/icon.png">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/estilo.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>

<body>


  <!-- Barra navegação -->
  <!-- Cabeçalho -->
  <?php include('header.php'); ?>

  <div class="espaço"></div>

  <section id="servicos">

    <div class="container">
      <br /><br />
      <br />
      <?php
      if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
        ?>
        <div class="alert alert-success-pergunta" role="alert">
          <strong>Sucesso!</strong> Sua pergunta foi enviada com sucesso!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php } ?>
      <div id="info_ingressos" class="group5"></div>
      <br />
    </div>
    <br /><br /><br />
  </section>

</body>
<main></main>

<!-- rodape -->

<?php include('footer.php'); ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
  var ingressopassagem = "<?php print $ingressos; ?>";
  $(document).ready(function() {
    function atualizaINFO() {
      $.ajax({
        url: 'get_info_ingressos?ingresso=' + ingressopassagem,
        success: function(data) {
          $('#info_ingressos').html(data);
        }
      });
    }
    atualizaINFO();
  });
</script>


</html>