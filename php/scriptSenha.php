
<?php

global $msg ;
global $cpf;
global $email;

if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['cpf']) && !empty($_POST['cpf'])) { //metodo isset verificar se o email existe/ metodo empty verificar se tem nao tem valor 

    //requirindo os arquivos

    require 'conexao.php';
    require 'UsuarioClass.php';

    //estanciando objeto do tipo usuario
    $u = new Usuario();

    $email = addslashes($_POST['email']); //o comando addslaashes nao deixa qualqeur pessoa manipular o banco atraves dos insputs
    $cpf = addslashes($_POST['cpf']);
    
    if ($u->senha($email, $cpf) == true) {
        header("Location: trocarSenha.php");
    } else {
        $msg = "Dados errados";
        header("Location: telaSenha.php?msg=" . urlencode($msg) . "&cpf=" . urlencode($cpf) . "&email=" . urlencode($email));
        exit();
    }
}   


?>