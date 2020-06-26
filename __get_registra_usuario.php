<?php

if(!isset($_SESSION['id_usuario'])){
    header('Location: cadastro?erro=1');
}

require_once('db_class.php');

$email          = strip_tags(trim(addslashes($_POST['email'])));
$termos_de_uso  = strip_tags(trim(addslashes($_POST['termos_de_uso'])));	//$_POST['termos_de_uso'];
$senha          = strip_tags(trim(addslashes(md5($_POST['senha']))));		//md5($_POST['senha']);
$senhaConfirma  = strip_tags(trim(addslashes(md5($_POST['senhaConfirma']))));	//md5($_POST['senhaConfirma']);


if($email == '' || $termos_de_uso == '' || $senha == '' || $senhaConfirma == ''){

    header('Location: cadastro?preencher=1');

    die();
}

$objDb = new db();
$link = $objDb->conecta_mysql();
$email_existe = false;

    //verificar se o e-mail já existe
    $sql = "SELECT * FROM usuarios WHERE email = '$email' ";
    if($resultado_id = mysqli_query($link, $sql)){

        $dados_usuario = mysqli_fetch_array($resultado_id);

        if(isset($dados_usuario['email'])){

            $email_existe = true;

        }

    }else{
        echo 'Erro ao tentar localizar o registro de email';
    }

    if($email_existe){

        $retorno_get = '';

        if($email_existe){
            $retorno_get .= "erro_email=1&";
        }

        header('Location: cadastro?' . $retorno_get);
        die();

    }

    if ($senha == $senhaConfirma) {

        	$email            = strip_tags(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
        	$verifica         = base64_encode($email);
        	$data_validade    = date('Y-m-d H:i:s', strtotime('+5 day'));
        

        	$mensagem = '      <h1 align="center">Seja bem vindo a Ticket Club!</h1>
                            <h3>
                                <br>
                                <p >Parabéns por se juntar à <b>Ticket Club</b>.</p><br>
                                <p>Estamos felizes por voce ter feito essa escolha.</p>
                                <p>Seu cadastro em nosso site foi realizado com sucesso, agora voce só precisa confirmar seu EMAIL para ativar a sua nova conta.</p>
                                <p>Estamos enviando um link de confirmação.</p>
                                <p>Você tem o prazo de 3 dias para confirmar o cadastro para sua conta ser ativada.</p>
                                <p>Então não perca tempo e se junte a nós!</p>
                                <br>
                                <a href="http://myticketclub.com.br/confirma_email?verifica='.$verifica.'">clique aqui para ativar sua conta</a>
                                <br>
                                <br>
                                <P>Guarde seus dados de acesso com segurança e não os forneça para ninguém.</P>
                                <br><br>

                                <p>Seja bem vindo a Ticket Club!</p>

                                <p>Em caso de dúvidas fique à vontade em nos contatar a qualquer momento através 
                                da opção contato na página principal do nosso site.</p>
                                <br>
                                <p>Atenciosamente,</p>
                                <p>Ticket Club</p>
                                <br>
                                <p>https://www.myticketclub.com.br</p>

                            </h3> ';

		$sql = "INSERT INTO usuarios (email, senha, termos_de_uso) VALUES ('$email', '$senha', '$termos_de_uso')";    
	
 	

        //executar a query
        if(mysqli_query($link, $sql)){                

            require 'PHPMailer/PHPMailerAutoload.php';
        
            //configurações básicas de endereço e protoloco 

            $mail = new PHPMailer;                                        	//faz a instância do objeto PHPMailer
            //$mail->SMTPDebug = 2;                                    		//habilita o debug se parâmetro for true
            $mail->isSMTP();                                              	//seta o tipo de protocolo
            $mail->Host = 'smtp.gmail.com';                               	//define o servidor smtp
            $mail->SMTPAuth = true;                                       	//habilita a autenticação via smtp
            $mail->SMTPOptions = ['ssl' => ['verify_peer' => false ]];
            $mail->SMTPSecure = 'tls';                                    	//tipo de segurança
            $mail->Port = 587;                                            	//porta de conexão

            //dados de autenticação no servidor smtp
            $mail->Username = ' ';          	//usuário do smtp (email cadastrado no servidor)
            $mail->Password = '  ';                  	//senha ****CUIDADO PARA NÃO EXPOR ESSA INFORMAÇÃO NA INTERNET OU NO FÓRUM DE DÚVIDAS DO CURSO****


            $mail->From = $_POST['email'];                              	//Sets the From email address for the message
            $mail->FromName = ('myticketclub.com.br');                  	//Sets the From name of the message
            $mail->AddAddress($_POST['email']);   				            //Adds a "To" address
            $mail->AddCC('contato@myticketclub.com.br');                   		//Adds a "Cc" address
            $mail->WordWrap = 50;                                       	//Sets word wrapping on the body of the message to a given number of characters
            $mail->IsHTML(true);                                        	//Sets message type to HTML    
            $mail->Subject = ('Confirme sua Conta!');                   	//Sets the Subject of the message
            $mail->Body = $mensagem;                                    	//An HTML or plain text message body	

	$sql = "UPDATE usuarios SET codigo = '$verifica', data_validade = '$data_validade' WHERE email = '$email'";
		
	if(mysqli_query($link, $sql)){

              if($mail->Send()){
			
                	//Send an Email. Return true on success or false on error
                	header('Location: cadastro?sucesso=1');

                }else{

                	echo 'Há um Erro, favor entrar em contato com o admin do site!<br>';
			echo 'Erro:' . $mail->ErrorInfo;
               }

            }else{          
           	echo "Erro ao registrar o ATUALIZAR DADOS!";
            }
        }else{          
           echo "Erro ao registrar o usuário!";
        }
    }else{
        header('Location: cadastro?erro_senha=1');
    }
