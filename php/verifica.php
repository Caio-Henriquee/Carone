<?php 
require 'conexao.php'; //conexao com o banco de dados

if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){

    require_once 'UsuarioClass.php';
    $u = new Usuario();

    $usuLogado = $u->logged($_SESSION['idUser']);
    $nome = $usuLogado['nome'];
    $cpf = $usuLogado['cpf'];
    $tel = $usuLogado['telefone'];
    $email = $usuLogado['email'];
    $dt = converterData($usuLogado['data_nasci']);
    


}else{
    header("Location: ../login.php");
}


function converterData($dataSql) {
    // Converte a data do formato SQL para o formato brasileiro
    $dataBrasileira = date('d-m-Y', strtotime($dataSql));

    return $dataBrasileira;
}
?>