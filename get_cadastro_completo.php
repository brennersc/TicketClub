<?php

session_start();

      if(!isset($_SESSION['id_usuario'])){
          header('Location: cadastro?erro=1');
      }

require_once('db_class.php');

$nome             = strip_tags(trim(addslashes($_POST['nome'])));
$apelido          = strip_tags(trim(addslashes($_POST['apelido'])));
$cpf              = strip_tags(trim(addslashes($_POST['cpf'])));
$sexo             = strip_tags(trim(addslashes($_POST['sexo'])));
$celular          = strip_tags(trim(addslashes($_POST['celular'])));
$wpp              = strip_tags(trim(addslashes($_POST['wpp'])));
$cidade           = strip_tags(trim(addslashes($_POST['cidade'])));
$estado           = strip_tags(trim(addslashes($_POST['estado'])));
$cep              = strip_tags(trim(addslashes($_POST['cep'])));
$numero           = strip_tags(trim(addslashes($_POST['numero'])));
$complemento      = strip_tags(trim(addslashes($_POST['complemento'])));

$id_usuario = $_SESSION['id_usuario'];


if($nome == '' || $apelido == '' || $cpf == '' || $sexo == '' || $celular == '' || $id_usuario == ''){

    die();
}

$objDb = new db();
$link = $objDb->conecta_mysql();
$cadastro_existe = false;


$sql = "SELECT * FROM cadastro where id_usuario = '$id_usuario' ";

if($resultado_id = mysqli_query($link, $sql)){

    $dados_usuario = mysqli_fetch_array($resultado_id);

    if(isset($dados_usuario['id_usuario'])){

        // $cadastro_existe = true;

        $sql = "UPDATE cadastro set nome = '$nome', apelido = '$apelido', cpf = '$cpf', sexo = '$sexo', celular = '$celular', wpp = '$wpp', cidade = '$cidade', estado = '$estado', cep = '$cep', numero = '$numero', complemento = '$complemento' where id_usuario = '$id_usuario' ";
        
        if(mysqli_query($link, $sql)){
            header('Location: minha_conta');

        }else{

            echo "Erro ao registrar o usu�rio!";
        }


    }else{

        $sql = "INSERT INTO cadastro(id_usuario, nome, apelido, cpf, sexo, celular, wpp, cidade, estado, cep, numero, complemento)
        VALUES('$id_usuario', '$nome', '$apelido', '$cpf', '$sexo', '$celular', '$wpp', '$cidade', '$estado', '$cep', '$numero', '$complemento')";

        if(mysqli_query($link, $sql)){
            header('Location: minha_conta');

        }else{

            echo "Erro ao registrar o usu�rio!";
        }
    }
}else{
    echo 'Erro ao tentar localizar o registro de email';


}


// if($cadastro_existe){

//     $sql = "UPDATE cadastro set nome = '$nome', apelido = '$apelido', cpf = '$cpf', sexo = '$sexo', celular = '$celular', wpp = '$wpp', cidade = '$cidade', estado = '$estado', cep = '$cep', numero = '$numero', complemento = '$complemento' where id_usuario = '$id_usuario' ";
    
    
//     if(mysqli_query($link, $sql)){
//                     //echo "Atualizado";

//     }else{

//         echo "Erro ao registrar o usu�rio!";
//     }

//     die();
// }

// $sql = "INSERT INTO cadastro(id_usuario, nome, apelido, cpf, sexo, celular, wpp, cidade, estado, cep, numero, complemento)
// VALUES('$id_usuario', '$nome', '$apelido', '$cpf', '$sexo', '$celular', '$wpp', '$cidade', '$estado', '$cep', '$numero', '$complemento')";

// if(mysqli_query($link, $sql)){
//         //echo "cadastrado";

// }else{

//     echo "Erro ao registrar o usu�rio!";
// }
?>

