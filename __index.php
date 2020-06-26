<?php

session_start();

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
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/estilo.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>



  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
  <script type="text/javascript" src="javascriptpersonalizado.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- GOOGLE -->
<!--
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7279964417611838",
    enable_page_level_ads: true
  });
</script>
-->

</head>

<body>

  <!-- Cabeçalho -->
  <?php include('header.php'); ?>

  <div class="espaço"></div>

  <section id="servicos">
    <div class="container">
        <?php
        if (!isset($_SESSION['id_usuario'])) {
          ?>
          <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center><span><img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/apple/198/admission-tickets_1f39f.png" srcset="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/240/apple/198/admission-tickets_1f39f.png 2x" alt="Admission Tickets on Apple iOS 12.2" width="40" height="40">
              </span><strong>Anuncie</strong> seu ingresso de graça para milhares de pessoas!</center>
            <center><strong>Procure</strong> pelo o ingresso mais barato ou que já tenha esgotado. <span><img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/apple/198/face-with-monocle_1f9d0.png" srcset="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/240/apple/198/face-with-monocle_1f9d0.png 2x" alt="Face With Monocle on Apple iOS 12.2" width="40" height="40"></span></center>
          </div>
        <?php
           }
        ?>

      <div class="caixa-de-busca">
        <!-- CAIXA DE BUSCA -->
        <div class="row">
          <div class="col-sm-12">
            <form id="form_procurar_anuncio" action="">
              <div class="input-group">
                <input type="search" class="form-control" id="procurar_anuncio" name="procurar_anuncio" placeholder="Busque pelo ingresso">
                <div class="input-group-btn">
                  <button class="btn btn-buscar" type="button" id="btn_procurar_anuncio"><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
            </form>
            <!--               <br/><br/><br/> 

              <form method="POST" id="form-pesquisa" action="">
                Pesquisar: <input type="text" name="procurar_anuncio" id="procurar_anuncio" placeholder="O que você está procurando?">
                <input type="submit" name="enviar" value="Pesquisar">
              </form> -->
          </div>
        </div>
      </div> <!-- CAIXA DE BUSCA -->
      <div id="procurar" class="group1"></div>

      <div id="anuncios" class="group"></div>

      

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

<script type="text/javascript">
  $(document).ready(function() {
    function atualizaAnuncios() {
      $.ajax({
        url: 'get_anuncios',
        success: function(data) {
          $('#anuncios').html(data);
        }
      });
    }
    atualizaAnuncios();
  });

  //ORIGINAL
  $(document).ready(function() {
    $('#btn_procurar_anuncio').click(function() {
      $('#procurar').html('');
      if ($('#procurar_anuncio').val().length > 0) {
        $.ajax({
          url: 'get_procurar',
          method: 'POST',
          data: $('#form_procurar_anuncio').serialize(),
          success: function(data) {
            $('#procurar').html(data);
          }
        });
      }
    });
  });

  //TESTE FUNCIONANDO 
  $(document).ready(function() {
    $("#procurar_anuncio").keyup(function() {
      $('#procurar').html('');
      if ($('#procurar_anuncio').val().length > 0) {
        $.ajax({
          url: 'get_procurar',
          method: 'POST',
          data: $('#form_procurar_anuncio').serialize(),
          success: function(data) {
            $('#procurar').html(data);
          }
        });
      }
    });
  });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136637974-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-136637974-1');
</script>

</html>