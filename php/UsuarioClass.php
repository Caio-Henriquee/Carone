<?php

    class Usuario{

        


        public function login($email, $senha) {

            global $pdo;

            $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha"; // query para verfificar se existe o usuario no banco
            $sql = $pdo->prepare($sql); //preparar a consulta
            $sql->bindValue("email", $email); 
            $sql->bindValue("senha", md5($senha));
            $sql->execute();

            if($sql->rowCount() > 0) { //se a nossa query voltar mais de uma linha entraremos na condicao
                $dado = $sql->fetch(); //essa funcao retornara um array com os valores do select

                $_SESSION['idUser'] = $dado['id']; //criacao do idUser para receber o nosso id usario para criacao de uma sessao

                return true;
            }else{
                return false;
            }

        }

        public function logged($id) { //funcao para ve qual o usuario esta logado
            global $pdo;
            $array = array(); //trazer todos os dados
            $sql = "SELECT * FROM USUARIO WHERE id = :idUsuario"; //selecionar todos os dados da tabela usuario atraves do id
            $sql = $pdo->prepare($sql); //preparar a consulta para o banco de dados
            $sql->bindValue("idUsuario", $id); 
            $sql->execute();

            if($sql->rowCount() > 0) {
                $array = $sql->fetch(); //pegar todos os dados da consulta
            }
            return $array;
        }

        
  

    public function senha($email, $cpf) {

        global $pdo;

        $sql = "SELECT * FROM usuario WHERE email = :email AND cpf = :cpf"; // query para verfificar se existe o usuario no banco
        $sql = $pdo->prepare($sql); //preparar a consulta
        $sql->bindValue("email", $email); 
        $sql->bindValue("cpf", $cpf);
        $sql->execute();

        if($sql->rowCount() > 0) { //se a nossa query voltar mais de uma linha entraremos na condicao
            $dado = $sql->fetch(); //essa funcao retornara um array com os valores do select

            return true;
        }else{
            return false;
        }

    }
}
?>