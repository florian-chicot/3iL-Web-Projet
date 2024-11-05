let currentIndex = 0;
const carouselTrack = document.getElementById('carousel-track');

function loadCarouselImages() {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', 'lib/IMGViewer.xml', true);
  xhr.onload = function() {
    if (this.status === 200) {
      const xml = this.responseXML;
      const images = xml.getElementsByTagName('image');
      Array.from(images).forEach(image => {
        let src;
        const alt = image.getElementsByTagName('alt')[0].textContent;

        // Vérifier la taille de l'écran pour charger l'image appropriée
        if (window.matchMedia("(max-width: 600px)").matches) { // Si l'écran est <= à 600px, charger l'image portrait (450x450)
          src = image.querySelector('size[size="450x450"] src').textContent;
        } else { // Sinon, charger l'image paysage (1200x900)
          src = image.querySelector('size[size="600x450"] src').textContent;
        }
        
        const slide = document.createElement('div');
        slide.classList.add('carousel-slide');
        
        const img = document.createElement('img');
        img.src = src;
        img.alt = alt;

        slide.appendChild(img);
        carouselTrack.appendChild(slide);
      });
      if (currentScreenWidth > 600) {        
        updateCarousel(mediaQuerryChangeWidth)
      } else {
        updateCarousel(currentScreenWidth)
      }
    }
  };
  xhr.send();
}

// Fonction pour mettre à jour la position du carousel
function updateCarousel(largeurEcran) {
  const slides = document.querySelectorAll('.carousel-slide');

  document.getElementById('prevBtn').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    const amountToMove = -currentIndex * largeurEcran;
    carouselTrack.style.transform = `translateX(${amountToMove}px)`;
  });

  document.getElementById('nextBtn').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % slides.length;
    const amountToMove = -currentIndex * largeurEcran;
    carouselTrack.style.transform = `translateX(${amountToMove}px)`;
  });
}

// Récupère largeur d'écran au démarrage et charge les images au démarrage
let currentScreenWidth = window.innerWidth;
loadCarouselImages();

const mediaQuerryChangeWidth = 600;

window.addEventListener('resize', function() {
  const newScreenWidth = window.innerWidth; // Nouvelle largeur
  currentScreenWidth = newScreenWidth;
  
  if (currentScreenWidth > mediaQuerryChangeWidth) {
    updateCarousel(mediaQuerryChangeWidth)
  } else {
    updateCarousel(currentScreenWidth);
  }
});