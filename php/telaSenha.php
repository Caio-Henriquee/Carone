<?php 
require_once 'scriptSenha.php';
$msg = isset($_GET['msg']) ? urldecode($_GET['msg']) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/loginNovo.css">
</head>

<body>
  <div class="page">
    <div class="container">
      <div class="formulario">

        <div class="header">
          <h3>Trocar senha</h3>
        </div>

        <form action="./scriptSenha.php" method="POST">
          <div class="input"> 
            <i class="fa fa-envelope icone"></i>
            <input class="input" name="email" type="email" placeholder="Email" required>
          </div>
          <div class="input">
            <i class="fa fa-lock icone"></i>
            <input class="input" name="cpf" type="text" id="cpf" placeholder="CPF" required  maxlength="14" >
          </div>
          <div class="remember">
            <h4 class="erro_mensagem"><?php echo $msg; ?></h4>
          </div>
          <input type="submit" name="login" value="Continuar" class="btn btn-login">
          
        </form>
      </div>

    </div>
  </div>
  
  <script>
    document.getElementById('cpf').addEventListener('input', function (event) {
      let inputValue = event.target.value;
  
      // Remove todos os caracteres não numéricos
      inputValue = inputValue.replace(/\D/g, '');
  
      // Aplica a máscara: XXX.XXX.XXX-XX
      inputValue = inputValue.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');
  
      // Atualiza o valor no campo
      event.target.value = inputValue;
    });
  </script>
</body>

</html>
