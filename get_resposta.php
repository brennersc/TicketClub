<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: cadastro?erro=1');
}

require_once('db_class.php');

$id_pergunta = base64_decode($_GET['r']);

$resposta = strip_tags(trim(addslashes($_POST['resposta'])));

$id_usuario = $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql();

if ($resposta == '') {
    header('Location: meus_anuncios');
    exit();
}

$SQLUSUARIO = "SELECT u.email, a.titulo, a.id_anuncio, /*c.apelido,*/ p.pergunta FROM usuarios as u 
join anuncios as a 
/*join cadastro as c */
join perguntas as p 
ON (u.id = p.id_usuario) /*and (c.id_usuario = p.id_usuario)*/ and (a.id_anuncio = p.id_anuncio) 
where id_perguntas = $id_pergunta ";

$resultadoemail = mysqli_query($link, $SQLUSUARIO);
$registroemail  = mysqli_fetch_array($resultadoemail, MYSQLI_ASSOC);

// echo    $registroemail['id_anuncio'];echo '<br>';
// echo    $registroemail['email'];echo '<br>';
// echo    $registroemail['titulo'];echo '<br>';
// echo    $registroemail['apelido'];echo '<br>';
// echo    $registroemail['pergunta'];

$sql = "UPDATE perguntas set resposta = '$resposta' where id_perguntas = '$id_pergunta' ";

$mensagem = ' <h2 align="center">Sua pergunta sobre: ' . $registroemail['titulo'] . ' foi respondida</h2>
                <h3>
                <br>
                <p>Olá ' . $registroemail['email'] . '</p>

                <p>Você tem a resposta da pergunta sobre: ' . $registroemail['titulo'] . '</p>

                <br>
                <a href="http://myticketclub.com.br/info_ingressos?ingresso=' . base64_encode($registroemail['id_anuncio']) . '">Ver resposta</a>
                <br>
                <br>
                <p>Atenciosamente,</p>
                <p>Ticket Club</p>
                <br>
                <p>myticketclub.com.br</p>

                </h3> ';


//executar a query
if (mysqli_query($link, $sql)) {

    require 'PHPMailer/PHPMailerAutoload.php';

    //configurações básicas de endereço e protoloco 

    $mail = new PHPMailer;                                            //faz a instância do objeto PHPMailer
    //$mail->SMTPDebug = 2;                                    		//habilita o debug se parâmetro for true
    $mail->isSMTP();                                                  //seta o tipo de protocolo
    $mail->Host = 'smtp.gmail.com';                                   //define o servidor smtp
    $mail->SMTPAuth = true;                                           //habilita a autenticação via smtp
    $mail->SMTPOptions = ['ssl' => ['verify_peer' => false]];
    $mail->SMTPSecure = 'tls';                                        //tipo de segurança
    $mail->Port = 587;                                                //porta de conexão

    //dados de autenticação no servidor smtp
    $mail->Username = ' ';              //usuário do smtp (email cadastrado no servidor)
    $mail->Password = '  ';                      //senha ****CUIDADO PARA NÃO EXPOR ESSA INFORMAÇÃO NA INTERNET OU NO FÓRUM DE DÚVIDAS DO CURSO****


    $mail->From = $registroemail['email'];                                  //Sets the From email address for the message
    $mail->FromName = ('myticketclub.com.br');                      //Sets the From name of the message
    $mail->AddAddress($registroemail['email']);                               //Adds a "To" address
    $mail->AddCC('contato@myticketclub.com.br');                           //Adds a "Cc" address
    $mail->WordWrap = 50;                                           //Sets word wrapping on the body of the message to a given number of characters
    $mail->IsHTML(true);                                            //Sets message type to HTML    
    $mail->Subject = ('Sua resposta sobre: ' . $registroemail['titulo'] . '');                       //Sets the Subject of the message
    $mail->Body = $mensagem;                                        //An HTML or plain text message body	


    if ($mail->Send()) {

        //Send an Email. Return true on success or false on error
        header('Location: meus_anuncios');
    } else {

        echo 'Há um Erro, favor entrar em contato com o admin do site!<br>';
        echo 'Erro:' . $mail->ErrorInfo;
    }
} else {

    echo "Erro ao registrar o usu�rio!";
}

