<?php 


include_once 'conexao.php';
include_once 'scriptSenha.php';

$cpf = isset($_GET['cpf']) ? $_GET['cpf'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateBanco'])) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $queryUpdate = "UPDATE usuario SET senha = MD5(:senha) WHERE cpf = :cpf AND email = :email";
    $updateSenha = $pdo->prepare($queryUpdate);

    $updateSenha->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $updateSenha->bindParam(':email', $email, PDO::PARAM_STR);
    $updateSenha->bindParam(':senha', $dados['senha1'], PDO::PARAM_STR);

    $updateSenha->execute();

    if ($updateSenha->rowCount()) {
        echo '<h1>Senha atualizada com sucesso</h1>';
        header('Location: ../login.php');
    } else {
        echo 'Erro ao atualizar a senha';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/loginNovo.css">
  <style>
    .error-message {
      color: red;
    }
  </style>
</head>

<body>

  <div class="page"> 
    <div class="container">
      <div class="formulario">

        <div class="header">
          <h3>Trocar senha</h3>
        </div>

        <form action="" method="POST" onsubmit="return validateForm()">
          <div class="input">
            <i class="fa fa-envelope icone"></i>
            <input class="input" name="senha1" id="senha1" type="password" placeholder="Senha" required>
          </div>
          <div class="input">
            <i class="fa fa-lock icone"></i>
            <input class="input" name="senha2" type="password" id="senha2" placeholder="Confirma Senha">
          </div>
          <div class="error-message" id="passwordMismatch"></div>
          <input type="submit" name="updateBanco" value="Confirmar senha" class="btn btn-login">
        </form>
      </div>
    </div>
  </div>

  <script>
    function validateForm() {
      var senha1 = document.getElementById("senha1").value;
      var senha2 = document.getElementById("senha2").value;

      if (senha1 !== senha2) {
        document.getElementById("passwordMismatch").innerHTML = "As senhas não são iguais.";
        return false;
      } else {
        document.getElementById("passwordMismatch").innerHTML = "";
        return true;
      }
    }
  </script>
</body>

</html>
