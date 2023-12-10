<?php

global $msg;
global $cpf;
global $email;

if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['cpf']) && !empty($_POST['cpf'])) {
    require 'conexao.php';
    require 'UsuarioClass.php';

    $u = new Usuario();

    $email = addslashes($_POST['email']);
    $cpf = addslashes($_POST['cpf']);

    if ($u->senha($email, $cpf) == true) {
        // Adiciona os parâmetros à URL antes de redirecionar
        header("Location: trocarSenha.php?cpf=" . urlencode($cpf) . "&email=" . urlencode($email));
    } else {
        $msg = "Dados errados";
        header("Location: telaSenha.php?msg=" . urlencode($msg) . "&cpf=" . urlencode($cpf) . "&email=" . urlencode($email));
        exit();
    }
}
?>
