<?php 
 include_once 'conexao.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/ofertarCss.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <title>Ofertar Carona</title>
</head>
<body>


  <?php 
  
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); //fazer com que um arry receba os dados que estao vindo
  
  if(!empty($dados["addBancoCarona"])) { 
    

    $queryUsu= "INSERT INTO carona (id_usuario, destino, rua, bairro, lugares, data_carona, hora_carona, carro) 
    VALUES(:id_usuario, :destino, :rua, :bairro, :lugares, :data_carona, :hora_carona, :carro)"; //query que vai inserir no bando de dados os dados 
    $add_carona = $pdo->prepare($queryUsu); //a variavel pdo esta no conexao
    //atribuir os valores aos links que foram criados no na query
    $add_carona->bindParam(':id_usuario', $_SESSION['idUser'], PDO::PARAM_STR);
    $add_carona->bindParam(':destino', $dados['destino'], PDO::PARAM_STR);
    $add_carona->bindParam(':rua', $dados['rua'], PDO::PARAM_STR);
    $add_carona->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
    $add_carona->bindParam(':lugares', $dados['lugares'], PDO::PARAM_INT);
    $add_carona->bindParam(':data_carona', $dados['data_carona'], PDO::PARAM_STR);
    $add_carona->bindParam(':hora_carona', $dados['hora_carona'], PDO::PARAM_STR);
    $add_carona->bindParam(':carro', $dados['carro'], PDO::PARAM_STR);


    $add_carona->execute();

    if($add_carona->rowCount()) {
        echo ' <h1> mensagem enviada com sucesso </h1>';
        header('Location: index.php');
    }else{
      echo ' <h1> erro </h1>';
    }

  }
?>

  <div class="container">
    <div class="titulo">Ofertar Carona</div>
    <form id="carpoolForm" action="" method="POST">
        <!-- Coluna 1 -->
        <div class="column">
          <div class="label-input-group">
            <label for="date">Data da Carona:</label>
            <input type="date" id="data_carona" name="data_carona" required>
          </div>

          <div class="label-input-group">
            <label for="neighborhood">Saida:</label>
            <input type="text" id="bairro" name="bairro" required placeholder="BAIRRO OU FACULDADE">
          </div>

          <div class="label-input-group">
            <label for="time">Hora:</label>
            <input type="time" id="hora_carona" name="hora_carona" required>
          </div>

          <div class="label-input-group">
            <label for="time">Destino:</label>
            <input type="text" id="destino" name="destino" required placeholder="BAIRRO OU FACULDADE">
          </div>
        </div>

        <!-- Coluna 2 -->
        <div class="column">
          <div class="label-input-group">
            <label for="street">Rua:</label>
            <input type="text" id="rua" name="rua" required>
          </div>

          <div class="label-input-group">
            <label for="passengers"> Nº de pessoas:</label>
            <input type="number" id="lugares" name="lugares" min="1" required>
          </div>

          <div class="label-input-group">
            <label for="car">carro:</label>
            <input type="text" id="carro" name="carro" required placeholder="MODELO">
          </div>
          <button type="submit" value=" " name="addBancoCarona">Ofertar Carona</button>
        </div>
      </form>
  </div>
  <script src="../js/OfertarScript.js"></script>
</body>
</html>