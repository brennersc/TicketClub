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
  <title>QUEM SOMOS! - Ticket Club</title>
  <link rel="icon" href="img/icon.png">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
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

  <?php include('header.php'); ?>

  <br /><br /><br /><br /><br /><br /><br /><br /><br />

  <div class="capa">
    <div class="texto-capa">
      <h1><span class="t">Ticket Club</span></h1><br /><br />
      <h1><span class="sub-titulo">Seu clube do ingresso</span></h1><br>
      <a href="cadastro" class="btn btn-custom btn-lg"> CADASTRA-SE </a>
    </div>
  </div>


  <br /><br /><br />


  <section id="servicos">
    <div class="container">
      <div class="cont">
        <div class="caixa-texto">
          <div class="row">
            <div class="col-sm-12">
              <span class="texto-pg">
                <p>
                  A <span class="TC">Ticket Club</span> é uma empresa nova no mercado,
                  <br>
                  <p>mas que vem para solucionar um problema bem recorrente no meio dos frequentadores de eventos de
                    todos os tipos
                    (shows, esportivos, arti&#769;sticos, conferências e outros).
                    <p>
                      Nós conectamos pessoas que desistiram de ir a algum evento à pessoas que querem ir a esse mesmo
                      evento, para que elas possam vender e comprar seus ingressos de forma simples, fácil e rápida, e
                      em alguns casos até com um melhor preço.
                      <p><br>

                        <div class="row">
                          <!-- Imagem islutrativas -->
                          <div class="col-sm-4 ">
                            <span class="ingresso-imagem" class="img-responsive">i</span>
                          </div>
                          <div class="col-sm-4 ">
                            <span class="troca" class="img-responsive">t</span>
                          </div>
                          <div class="col-sm-4 ">
                            <span class="dinheiro" class="img-responsive">d</span>
                          </div> <!-- Imagem islutrativas -->
                        </div>

                        <br>
                        <br>
                        <p>
                          . . . Desistiu de ir a algum evento e quer vender seu ingresso?
                        </p><br>
                        <div class="row">
                          <div class="col-sm-2"></div>
                          <div class="col-sm-8">
                            <P class="destaque">● Faça seu cadastro no site,
                              <P class="destaque">● Anuncie seu ingresso na categoria desejada,
                                <P class="destaque">● Adicione informações do ingresso,
                                  <P class="destaque">● E aguarde um comprador...
                          </div>
                          <div class="col-sm-2"></div>
                        </div>
                        <p><br><br>

                          Quer ir a algum evento em que os ingressos já estão esgotados?
                        </p><br>
                        <div class="row">
                          <div class="col-sm-2"></div>
                          <div class="col-sm-8">

                            <P class="destaque">● Busque seu ingresso de forma rápida pelo <p class="destaque">nome do
                                evento,
                                <P class="destaque">● Utilize os filtros de busca,
                                  <P class="destaque">● E entre em contato com o vendedor :]
                          </div>
                          <div class="col-sm-2"></div>
                        </div>
                        <br><br><br>
              </span>
            </div> <!-- TEXTO QUEM SOMOS -->
          </div>
        </div>
      </div>
    </div>
    <br /><br /><br />
  </section>

  </div>


</body>
<main></main>
<!-- RODAPE -->

<?php include('footer.php'); ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</html>