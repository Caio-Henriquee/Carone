<?php

session_start(); //dando inicio ao sistema 

//parametros para a conexao
$localhost = "localhost"; 
$user = "root";
$passw = "";
$banco = "carone";

global $pdo; //variavel global para pode ser acessada por outos arquivos

try {
    //conexao orientada a objeto 
$pdo = new PDO("mysql:dbname=".$banco."; host=".$localhost, $user, $passw); //conecao com o banco de dados
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //padrao da conexao com o banco de dados


}catch(PDOException $e){ //tratar os erros
    echo "ERRO".$e->getMessage();
    exit;
};


?>