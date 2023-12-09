<?php 
session_start();
unset($_SESSION['idUser']); //comando unset é para matar a sessao
header("Location: ../login.php"); //redirecionar para a pagina login quando a sessao for destruida 

?>