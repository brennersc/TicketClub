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

if ($dados_usuario == NULL) {
    header('Location: minha_conta?dados_usuario=1');
} else {
    $sql = "SELECT COUNT(id_usuario) FROM anuncios WHERE id_usuario = '$id_usuario' and data_evento >=  '".date("Y-m-d")."' and status = '' ";
    $resultado_id = mysqli_query($link, $sql);
    $qnt = mysqli_fetch_array($resultado_id);
    if ($qnt['COUNT(id_usuario)'] < 3) {
        $verificar_qtd = 0;
    } else {
        $verificar_qtd = 1;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?PHP

    $arquivo_grande = isset($_GET['arquivo_grande']) ? $_GET['arquivo_grande'] : 0;
    $extensao = isset($_GET['extensao']) ? $_GET['extensao'] : 0;
    $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;


    if ($arquivo_grande) {
        echo "<script>alert('Arquivo muito grande!!! Escolha uma imagem até 2 megas ');</script>";
    }

    if ($extensao) {
        echo "<script>alert('Extensão do arquivo não permitia, adicione um imagem!');</script>";
    }

    if ($erro) {
        echo "<script>alert('SELECIONE UMA CATEGORIA OU ESTADO!');</script>";
    }

    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Publique seu ingresso! - Ticket Club</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <script type="text/javascript">
        $(document).ready(function() {
            $('.money').mask('000.000.000.000.000,00', {
                reverse: true
            });
        });

        // verificar se os campos de usuário e senha foram devidamente preenchidos
        $(document).ready(function() {
            $('#btn-publicar').click(function() {

                var campo_vazio = false;

                if ($('#titulo').val() == '') {
                    $('#titulo').css({
                        'border-color': 'rgba(255, 0, 0, 0.28)',
                        'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
                    });
                    campo_vazio = true;
                } else {
                    $('#titulo').css({
                        'border-color': '#CCC',
                        'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'
                    });
                }

                if ($('#descricao').val() == '') {
                    $('#descricao').css({
                        'border-color': 'rgba(255, 0, 0, 0.28)',
                        'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
                    });
                    campo_vazio = true;
                } else {
                    $('#descricao').css({
                        'border-color': '#CCC',
                        'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'
                    });
                }

                if ($('#cidade').val() == '') {
                    $('#cidade').css({
                        'border-color': 'rgba(255, 0, 0, 0.28)',
                        'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
                    });
                    campo_vazio = true;
                } else {
                    $('#cidade').css({
                        'border-color': '#CCC',
                        'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'
                    });
                }

                if ($("#estado option:selected").val() == 'estado') {
                    $('#estado').css({
                        'border-color': 'rgba(255, 0, 0, 0.28)',
                        'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
                    });

                    campo_vazio = true;
                } else {
                    $('#estado').css({
                        'border-color': '#CCC',
                        'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'

                    });
                }

                if ($("#categoria option:selected").val() == 'categoria') {
                    $('#categoria').css({
                        'border-color': 'rgba(255, 0, 0, 0.28)',
                        'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
                    });

                    campo_vazio = true;
                } else {
                    $('#categoria').css({
                        'border-color': '#CCC',
                        'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'
                    });
                }

                if ($('#valor').val() == '') {
                    $('#valor').css({
                        'border-color': 'rgba(255, 0, 0, 0.28)',
                        'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
                    });
                    campo_vazio = true;
                } else {
                    $('#valor').css({
                        'border-color': '#CCC',
                        'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'
                    });
                }

                if ($('#foto').val() == '') {
                    $('#foto').css({
                        'color': '#ff0000',
                        'border-color': 'rgba(255, 0, 0, 0.28)',
                        'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
                    });
                    campo_vazio = true;
                } else {
                    $('#foto').css({
                        'color': '#000',
                        'border-color': '#CCC',
                        'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'
                    });
                }


                if ($('#data').val() == '') {
                    $('#data').css({
                        'border-color': 'rgba(255, 0, 0, 0.28)',
                        'box-shadow': '0px 0px 10px 4px rgba(255, 0, 0, 0.16)'
                    });
                    campo_vazio = true;
                } else {
                    $('#data').css({
                        'color': '#000',
                        'border-color': '#CCC',
                        'box-shadow': '0px 0px 0px 0px rgba(0, 0, 0)'
                    });
                }

                if (campo_vazio) return false;

            });

        });
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

                    <h1 align="center">Publique seu ingresso!</h1>

                    <br><br>

                    <div class="row">
                        <div class="col-sm-6">

                            <!-- <form id="form_publicar" method="post" onsubmit="return confirmacao()">   -->
                            <form id="form_publicar" name="ingresso" type="text" method="post" enctype="multipart/form-data" action="get_incluir_ingresso">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label for="inputdefault">Titulo da Publicação: *</label>
                                            <?php
                                            if ($verificar_qtd == 1) {
                                                echo '<input class="form-control  input-lg" type="text" id="titulo" name="titulo" placeholder="Titulo" disabled>';
                                            } else {
                                                echo '<input class="form-control  input-lg" type="text" id="titulo" name="titulo" placeholder="Titulo" >';
                                            } ?>
                                        </div>
                                    </div>
                                </div>

                                <br><br>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label for="exampleFormControlTextarea1">Descreva seu ingresso: *</label>
                                            <?php
                                            if ($verificar_qtd == 1) {
                                                echo '<textarea class="form-control input-lg"  id="descricao" name="descricao" maxlength="250" rows="5" placeholder="Descrição" disabled></textarea>';
                                            } else {
                                                echo '<textarea class="form-control input-lg"  id="descricao" name="descricao" maxlength="250" rows="5" placeholder="Descrição"></textarea>';
                                            } ?>
                                        </div>
                                    </div>
                                </div>

                                <br><br>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label for="exampleFormControlSelect1" placeholder="Categorias">Selecione a categoria do evento: *</label>
                                            <?php
                                            if ($verificar_qtd == 1) {
                                                echo '<select class="form-control input-lg"  id="categoria" name="categoria" placeholder="Categorias" disabled>';
                                                echo '<option value="categoria" disabled selected>Selecione... </option>';
                                                echo '<option>Congresso, Seminario</option>';
                                                echo '<option>Cursos, Workshop</option>';
                                                echo '<option>Encontros, Networking</option>';
                                                echo '<option>Espotivo</option>';
                                                echo '<option>E-sports (Gamer)</option>';
                                                echo '<option>Feira, Exposição</option>     ';
                                                echo '<option>Filme, Cinema e Teatro</option> ';
                                                echo '<option>Religioso, Espiritual</option>';
                                                echo '<option>Show, Musica e Festa</option>';
                                                echo '<option>Outros Eventos</option>  ';
                                                echo '</select>';
                                            } else {
                                                echo '<select class="form-control input-lg"  id="categoria" name="categoria" placeholder="Categorias" >';
                                                echo '<option value="categoria" disabled selected>Selecione... </option>';
                                                echo '<option>Congresso, Seminario</option>';
                                                echo '<option>Cursos, Workshop</option>';
                                                echo '<option>Encontros, Networking</option>';
                                                echo '<option>Espotivo</option>';
                                                echo '<option>E-sports (Gamer)</option>';
                                                echo '<option>Feira, Exposição</option>';
                                                echo '<option>Filme, Cinema e Teatro</option>  ';
                                                echo '<option>Religioso, Espiritual</option>';
                                                echo '<option>Show, Musica e Festa</option>';
                                                echo '<option>Outros Eventos</option> ';
                                                echo '</select>';
                                            } ?>
                                        </div>
                                    </div>
                                </div>

                                <br><br>


                                <label for="inputdefault">Endereço do Evento: *</label>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="row ">
                                                <div class="col-sm-12">
                                                    <?php
                                                    if ($verificar_qtd == 1) {
                                                        echo ' <input type="text" class="form-control input-lg" id="cidade" name="cidade" placeholder="Cidade" disabled>';
                                                    } else {
                                                        echo ' <input type="text" class="form-control input-lg" id="cidade" name="cidade" placeholder="Cidade">';
                                                    } ?>
                                                </div>
                                            </div></br>
                                            <div class="row ">
                                                <div class="col-sm-8">

                                                    <?php
                                                    if ($verificar_qtd == 1) {
                                                        echo '<select class="form-control input-lg" placeholder="Estados" id="estado" name="estado" disabled>
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
                                                    </select>';
                                                    } else {
                                                        echo '<select class="form-control input-lg"  id="estado" name="estado" placeholder="Estados">
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
                                                    </select>';
                                                    } ?>
                                                </div>
                                            </div></br>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label for="inputdefault">Dia do evento: *</label>
                                            <?php
                                            if ($verificar_qtd == 1) {
                                                echo '<input class="form-control input-lg" id="data" type="date"  name="valor" placeholder="" disabled>';
                                            } else {
                                                echo '<input class="form-control input-lg" id="data" type="date"  min="' . date("Y-m-d") . '" name="data" placeholder="">';
                                            } ?>

                                        </div></br>
                                    </div>
                                </div>
                                </br>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label for="inputdefault">Valor: *</label>
                                            <?php
                                            if ($verificar_qtd == 1) {
                                                echo '<input class="form-control input-lg money" id="valor" type="text"  name="valor" placeholder="R$" disabled>';
                                            } else {
                                                echo '<input class="form-control input-lg money" id="valor" type="text"  name="valor" placeholder="R$">';
                                            } ?>

                                        </div>
                                    </div>
                                </div>

                                <br><br><br>
                        </div>
                        <div class="col-sm-6">

                            <?php
                            if ($verificar_qtd == 1) { } else {

                                echo '<label class="control-label"><h3>Adicione uma imagem para seu anuncio: *</h3></label>';
                                echo '<br>';
                                echo '<input type="file" name="image" id="foto" class="file"/>';
                                echo '<br>';
                                echo '<h4 align="center"><b>*</b> Tamanho da imagem ate&#769; 2mb (Megabyte).</h4><br>';
                            } ?>

                            <?php
                            if ($verificar_qtd == 1) {

                                echo '<h3 align="center">Você já possui três publicações!</h3>';
                                echo '<br>';
                                echo '<h4>Aguarde um dos seus ingressos ser vendido ou exclua um dos anúncios.</h4>';
                                echo '<br>';
                                echo '<center><h4><a href="meus_anuncios">Ir para meus anuncios</a></h4></center>';
                            } ?>
                            <br>
                            <br>
                            <div class="linha-rosa">
                                <br>
                                <h2 align="center">Dúvidas para anúnciar?</h2>
                                <br>
                                <h4 align="center">Te damos algumas dicas para ajudar a melhorar seu anúncio ou até
                                    mesmo para achar um ingresso com mais facilidade.</h4><br>
                                <center>
                                    <h4><a href="dicas.html">Ir para Dicas</a></h4>
                                </center>
                                <br>

                            </div>

                        </div>
                        <br><br>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <?php
                                    if ($verificar_qtd == 1) {
                                        echo '<button type="submit" class="btn btn-publicar" id="btn-publicar" disabled>Publicar</button>';
                                    } else {
                                        echo '<button type="submit" class="btn btn-publicar" id="btn-publicar" >Publicar</button>';
                                    } ?>

                                </div>
                            </div>
                        </div>
                        </form>

                    </div>


                </div> <!--   fecha caixa  !-->
            </div> <!--   fecha caixa-anuncio-ingresso !-->
        </div> <!--   fecha CONTEINER !-->
    </section> <!--   fecha serviços !-->


</body>
<main></main>
<!-- RODAPE -->

<?php include('footer.php'); ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>