<?php 
    
require_once 'conexao.php';


function formatarData($data) {
  // Convertendo a string para objeto DateTime
  $dateTime = new DateTime($data);

  // Obtendo a parte da data no formato brasileiro
  $dataFormatada = $dateTime->format('d/m/Y');

  return $dataFormatada;
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Carona - App de Carona Universitária</title>
  <link rel="stylesheet" href="../css/buscar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 
</head>
<div class ="body_buscar">
  <div class="content">
    <h1>Buscar Carona</h1>


    <?php 
        $sql = "SELECT c.*, u.nome, u.telefone
        FROM carona c
        JOIN (
            SELECT id_usuario, MAX(data_postagem) AS max_data_postagem
            FROM carona
            GROUP BY id_usuario
        ) t ON c.id_usuario = t.id_usuario AND c.data_postagem = t.max_data_postagem
        JOIN usuario u ON c.id_usuario = u.id
        ORDER BY c.data_postagem DESC;";

      if ($result = $pdo->query($sql)) {
        $destino = array();
        $rua = array();
        $bairro = array();
        $data_postagem = array();
        $lugares = array();
        $data_carona = array();
        $hora_carona = array();
        $nome = array();
        $telefone = array();
        $carro = array();
        $i=0;
    
      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
       
        $rua[$i] = $row['rua'];
        $bairro[$i] = $row['bairro'];
        $data_postagem[$i] = $row['data_postagem'];
        $lugares[$i] = $row['lugares'];
        $data_carona[$i] = $row['data_carona'];
        $hora_carona[$i] = $row['hora_carona'];
        $nome[$i] = $row['nome'];
        $telefone[$i] = $row['telefone'];
        $carro[$i] = $row['carro'];
        $destino[$i] = $row['destino'];
      ?>
      <?php echo $nome[$i] ?> - Publicação <?php echo formatarData($data_postagem[$i]) ?>
    <div class="card">
      <div class="col-vertical" id="saida">
        <div class="section-heading">
          <h2><i class="fas fa-map-marker-alt"></i> Saída</h2>
          <div class="row">
            <p><strong>Rua:</strong> <?php echo $rua[$i] ?> <br> </p>
            <p><strong>Bairro:</strong> <?php echo $bairro[$i] ?></p>
            <p><strong>Data de Saída:</strong><?php echo  formatarData($data_carona[$i]) ?></p>
            <p><strong>Horário de Saída:</strong> <?php echo  $hora_carona[$i] ?></p>
          </div>
        </div>
      </div>
      <div class="col-vertical" id="usuario">
        <div class="section-heading">
          <h2><i class="fas fa-user"></i> Usuário</h2>
          <div class="row">
            <p><strong>Nome:</strong><?php echo $nome[$i] ?> </p>
            <p><strong>Contato:</strong> <?php echo  $telefone[$i] ?> </p>
          </div>
        </div>
      </div>
      <div class="col-vertical" id="destino">
        <div class="section-heading">
          <h2><i class="fas fa-map-pin"></i> Destino</h2>
          <div class="row">
            <p><strong>Destino:</strong> <?php echo  $destino[$i] ?></p>
            <br>
            <p><strong>Carro:</strong> <?php echo  $carro[$i] ?></p>
          </div>
        </div>
      </div>
      
    </div>
    <div class="espacamento"></div>
    
        <?php
        $i++;
       }
      }

    ?>
  


    <div class="map-container">
      <iframe
        width="100%"
        height="100%"
        frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.6665673178145!2d-43.98248468510791!3d-19.922731586607302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTPCsDU4JzExLjkiUyA0M8KwMzUnMzUuNiJX!5e0!3m2!1sen!2sbr!4v1638728213728!5m2!1sen!2sbr"
        allowfullscreen="" aria-hidden="false" tabindex="0">
      </iframe>
    </div>

    <!-- Mapa do Google -->
    <div id="map"></div>
  </div>

  <!-- Incluindo a API do Google Maps -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0Cf4j7Uk9sEFpKyLaHeVTiy-UX9LCB74&callback=initMap" async defer></script>

  <script>
    // Função de inicialização do mapa
    function initMap() {
      // Coordenadas para o centro do mapa (exemplo: São Paulo, Brasil)
      const center = { lat: -23.5505, lng: -46.6333 };

      // Opções do mapa
      const mapOptions = {
        zoom: 12,
        center: center,
      };

      // Criando um novo mapa
      const map = new google.maps.Map(document.getElementById("map"), mapOptions);

      // Exemplo de marcador no mapa
      const marker = new google.maps.Marker({
        position: center,
        map: map,
        title: "Localização"
      });
    }
  </script>
</body>

<script src="../js/buscar.js"></script>
</html>
