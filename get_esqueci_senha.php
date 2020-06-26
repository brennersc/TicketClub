<?php

session_start();

      if(!isset($_SESSION['id_usuario'])){
          header('Location: cadastro?erro=1');
      }

require_once('db_class.php');

$emailRecupera = strip_tags(trim(addslashes($_POST['emailRecupera'])));

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "SELECT id, email FROM usuarios WHERE email = '$emailRecupera'";

$resultado_id = mysqli_query($link, $sql);

$dados_usuario = mysqli_fetch_array($resultado_id);


if($dados_usuario == NULL){


	header('Location: esqueci_senha?erro=1');

}else{

	$dados_usuario = 0;

	$resultado_id = mysqli_query($link, $sql);



	if($resultado_id){
	
		$email = strip_tags(filter_input(INPUT_POST, 'emailRecupera', FILTER_SANITIZE_STRING));

		$codigo = base64_encode($email);
		
		$data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));
		
		$mensagem = 

		'<br/>
		<b><h2><center>Recebemos uma tentativa de recuperação de senha, caso não tenha sido você, desconsidere!!!</center></h2></b>
		<br/>
		<p><center><h3><a href="http://myticketclub.com.br/recuperar?codigo='.$codigo.'">Clique aqui!</a></h3></center></p>
		<br/>';	

		$sql = "INSERT INTO codigos SET codigo = '$codigo', data = '$data_expirar' ";

		if(mysqli_query($link, $sql)){

			require 'PHPMailer/PHPMailerAutoload.php';
		
			//configurações básicas de endereço e protoloco 

			$mail = new PHPMailer;                                        	//faz a instância do objeto PHPMailer
			$mail->SMTPDebug = 2;                                    	//habilita o debug se parâmetro for true
			$mail->isSMTP();                                              	//seta o tipo de protocolo
			$mail->Host = 'smtp.gmail.com';                               	//define o servidor smtp
			$mail->SMTPAuth = true;                                       	//habilita a autenticação via smtp
			$mail->SMTPOptions = [ 'ssl' => [ 'verify_peer' => false ] ];
			$mail->SMTPSecure = 'tls';                                    	//tipo de segurança
			$mail->Port = 587;                                            	//porta de conexão

			//dados de autenticação no servidor smtp
			$mail->Username = ' ';    //usuário do smtp (email cadastrado no servidor)
			$mail->Password = '  ';          //senha ****CUIDADO PARA NÃO EXPOR ESSA INFORMAÇÃO NA INTERNET OU NO FÓRUM DE DÚVIDAS DO CURSO****


			$mail->From = $_POST["emailRecupera"];                        	//Sets the From email address for the message
			$mail->FromName =('myticketclub.com.br');                      	//Sets the From name of the message
			$mail->AddAddress($_POST['emailRecupera']);             	//Adds a "To" address
			$mail->AddCC('contato@myticketclub.com.br');                		//Adds a "Cc" address
			$mail->WordWrap = 50;                                         	//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);                                          	//Sets message type to HTML    
			$mail->Subject = ('Esqueceu a sua senha?');                     //Sets the Subject of the message
			$mail->Body = $mensagem;                              		//An HTML or plain text message body


		  if($mail->Send()){                                              //Send an Email. Return true on success or false on error

		  	header('Location: esqueci_senha?sucesso=1');

		  }else{
		  	echo 'Há um Erro, favor entrar em contato com o admin do site!<br>';
		  	echo 'Erro:' . $mail->ErrorInfo;
		  }
		}

	}else{  
		echo "Erro na execução da consulta, favor entrar em contato com o admin do site";
	}
}


?>