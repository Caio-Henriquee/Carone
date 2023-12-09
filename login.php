<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./css/loginNovo.css">
</head>

<body>
  <div class="page">
    <div class="container">
      <div class="formulario">

        <div class="header">
          
          <h3>CAR<span class="color_title">ONE</span></h3>
        </div>

        <form action="./php/logar.php" method="POST">
          <div class="input">
            <i class="fa fa-envelope icone"></i>
            <input class="input" name="email" type="email" placeholder="Email" required>
          </div>
          <div class="input">
            <i class="fa fa-lock icone"></i>
            <input class="input" name="senha" type="password" placeholder="Password" required>
          </div>
          <div class="remember">
            <a href="./php/telaSenha.php">Perdeu a senha?</a>
          </div>
          <input type="submit" name="login" value="Login" class="btn btn-login">
          <a href="./php/cadastro.php" class="btn btn-registrar">Register</a>
        </form>
      </div>

    </div>
  </div>
 
</body>

</html>