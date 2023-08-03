const imagenes = document.querySelectorAll('.img-galeria');
const imagenLight = document.querySelector('.imagen-light img');
const contenedorLight = document.querySelector('.imagen-light');
const closeLight = document.querySelector('.imagen-light .close');

imagenes.forEach((imagen) => {
  imagen.addEventListener('click', () => {
    aparecerImagen(imagen.getAttribute('src'));
  });
});

contenedorLight.addEventListener('click', (e) => {
  if (e.target !== imagenLight && e.target !== closeLight) {
    contenedorLight.classList.toggle('show');
  }
});

function aparecerImagen(imagen) {
  imagenLight.src = imagen;
  contenedorLight.classList.toggle('show');
}

