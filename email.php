<?php
session_start();

$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
  $string = trim($string);
  $string = stripslashes($string);
  $string = htmlspecialchars($string);
  return $string;
}

if (isset($_POST["submit"])) {
  if (empty($_POST["name"])) {
    $error .= '<p><label class="text-danger">Por favor, insira seu nome</label></p>';
  } else {
    $name = clean_text($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $error .= '<p><label class="text-danger">Apenas letras e espaços em branco permitidos</label></p>';
    }
  }
  if (empty($_POST["email"])) {
    $error .= '<p><label class="text-danger">Por favor introduza o seu e-mail</label></p>';
  } else {
    $email = clean_text($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error .= '<p><label class="text-danger">Formato de email inválido</label></p>';
    }
  }
  if (empty($_POST["subject"])) {
    $error .= '<p><label class="text-danger">Assunto é obrigatório</label></p>';
  } else {
    $subject = clean_text($_POST["subject"]);
  }
  if (empty($_POST["message"])) {
    $error .= '<p><label class="text-danger">Mensagem é necessária</label></p>';
  } else {
    $message = clean_text($_POST["message"]);
  }
  if ($error == '') {

    require 'PHPMailer/PHPMailerAutoload.php';

    //configurações básicas de endereço e protoloco 

    $mail = new PHPMailer;                                        //faz a instância do objeto PHPMailer
    //$mail->SMTPDebug = true;                                    //habilita o debug se parâmetro for true
    $mail->isSMTP();                                              //seta o tipo de protocolo
    $mail->Host = 'smtp.gmail.com';                               //define o servidor smtp
    $mail->SMTPAuth = true;                                       //habilita a autenticação via smtp
    $mail->SMTPOptions = ['ssl' => ['verify_peer' => false]];
    $mail->SMTPSecure = 'tls';                                    //tipo de segurança
    $mail->Port = 587;                                            //porta de conexão

    //dados de autenticação no servidor smtp
    $mail->Username = ' ';    //usuário do smtp (email cadastrado no servidor)
    $mail->Password = ' ';             //senha ****CUIDADO PARA NÃO EXPOR ESSA INFORMAÇÃO NA INTERNET OU NO FÓRUM DE DÚVIDAS DO CURSO****


    $mail->From = $_POST["email"];                                  //Sets the From email address for the message
    $mail->FromName = $_POST["name"];                               //Sets the From name of the message
    $mail->AddAddress(' ', 'Name');             //Adds a "To" address
    $mail->AddCC($_POST["email"], $_POST["name"]);                  //Adds a "Cc" address
    $mail->WordWrap = 50;                                           //Sets word wrapping on the body of the message to a given number of characters
    $mail->IsHTML(true);                                            //Sets message type to HTML    
    $mail->Subject = $_POST["subject"];                             //Sets the Subject of the message
    $mail->Body = $_POST["message"];                                //An HTML or plain text message body

    if ($mail->Send())                                                   //Send an Email. Return true on success or false on error
      {
        $error = '<label class="text-success">Obrigado por nos contatar!</label>';
      } else {
      $error = '<label class="text-danger">Há um Erro!/label>';
    }
    $name = '';
    $email = '';
    $subject = '';
    $message = '';
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Ajuda - Ticket Club</title>
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
          <h2 align="center">Ajude-nos a melhorar!</h2>
          <h4 align="center">(Duvida, Sugestão, Reclamação)</h4>

          <br><br>

          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
              <?php echo $error; ?>
              <form method="post">
                <div class="form-group">
                  <label>Nome *</label>
                  <input type="text" name="name" placeholder="Insira o nome" class="form-control" value="<?php echo $name; ?>" />
                </div>
                <div class="form-group">
                  <label>Email *</label>
                  <input type="text" name="email" class="form-control" placeholder="Digite o email" value="<?php echo $email; ?>" />
                </div>
                <div class="form-group">
                  <label>Assunto *</label>
                  <input type="text" name="subject" class="form-control" placeholder="Digite o assunto" value="<?php echo $subject; ?>" />
                </div>
                <div class="form-group">
                  <label>Mensagem *</label>
                  <textarea name="message" class="form-control" placeholder="Digite a mensagem" rows="5"><?php echo $message; ?></textarea>
                </div>
                <div class="form-group" align="center">
                  <button type="submit" name="submit" value="Submit" class="btn btn-info">Enviar</button>
                </div>
              </form>
            </div>
            <div class="col-sm-2"></div>
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