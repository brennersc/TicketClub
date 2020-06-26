  <?php


    if (isset($_SESSION['id_usuario'])) {

        require_once('db_class.php');

        $id_usuario = $_SESSION['id_usuario'];

        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $sql = "SELECT apelido FROM cadastro where id_usuario = '$id_usuario'";

        $resultado_id = mysqli_query($link, $sql);

        $apelido = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);



        $contador = "SELECT p.pergunta FROM perguntas p  
        INNER JOIN anuncios a ON p.id_anuncio = a.id_anuncio and  a.id_usuario = $id_usuario and data_evento >= '" . date("Y-m-d") . "'
        WHERE  p.resposta = '' ";
        
        $contadorpeguntasN = mysqli_query($link, $contador);
        $cont = 0;
        while ($contadorpeguntas = mysqli_fetch_array($contadorpeguntasN, MYSQLI_ASSOC)) {
            $cont ++;
        }
    }



    ?>

  <!-- Barra navegação -->
  <nav class="navbar navbar-fixed-top navbar-inverse navbar-transparente">
      <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-navegacao">
                  <span class="sr-only">Alternar Menu</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a href="./" class="navbar-brand">
                  <span class="logo">Ticket Club</span>
              </a>
          </div>

          <div class="collapse navbar-collapse" id="barra-navegacao">
              <ul class="nav navbar-nav navbar-right">
                  <!-- <li> <a href="#">Chat</a> </li> -->
                  <li> <a href="./">Anúncios</a> </li>

                  <?php

                    if (!isset($_SESSION['id_usuario'])) {

                        ?>
                      <li class="dropdown">
                          <a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Entrar <span class="caret"></a>
                          <ul class="dropdown-menu" aria-labelledby="entrar">
                              <div class="col-md-12">
                                  <br>
                                  <p>Voc&ecirc; possui uma conta?

                                      <form method="post" action="get_validar_acesso" id="login">
                                          <div class="form-group">

                                              <input id="campo_usuario" type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                          </div>

                                          <div class="form-group">

                                              <input id="campo_senha" type="password" class="form-control" name="senha" placeholder="Senha">
                                          </div>

                                          <button type="submit" class="btn btn-cadastro" id="btn_login">Entrar</button>
                                          <br>
                                          <hr>
                                          <b>
                                              <p><a class="esqueci-senha" href="esqueci_senha">Esqueci senha.</a>
                                          </b>
                                          <p><a href="cadastro" align="center"><b>Cadastre-se!</b></a></p>
                                      </form>
                          </ul>
                      </li>
                  <?php
                } else {
                    ?>

                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo 'Olá, ' . $apelido['apelido'] . ' '; ?><span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                              <li> <a href="meus_anuncios">Meus An&uacute;ncios <br>
                                      <?php
                                        if ($cont != 0){
                                            echo 'Você tem  ' .$cont .' perguntas';
                                        }; ?>
                                  </a> </li>
                              <li> <a href="minha_conta">Editar</a> </li>
                              <li> <a href="sair">Logout</a> </li>
                          </ul>
                      </li>

                  <?php
                }

                ?>

                  <li class="divisor"></li>
                  <li> <a href="publicar">PUBLICAR</a> </li>
              </ul>
          </div>
      </div>
  </nav>