<?php 
  
 include_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../node_modules/bulma/css/bulma.css">
  <link rel="stylesheet" href="../css/cadastro.css">
  <title>Cadastro</title>
</head>

<body>

<?php 
  
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); //fazer com que um arry receba os dados que estao vindo
  
  if(!empty($dados["addBanco"])) { 
    

    $queryUsu= "INSERT INTO usuario (nome, cpf, data_nasci, telefone, email, senha) VALUES(:nome, :cpf, :data_nasci, :telefone, :email, MD5(:senha))"; //query que vai inserir no bando de dados os dados 
    $add_contato = $pdo->prepare($queryUsu); //a variavel pdo esta no conexao
    //atribuir os valores aos links que foram criados no na query
    $add_contato->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $add_contato->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
    $add_contato->bindParam(':data_nasci', $dados['data_nasci'], PDO::PARAM_STR);
    $add_contato->bindParam(':telefone', $dados['telefone'], PDO::PARAM_STR);
    $add_contato->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $add_contato->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);


    $add_contato->execute();

    if($add_contato->rowCount()) {
        echo ' <h1> mensagem enviada com sucesso </h1>';
        header('Location: ../login.php');
    }else{
      echo ' <h1> erro </h1>';
    }

  }
?>
<div class=" centraliza_title is-grouped-centered"><h3 class="title is-3">Cadastro</h3></div>
<div class="container">
  <div class="columns">
    <div class="column is-full">
      <div class="field">
        <form action="" method="POST">
          <label class="label">Nome</label>
          <div class="control">
            <input class="input" type="text" placeholder="Nome" required name="nome">
          </div>
      </div>
    </div> 
  </div>

  <div class="columns">
    <div class="column is-full">
      <div class="field">
        <label class="label">CPF</label>
        <div class="control">
          <input class="input" type="text" placeholder=" cpf" required name="cpf" id="cpf" maxlength="13">
        </div>
      </div>
    </div> 
  </div>

  <div class="columns">
    <div class="column is-full">
      <div class="field">
        <label class="label">Data nascimento</label>
        <div class="control">
          <input class="input" type="date" placeholder=" Data de nascimento" required name="data_nasci">
        </div>
      </div>
    </div> 
  </div>

  <div class="columns">
    <div class="column is-full">
      <div class="field">
        <label class="label">Telefone</label>
        <div class="control">
          <input class="input" type="text" placeholder=" Telefone" id="telefone" required name="telefone">
        </div>
      </div>
    </div> 
  </div>

  <div class="columns">
    <div class="column is-full">
      <div class="field">
        <label class="label">Email</label>
        <div class="control">
          <input class="input" type="email" placeholder=" email" required name="email">
        </div>
      </div>
    </div> 
  </div>

  <div class="columns">
    <div class="column is-full">
      <div class="field">
        <label class="label">Senha</label >
        <div class="control">
          <input class="input" type="password" name="senha" placeholder="Senha" required>
        </div>
        <div class="field is-grouped is-grouped-centered">
          <button class="button button_color is-grouped-centered" type="submit" value="Enviar" name="addBanco">Enviar</button>
        </div>
    
        </form>
      </div>
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

document.getElementById('telefone').addEventListener('input', function (event) {
  let inputValue = event.target.value;
  
  // Remove todos os caracteres não numéricos
  inputValue = inputValue.replace(/\D/g, '');

  // Aplica a máscara: (nn)nnnnn-nnnn
  inputValue = inputValue.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1)$2-$3');

  // Atualiza o valor no campo
  event.target.value = inputValue;
});

  
</script>


</body>

</html>