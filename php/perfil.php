<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="perfil-titulo">Perfil</h1>
        </div>
        <div class="perfil">
            <div class="info-lado">
                <div class="info-item">
                    <p class="info-titulo ">Nome:</p>
                    <p> <?php echo $nome; ?></p>
                </div>
                <div class="info-item">
                    <p class="info-titulo">Nascimento:</p>
                    <p><?php echo $dt; ?></p>
                </div>
                <div class="info-item">
                    <p class="info-titulo">Telefone:</p>
                    <p><?php echo $tel; ?></p>
                </div>
            </div>
            <div class="info-lado">
                <div class="info-item">
                    <p class="info-titulo">Email:</p>
                    <p><?php echo $email; ?></p>
                </div>
                <div class="info-item">
                    <p class="info-titulo">CPF:</p>
                    <p><?php echo $cpf; ?></p>
                </div>
                <div class="info-item">
                    <p class="info-titulo">Senha:</p>
                    <p>********</p>
                </div>
                <div class="link_senha"><a href="./telaSenha.php">TROCAR SENHA</a></div>
            </div>
        </div>
    </div>

    <div class="space"></div>

   

        
    </div>

    <script>
        // Adiciona um evento de clique ao botão "Alterar Dados" na tela principal
        document.getElementById('btnAlterar').addEventListener('click', function () {
            // Exibe a tela de alteração
            document.getElementById('alterarTela').style.display = 'flex';
            // Oculta a tela principal
            document.querySelector('.container').style.display = 'none';
        });
    
        // Adiciona um evento de clique ao botão "Salvar" na tela de alteração
        document.getElementById('btnSalvar').addEventListener('click', function () {
            var novoNome = document.getElementById('novoNome').value;
            var novoEmail = document.getElementById('novoEmail').value;
            var novaDataNascimento = document.getElementById('novaDataNascimento').value;
            var novoCPF = document.getElementById('novoCPF').value;
            var novaSenha = document.getElementById('novaSenha').value;
    
            document.querySelector('.perfil-titulo').textContent = novoNome;
            document.querySelector('.info-lado p:nth-child(2)').textContent = novoEmail;
            document.querySelector('.info-lado p:nth-child(4)').textContent = novaDataNascimento;
            document.querySelector('.info-lado p:nth-child(6)').textContent = novoCPF;
            document.querySelector('.info-lado p:nth-child(8)').textContent = novaSenha;
    
            // Oculta a tela de alteração
            document.getElementById('alterarTela').style.display = 'none';
            // Exibe a tela principal
            document.querySelector('.container').style.display = 'flex';
        });
    </script>
    

    
</body>
</html>