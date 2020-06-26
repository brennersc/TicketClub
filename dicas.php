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
  <title>DICAS! - Ticket Club</title>
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

  <div class="espaço"></div>



  <section id="servicos">
    <div class="container">
      <div class="cont-ingresso">
        <div class="caixa-anuncio-ingresso">
          <br>
          <h2 align="center" class="letra-rosa"><B>Dicas para Compradores</B></h2>
          <br>

          <h3 align="center">Faça sua busca utilizando os filtros de busca</h3>

          <p align="center" class="texto-preto">Ao preencher o campo de busca com uma localidade ou categoria, você não
            trará somente os anúncios cujos campos de localização e categoria correspondam a sua busca, mas trará
            também, anúncios cujas descrições e títulos contenham a palavra buscada.
            Entretanto utilizando os filtros de busca, você restringe a sua pesquisa somente para os ingressos inseridos
            na categoria ou localidade desejada.</p>

          <h3 align="center">Como faço para denunciar um anúncio ou anunciante?</h3>

          <p class="texto-preto">Os anúncios que infringem as nossas regras ou dicas de negociação são removidos. Você
            pode fazer uma denúncia através da aba “contato” ou clicando <a href="email"><b>AQUI</b></a> que já será
            redirecionado para a página para contato. </p>
          <p class="texto-preto">Lembrando que denúncias falsas não colaboram para a boa utilização do site pelos
            usuários. Então utilize esse recurso somente em casos em que um anunciante ou anúncio estejam em desacordo
            com as regras do site ou com a legislação brasileira vigente.</p>

          <h3 align="center">Pensando em comprar um ingresso?</h3>
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <p class="texto-preto">Para uma melhor experiência, sugerimos algumas dicas para sua negociação.</p>
              <p class="texto-preto"><b class="letra-rosa">•</b> Se notar algo errado, você pode denunciar o anúncio no
                próprio site.</p>
              <p class="texto-preto"><b class="letra-rosa">•</b> Não deposite ou realize transferências de valor antes
                de receber o ingresso;</p>
              <p class="texto-preto"><b class="letra-rosa">•</b> Verifique se o endereço da pessoa que você está
                negociando é do Brasil;</p>
              <p class="texto-preto"><b class="letra-rosa">•</b> Em caso da entrega de ingressos físicos entre vendedor
                e comprador prefira fechar negócio em um lugar público e movimentado. Sempre que possível, vá
                acompanhado;</p>
              <p class="texto-preto"><b class="letra-rosa">•</b> Certifique-se se o ingresso é verdadeiro.</p>
              <p class="texto-preto"><b class="letra-rosa">•</b> Sempre pesquise os valores do ingresso que que pretende
                adquirir (se possível no site oficial do evento).</p>
              <p class="texto-preto"><b class="letra-rosa">•</b> Exija códigos de confirmação, ou prints que comprovem
                que o ingresso que está sendo vendido tem procedência legal.</p>
              <p class="texto-preto"><b class="letra-rosa">•</b> Fique atento sobre os excessos de facilidades e preços
                muito abaixo do mercado;</p>
            </div>
            <div class="col-sm-1"></div>
          </div>


          <br>
          <h2 align="center" class="letra-rosa"><B>Dicas para Vendedores</B></h2>
          <br>

          <h3 align="center">Criando um bom anúncio</h3>
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <p class="texto-preto"><b class="letra-rosa">Título</b> - Procure ser objetivo. O título deve ser a parte
                do anúncio que descreve o ingresso oferecido em poucas palavras. (sugerimos que coloque o nome do evento
                a qual o ingresso se trata.</p>
              <p class="texto-preto"><b class="letra-rosa">Descrição</b> - Descreva bem seu ingresso, com todas as
                informações que você ainda não havia detalhado nos campos anteriores. Insira também dados do evento e se
                for o caso a qual setor o ingresso em que está sendo anunciado dá acesso.</p>
              <p class="texto-preto"><b class="letra-rosa">Campos de seleção</b> - Em algumas categorias você poderá
                encontrar filtros para detalhar o ingresso oferecido. Isso facilita na busca dos anúncios.
                Preencha o máximo de filtros possíveis, isso facilita a busca do comprador.</p>
              <p class="texto-preto"><b class="letra-rosa">Imagens</b> – Utilize imagens do evento ou do ingresso para
                que seja mais fácil para o comprador identificar do que se trata seu ingresso.</p>
              <p class="texto-preto"><b class="letra-rosa">Preço</b> - O preço é um ponto muito importante no anúncio.
                Por isso, sempre coloque o valor total no campo “Preço”. Caso aceite o pagamento parcelado coloque o
                valor e a quantidade das parcelas no campo “descrição”.
                Lembre-se: Se o valor apresentado no campo “Preço” não for referente ao valor total do produto, o seu
                anúncio poderá ser removido.</p>
              <p class="texto-preto"><b class="letra-rosa">Contato</b> - Crie a sua conta usando o seu próprio e-mail e
                telefone. Ter contatos verídicos evita denúncias de outros usuários.</p>
            </div>
            <div class="col-sm-1"></div>
          </div>

          <h3 align="center">Querendo vender?</h3>
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <p class="texto-preto"><b class="letra-rosa">•</b> Desconfie se o comprador está muito apressado, nervoso
                ou impaciente; Se notar algo errado, você pode denunciar o anúncio no próprio site.</p>
              <p class="texto-preto"><b class="letra-rosa">•</b> Prefira fechar negócio em um lugar público e
                movimentado. Sempre que possível, vá acompanhado;</p>
              <p class="texto-preto"><b class="letra-rosa">•</b> Fique atento às dificuldades que a pessoa interessada
                possui em ir até a seu estabelecimento ou de finalizar a negociação em local público;</p>
              <p class="texto-preto"><b class="letra-rosa">•</b> Com os dados sobre o comprador, faça uma pesquisa nas
                mídias sociais;</p>
              <p class="texto-preto"><b class="letra-rosa">•</b> Antes de se encontrar com o comprador, busque
                informações sobre ele. Pergunte o nome com sobrenome, lugar onde mora ou trabalha, telefone para contato
                ou e-mail, entre outras informações que possam ajudar a identificá-lo;</p>
              <p class="texto-preto"><b class="letra-rosa">•</b> Atenção às formas de pagamento:</p>
              <p class="texto-preto">I. Em casos de transferência bancária, espere o valor ser verificado em sua conta;
              </p>
              <p class="texto-preto">II. Em caso de pagamento em dinheiro, verifique o valor entregue juntamente com a
                veracidade das notas. </p>
              <p class="texto-preto">III. Em casos de depósito em caixa eletrônico, aguarde o tempo necessário para a
                “abertura dos envelopes”</p>
              <p class="texto-preto">IV. Em casos de cheque, espere compensar antes da entrega/envio do ingresso;</p>
            </div>
            <div class="col-sm-1"></div>
          </div>



        </div> <!--   fecha caixa  !-->
      </div> <!--   fecha caixa-anuncio-ingresso !-->
    </div> <!--   fecha CONTEINER !-->
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