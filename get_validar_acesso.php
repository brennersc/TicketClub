<?php

session_start();

require_once('db_class.php');

if (!isset($_SESSION['id_usuario'])) {
    header('Location: login?erro=1');
}

$email = strip_tags(trim(addslashes($_POST['email'])));
$senha = strip_tags(trim(addslashes(md5($_POST['senha']))));

$objDb = new db();
$link = $objDb->conecta_mysql();


$sql = " SELECT id, email FROM usuarios WHERE email = '$email' AND senha = '$senha' ";

$resultado_id = mysqli_query($link, $sql);

if ($resultado_id) {

    $dados_usuario = mysqli_fetch_array($resultado_id);

    if (isset($dados_usuario['email'])) {

        $dados_usuario = 0;

        $resultado_id = 0;

        $sql = " SELECT id, email FROM usuarios WHERE email = '$email' AND senha = '$senha' AND codigo = 'valido' ";

        $resultado_id = mysqli_query($link, $sql);

        if ($resultado_id) {

            $dados_usuario = mysqli_fetch_array($resultado_id);

            if (isset($dados_usuario['email'])) {

                $_SESSION['id_usuario'] = $dados_usuario['id'];
                header('Location: ./');
            } else {

                $dados_usuario = 0;

                $resultado_id = 0;

                $sql = " SELECT id, email FROM usuarios WHERE  email = '$email' AND senha = '$senha' AND data_validade > NOW() ";

                $resultado_id = mysqli_query($link, $sql);

                if ($resultado_id) {

                    $dados_usuario = mysqli_fetch_array($resultado_id);

                    if (isset($dados_usuario['email'])) {

                        $_SESSION['id_usuario'] = $dados_usuario['id'];
                        header('Location: ./');
                    } else {

                        $email            = strip_tags(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
                        $verifica         = base64_encode($email);
                        $data_validade    = date('Y-m-d H:i:s', strtotime('+5 day'));


                        $mensagem = '      <h1 align="center">Codigo de verificação!</h1>
                            <h3>
                                <br>
                                <p >Novo codigo de verificação!</p><br>

                                <p>Você tem o prazo de 3 dias para confirmar o cadastro para sua conta ser ativada.</p>
                                <p>Então não perca tempo e se junte a nós!</p>
                                <br>
                                <a href="http://myticketclub.com.br/confirma_email?verifica=' . $verifica . '">clique aqui para ativar sua conta</a>
                                <br>
                                <br>
                                <P>Guarde seus dados de acesso com segurança e não os forneça para ninguém.</P>
                                <br><br>

                                <p>Em caso de dúvidas fique à vontade em nos contatar a qualquer momento através 
                                da opção contato na página principal do nosso site.</p>
                                <br>
                                <p>Atenciosamente,</p>
                                <p>Ticket Club</p>
                                <br>
                                <p>https://www.myticketclub.com.br</p>

                            </h3> ';

                        $sql = "UPDATE usuarios SET codigo = '$verifica', data_validade = '$data_validade' WHERE email = '$email'";

                        //executar a query
                        if (mysqli_query($link, $sql)) {

                            require 'PHPMailer/PHPMailerAutoload.php';

                            //configurações básicas de endereço e protoloco 

                            $mail = new PHPMailer;                                          //faz a instância do objeto PHPMailer
                            //$mail->SMTPDebug = 2;                                    		//habilita o debug se parâmetro for true
                            $mail->isSMTP();                                                //seta o tipo de protocolo
                            $mail->Host = 'smtp.gmail.com';                                 //define o servidor smtp
                            $mail->SMTPAuth = true;                                         //habilita a autenticação via smtp
                            $mail->SMTPOptions = ['ssl' => ['verify_peer' => false]];
                            $mail->SMTPSecure = 'tls';                                      //tipo de segurança
                            $mail->Port = 587;                                              //porta de conexão

                            //dados de autenticação no servidor smtp
                            $mail->Username = ' ';            //usuário do smtp (email cadastrado no servidor)
                            $mail->Password = '  ';                    //senha ****CUIDADO PARA NÃO EXPOR ESSA INFORMAÇÃO NA INTERNET OU NO FÓRUM DE DÚVIDAS DO CURSO****


                            $mail->From = $email;                                  //Sets the From email address for the message
                            $mail->FromName = ('myticketclub.com.br');                    //Sets the From name of the message
                            $mail->AddAddress($email);                             //Adds a "To" address
                            $mail->AddCC('contato@myticketclub.com.br');                  //Adds a "Cc" address
                            $mail->WordWrap = 50;                                         //Sets word wrapping on the body of the message to a given number of characters
                            $mail->IsHTML(true);                                          //Sets message type to HTML    
                            $mail->Subject = ('Novo codigo confirme sua Conta!');                     //Sets the Subject of the message
                            $mail->Body = $mensagem;                                      //An HTML or plain text message body	


                            if ($mail->Send()) {

                                //Send an Email. Return true on success or false on error
                                header('Location: login?cadastro_naoconfirmado=1');
                            } else {

                                echo 'Há um Erro, favor entrar em contato com o admin do site!<br>';

                                echo 'Erro:' . $mail->ErrorInfo;
                            }
                        }
                    }
                } else {
                    echo "Erro na execução da consulta, favor entrar em contato com o admin do site";
                }
            }
        } else {
            echo "Erro na execução da consulta, favor entrar em contato com o admin do site";
        }
    } else {
        header('Location: login?erro=1');
    }
} else {
    echo "Erro na execução da consulta, favor entrar em contato com o admin do site";
}
