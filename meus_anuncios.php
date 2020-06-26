<?PHP
session_start();

if (!isset($_SESSION['id_usuario'])) {
  header('Location: cadastro?erro=1');
}

$arquivo_grande = isset($_GET['arquivo_grande']) ? $_GET['arquivo_grande'] : 0;

if ($arquivo_grande) {
  echo "<script>alert('Arquivo muito grande!!! Escolha uma imagem até 2 megas ');</script>";
}

$extensao = isset($_GET['extensao']) ? $_GET['extensao'] : 0;

if ($extensao) {
  echo "<script>alert('Extensão do arquivo não permitia, adicione um imagem!');</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Meus Anuncios - Ticket Club</title>
  <link rel="icon" href="img/icon.png">
  <!-- Bootstrap -->

  <!-- Mascaras -->
  <script src="js/jquery.mask.min.js" type="text/javascript"></script>
  <script src="js/bootstrap-notify.min.js" type="text/javascript"></script>
  <!-- Mascaras -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.min.js"></script>

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
      <br /><br />

      <ul class="nav nav-tabs">
        <li class="active"><a href="#home">
            <h5><b>Meus Anúncios</b></h5>
          </a></li>
        <li><a href="minha_conta">
            <h5><b>Minha Conta</b></h5>
          </a></li>
      </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <div id="meus_anuncios" class="group2"></div>


          <ul class="nav nav-tabs">
            <li class="active" id="teste"><a href="#home">
                <h5><b>Anúncios Vendidos e Inspirados</b></h5>
              </a></li>
          </ul>
          <div id="meus_anuncios_vendido" class="group15"></div>
          

          <div id="meus_anuncios_inspirados" class="group17"></div>
        </div>

      </div><!--   tab-content !-->
    </div> <!-- FECHA CONTAINER -->

    <br /><br /><br /><br />

  </section>
</body>
<main></main>
<!-- rodape -->

<?php include('footer.php'); ?>

<?php
echo '<script type="text/javascript">';

echo "$(document).ready(function(){";
echo "$('#btn-atualizar-imagem').click(function(){";

echo "var campo_vazio = false;";

echo "if($('#foto').val() == ''){";
echo "$('#foto').css({'color' : '#ff0000'});";
echo "campo_vazio = true;";
echo "}else{";
echo "$('#foto').css({'color' : '#CCC'});";
echo "}";

echo "if(campo_vazio) return false;";

echo "});";

echo "});";



echo "$(document).ready(function(){";
echo '$("#btn-atualizar-anuncio").click(function(){';

echo "var campo_vazio = false;";

echo "if($('#titulo').val() == ''){";
echo "$('#titulo').css({'border-color' : '#ff0000'});";
echo "campo_vazio = true;";
echo "}else{";
echo "$('#titulo').css({'border-color' : '#CCC'});";
echo "}";

echo "if($('#descricao').val() == ''){";
echo "$('#descricao').css({'border-color' : '#ff0000'});";
echo "campo_vazio = true;";
echo "}else{";
echo "$('#descricao').css({'border-color' : '#CCC'});";
echo "}";

echo "if($('#cidade').val() == ''){";
echo "$('#cidade').css({'border-color' : '#ff0000'});";
echo "campo_vazio = true;";
echo "}else{";
echo "$('#cidade').css({'border-color' : '#CCC'});";
echo "}";

echo "if($('#estado').val() == ''){";
echo "$('#estado').css({'border-color' : '#ff0000'});";
echo "campo_vazio = true;";
echo "}else{";
echo "$('#estado').css({'border-color' : '#CCC'});";
echo "}";

echo "if($('#valor').val() == ''){";
echo "$('#valor').css({'border-color' : '#ff0000'});";
echo "campo_vazio = true;";
echo "}else{";
echo "$('#valor').css({'border-color' : '#CCC'});";
echo "}";

echo "if(campo_vazio) return false;";

echo "});";

echo "});";

echo '</script>';
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.money').mask('000.000.000.000.000,00', {
      reverse: true
    });
  });

  $(document).ready(function() {
    function atualizaMEUSAnuncios() {
      $.ajax({
        url: 'get_meus_anuncios',
        success: function(data) {
          $('#meus_anuncios').html(data);
        }
      });
    }

    atualizaMEUSAnuncios();
  });

  $(document).ready(function() {
    function atualizaMeus_anuncios_inspirados() {
      $.ajax({
        url: 'get_meus_anuncios_inspirados',
        success: function(data) {
          $('#meus_anuncios_inspirados').html(data);
        }
      });
    }

    atualizaMeus_anuncios_inspirados();
  });

  $(document).ready(function() {
    function atualizaMEUSAnunciosvendido() {
      $.ajax({
        url: 'get_meus_anuncios_vendido',
        success: function(data) {
          $('#meus_anuncios_vendido').html(data);
        }
      });
    }

    atualizaMEUSAnunciosvendido();
  });

  $(document).ready(function() {
    $('#btn-atualizar-anuncio').click(function() {

      var campo_vazio = false;

      if ($('#titulo').val() == '') {
        $('#titulo').css({
          'border-color': '#ff0000'
        });
        campo_vazio = true;
      } else {
        $('#titulo').css({
          'border-color': '#CCC'
        });
      }

      if ($('#descricao').val() == '') {
        $('#descricao').css({
          'border-color': '#ff0000'
        });
        campo_vazio = true;
      } else {
        $('#descricao').css({
          'border-color': '#CCC'
        });
      }

      if ($('#cidade').val() == '') {
        $('#cidade').css({
          'border-color': '#ff0000'
        });
        campo_vazio = true;
      } else {
        $('#cidade').css({
          'border-color': '#CCC'
        });
      }

      if ($('#estado').val() == '') {
        $('#estado').css({
          'border-color': '#ff0000'
        });
        campo_vazio = true;
      } else {
        $('#estado').css({
          'border-color': '#CCC'
        });
      }

      if ($('#valor').val() == '') {
        $('#valor').css({
          'border-color': '#ff0000'
        });
        campo_vazio = true;
      } else {
        $('#valor').css({
          'border-color': '#CCC'
        });
      }

      if (campo_vazio) return false;

    });

  });
</script>

</html>