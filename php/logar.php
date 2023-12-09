
<?php
//parametos para a conexao do banco

//nesse caso a variavel login e senha estao recebendo por POST os campos email e senha que esta vindo do formulario(atraves do name do input)

if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) { //metodo isset verificar se o email existe/ metodo empty verificar se tem nao tem valor 

    //requirindo os arquivos

    require 'conexao.php';
    require 'UsuarioClass.php';

    //estanciando objeto do tipo usuario
    $u = new Usuario();

    $email = addslashes($_POST['email']); //o comando addslaashes nao deixa qualqeur pessoa manipular o banco atraves dos insputs
    $senha = addslashes($_POST['senha']);

    if ($u->login($email, $senha) == true) {
        if (isset($_SESSION['idUser'])) { //se exister a nossa sessao ele entra no sitema
            header("Location: index.php");
        } else {
            header("Location: ../login.php"); //se nao existir a sessao ele não entra no sistma
        }
    } else {
        header("Location: ../login.php"); //caso de errado continua na tela de login
    }
} else {
    header("Location: ../login.php");
}



?>