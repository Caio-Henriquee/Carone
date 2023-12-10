<?php 

require 'verifica.php'; //chamar o vereifica para ve se o usuario esta logado
if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): //verificar se a sessao existe:?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="../node_modules/bulma/css/bulma.css">
    <link rel="stylesheet" href="../css/IndexStyle.css">
</head>

<body>
    <header>
        <nav class="navbar " role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="./index.php">
             
                        <img src="../img/icon_localizacao.png" alt="Placeholder image">
                  
                    <h1 class="title is-4 ">CAR<span class="color_title">ONE</span></h1>
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                    data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>


            <div class="navbar-end">
                <div id="navbarBasicExample" class="navbar-menu">
                    <div class="navbar-start"> 
                         <a href="index.php" class="navbar-item">
                            Home
                        </a>
                        <a href="index.php?pg=perfil" class="navbar-item">
                            Perfil
                        </a>
                        <a href="index.php?pg=quemSomos" class="navbar-item">
                            Sobre nós
                        </a>
                        <a class="navbar-item" href="logout.php" >
                            Sair
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

 

    <div>

        <?php

            $pg = "";

            if (isset($_GET['pg']) && !empty($_GET['pg'])){
                $pg = addslashes($_GET['pg']);
            }

            switch ($pg) {
                case 'perfil': require 'perfil.php';
                break;
                case 'quemSomos': require '../html/quemSomos.html';
                break;
                case 'ofertar': require 'ofertar.php';
                break;
                case 'buscar': require 'buscar.php';
                break;
                default: require 'telaInicial.php';
            }
        ?>

    </div>



    <footer class="footer is-link">
        <div class="content has-text-centered is-link">
            <p>
                <strong is-link>TODOS OS DIREITOS RESERVADOS AO GRUPO</strong>
            </p>

        

    </footer>


</body>


<script src="../js/IndexScript.js"></script>

</html>

<?php else: header("Location: ../login.php"); endif; ?>