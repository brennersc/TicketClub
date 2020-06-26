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
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>Ticket | Cadastrar</title>

  <!-- <link rel="apple-touch-icon" href="../../assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="../../assets/images/favicon.ico"> -->
  <link rel="icon" href="img/icon.png">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="remark/bootstrap.min.css">
  <link rel="stylesheet" href="remark/bootstrap-extend.min.css">
  <link rel="stylesheet" href="remark/site.css">

  <!-- Plugins -->
  <link rel="stylesheet" href="remark/animsition.css">
  <link rel="stylesheet" href="remark/asScrollable.min.css">
  <link rel="stylesheet" href="remark/switchery.min.css">
  <link rel="stylesheet" href="remark/introjs.min.css">
  <link rel="stylesheet" href="remark/slidePanel.min.css">
  <link rel="stylesheet" href="remark/flag-icon.min.css">
  <link rel="stylesheet" href="remark/register.min.css">


  <!-- Fonts -->
  <link rel="stylesheet" href="remark/web-icons.min.css">
  <link rel="stylesheet" href="remark/brand-icons/brand-icons.min.css">
  <link rel="stylesheet" href="remark/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

  <!--[if lt IE 9]>
    <script src="../../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="../../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="remark/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>
</head>

<body class="animsition page-register layout-full page-dark">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <style>
    img {
      height: 100px !important;
    }

    .btn-custom  {
      color: #fff !important;
      background: #FF1493 !important;
      /* font-weight: bold !important; */
    }

    .btn-custom:hover {
      color: #fff !important;
      background: #900e54 !important;
    }

    .btn-custom:active {
      color: #afadad !important;
    }

    .btn-custom:visited {
      color: #fff !important;
    }
    a {
    color: #FF1493 !important;
    /*font-weight: bold !important;*/
    }
    a:hover{
    color: #3e8ef7 !important;
    }
    a:active{
    color: #fff !important;
    }

  </style>

  <!-- Page -->
  <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
      <div class="brand">
        <a href="./">
          <img class="brand-img" src="img/logo.png" alt="..."></a>
        <h2 class="brand-text">Crie uma conta gratuita!</h2>
      </div>
      <p>Veja todos os ingressos em um só lugar.</p>
      <p>Publique seus ingressos de forma rápida e fácil, altere seu perfil com segurança.</p>
      <form method="post" role="form" action="get_registra_usuario" id="fomulario_cadastro">
        <div class="form-group">
          <label class="sr-only" for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label class="sr-only" for="inputPassword">Senha</label>
          <input type="password" class="form-control" id="inputPassword" name="senha" placeholder="Senha" required>
        </div>
        <div class="form-group">
          <label class="sr-only" for="inputPasswordCheck">Confirme a Senha</label>
          <input type="password" class="form-control" id="inputPasswordCheck" name="senhaConfirma" placeholder="Confirme a Senha" required>
        </div>
        <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
          <!-- <input type="checkbox" id="inputCheckbox" name="remember"> -->
          <input type="checkbox" name="termos_de_uso" id="termos_de_uso" value="aceito" required>
          <label for="inputCheckbox">Aceito <a class="esqueci-senha" href="termos">Termos de Uso</a> e <a class="esqueci-senha" href="politica">Política de privacidade</a>!</label>
        </div><br><br>
        <?php
        if ($erro_senha == 1) {
          ?>
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center><span>
              </span><strong>Senhas diferentes!</strong></center>
          </div>
        <?php
      }
      ?>

        <?php
        if ($preencher) {
          ?>
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center><span>
              </span><strong>Preencha todos os campos!</strong></center>
          </div>
        <?php
      }
      ?>
        <?php
        if ($erro_email) {
          ?>
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center><span>
              </span><strong>Email já existe.</strong></center>
          </div>
        <?php
      }
      ?>

        <button type="submit" class="btn btn-custom btn-block">Cadastrar</button>
      </form>
      <p>Já tem conta? Por favor, vá para <a href="login">Login</a></p>

      <footer class="page-copyright page-copyright-inverse">
        <p> © 2018 - Ticket Club</p>
        <p>TODOS DIREITOS RESERVADOS.</p>
        <div class="social">
          <a class="btn btn-icon btn-pure" href="https://twitter.com/myticketclub">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
          <a class="btn btn-icon btn-pure" href="https://www.facebook.com/myticketclub">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
          <a class="btn btn-icon btn-pure" href="https://www.instagram.com/myticketclub/">
            <i class="icon bd-instagram" aria-hidden="true"></i>
          </a>
        </div>
      </footer>
    </div>
  </div>
  <!-- End Page -->


  <!-- Core  -->
  <script src="remark/jquery/jquery.js"></script>
  <script src="remark/bootstrap/bootstrap.js"></script>
  <script src="remark/animsition/animsition.js"></script>


  <script src="remark/babel-external-helpers.js"></script>
  <script src="remark/jquery.js"></script>
  <script src="remark/popper.min.js"></script>
  <script src="remark/bootstrap.js"></script>
  <script src="remark/animsition.js"></script>
  <script src="remark/jquery.mousewheel.js"></script>
  <script src="remark/jquery-asScrollbar.js"></script>
  <script src="remark/jquery-asScrollable.js"></script>
  <script src="remark/jquery-asHoverScroll.js"></script>

  <!-- Plugins -->
  <script src="remark/switchery.js"></script>
  <script src="remark/intro.js"></script>
  <script src="remark/screenfull.js"></script>
  <script src="remark/jquery-slidePanel.js"></script>
  <script src="remark/jquery.placeholder.js"></script>

  <!-- Scripts -->
  <script src="remark/Component.js"></script>
  <script src="remark/Plugin.js"></script>
  <script src="remark/Base.js"></script>
  <script src="remark/Config.js"></script>

  <script src="remark/Menubar.js"></script>
  <script src="remark/GridMenu.js"></script>
  <script src="remark/Sidebar.js"></script>
  <script src="remark/PageAside.js"></script>
  <script src="remark/menu.js"></script>

  <script src="remark/colors.js"></script>
  <script src="remark/tour.js"></script>
  <script>
    Config.set('assets', 'remark');
  </script>

  <!-- Page -->
  <script src="remark/Site.js"></script>
  <script src="remark/asscrollable.js"></script>
  <script src="remark/slidepanel.js"></script>
  <script src="remark/switchery.js"></script>
  <script src="remark/jquery-placeholder.js"></script>

  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>
</body>

</html>