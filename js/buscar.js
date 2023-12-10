// Selecionando as seções de Saída, Usuário e Destino pelo ID e aplicando estilos
const saidaSection = document.getElementById('saida');
saidaSection.style.backgroundColor = '#F7EED6'; // Alterando a cor de fundo da seção Saída

const usuarioSection = document.getElementById('usuario');
usuarioSection.style.backgroundColor = '#E9E3D6'; // Alterando a cor de fundo da seção Usuário

const destinoSection = document.getElementById('destino');
destinoSection.style.backgroundColor = '#D6E3E9'; // Alterando a cor de fundo da seção Destino

// Função para criar animação de mudança de cor
function changeColorWithAnimation(element, color) {
    element.animate(
      [
        { backgroundColor: '#fff' }, // Cor inicial (branco)
        { backgroundColor: color }  // Cor final (a que foi passada como argumento)
      ],
      {
        duration: 1000, // Duração da animação em milissegundos (1 segundo)
        iterations: 1      // Número de iterações (1 para executar uma vez)
      }
    );
  }
  
  // Selecionando as seções de Saída, Usuário e Destino pelo ID e aplicando animações
  const saidaSection = document.getElementById('saida');
  changeColorWithAnimation(saidaSection, '#F7EED6'); // Animando a cor de fundo da seção Saída
  
  const usuarioSection = document.getElementById('usuario');
  changeColorWithAnimation(usuarioSection, '#E9E3D6'); // Animando a cor de fundo da seção Usuário
  
  const destinoSection = document.getElementById('destino');
  changeColorWithAnimation(destinoSection, '#D6E3E9'); // Animando a cor de fundo da seção Destino

  // Função para criar animação de mudança de cor
function changeColorWithAnimation(element, color) {
    element.animate(
      [
        { backgroundColor: '#fff' }, // Cor inicial (branco)
        { backgroundColor: color }  // Cor final (a que foi passada como argumento)
      ],
      {
        duration: 1000, // Duração da animação em milissegundos (1 segundo)
        easing: 'ease-in-out' // Tipo de transição da animação
      }
    );
  }
  
  // Selecionando as seções de Saída, Usuário e Destino pelo ID e aplicando animações
  const saidaSection = document.getElementById('saida');
  changeColorWithAnimation(saidaSection, '#F7EED6'); // Animando a cor de fundo da seção Saída
  
  const usuarioSection = document.getElementById('usuario');
  changeColorWithAnimation(usuarioSection, '#E9E3D6'); // Animando a cor de fundo da seção Usuário
  
  const destinoSection = document.getElementById('destino');
  changeColorWithAnimation(destinoSection, '#D6E3E9'); // Animando a cor de fundo da seção Destino
  
  // Função para aplicar efeito de fade-in nas seções
function fadeIn(element) {
    let opacity = 0;
    element.style.opacity = 0;
  
    function increaseOpacity() {
      opacity += 0.01;
      element.style.opacity = opacity;
  
      if (opacity < 1) {
        requestAnimationFrame(increaseOpacity);
      }
    }
  
    requestAnimationFrame(increaseOpacity);
  }
  
  // Selecionando as seções de Saída, Usuário e Destino pelo ID e aplicando efeito de fade-in
  const saidaSection = document.getElementById('saida');
  fadeIn(saidaSection); // Aplicando efeito de fade-in à seção Saída
  
  const usuarioSection = document.getElementById('usuario');
  fadeIn(usuarioSection); // Aplicando efeito de fade-in à seção Usuário
  
  const destinoSection = document.getElementById('destino');
  fadeIn(destinoSection); // Aplicando efeito de fade-in à seção Destino
  
  // Função de inicialização do mapa
function initMap() {
    // Coordenadas para o centro do mapa
    const center = { lat: -23.5505, lng: -46.6333 }; // Exemplo com São Paulo, Brasil
  
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

  // Initialize and add the map
let map;

async function initMap() {
  // The location of Uluru
  const position = { lat: -25.344, lng: 131.031 };
  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerView } = await google.maps.importLibrary("marker");

  // The map, centered at Uluru
  map = new Map(document.getElementById("map"), {
    zoom: 4,
    center: position,
    mapId: "DEMO_MAP_ID",
  });

  // The marker, positioned at Uluru
  const marker = new AdvancedMarkerView({
    map: map,
    position: position,
    title: "Uluru",
  });
}

initMap();
  

// Função de inicialização do mapa
function initMap() {
  // Coordenadas para a UFMG em Belo Horizonte
  const center = { lat: -19.8694, lng: -43.9714 };

  // Opções do mapa
  const mapOptions = {
    zoom: 15,
    center: center,
  };

  // Criando um novo mapa
  const map = new google.maps.Map(document.getElementsByClassName("map-container")[0], mapOptions);

  // Exemplo de marcador no mapa
  const marker = new google.maps.Marker({
    position: center,
    map: map,
    title: "UFMG"
  });
}