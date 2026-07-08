document.addEventListener('DOMContentLoaded', () => {

    const acordeones = document.querySelectorAll('.acordeon-btn');
    if(acordeones.length > 0) {
        acordeones.forEach(btn => {
            btn.addEventListener('click', function() {
                this.classList.toggle('activo');
                let panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        });
    }

    if(document.querySelector('.slideshow-container')) {
        mostrarSlides(indiceSlide);
    }

    const formulario = document.getElementById('formulario-contacto');
    if(formulario) {
        formulario.addEventListener('submit', function(e) {
            e.preventDefault(); 

            const nombre = document.getElementById('nombre').value.trim();
            const email = document.getElementById('email').value.trim();
            const mensaje = document.getElementById('mensaje').value.trim();
            const msjError = document.getElementById('mensaje-error');
            const msjExito = document.getElementById('mensaje-exito');

            msjError.classList.add('oculto');
            msjExito.classList.add('oculto');

            if(nombre === '' || email === '' || mensaje === '') {
                msjError.textContent = 'Todos los campos son obligatorios.';
                msjError.classList.remove('oculto');
                return;
            }

            const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(!regexEmail.test(email)) {
                msjError.textContent = 'Por favor, ingresa un correo válido.';
                msjError.classList.remove('oculto');
                return;
            }

            msjExito.classList.remove('oculto');
            formulario.reset(); 

            setTimeout(() => {
                msjExito.classList.add('oculto');
            }, 3000);
        });
    }
});

let indiceSlide = 1;

function moverSlides(n) {
    mostrarSlides(indiceSlide += n);
}

function mostrarSlides(n) {
    let i;
    let slides = document.getElementsByClassName("misSlides");
    
    if(!slides.length) return; 

    if (n > slides.length) { indiceSlide = 1 }
    if (n < 1) { indiceSlide = slides.length }
    
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    
    slides[indiceSlide-1].style.display = "block";
}
document.addEventListener('DOMContentLoaded', () => {
    const formPelicula = document.getElementById('formulario-pelicula');
    if (formPelicula) {
        formPelicula.addEventListener('submit', function (e) {
            const titulo = document.getElementById('titulo').value.trim();
            const genero = document.getElementById('genero').value.trim();
            const anio = document.getElementById('anio').value.trim();
            const director = document.getElementById('director_id').value;
            const msjError = document.getElementById('error-crud');

            if (titulo === '' || genero === '' || anio === '' || director === '') {
                e.preventDefault(); 
                msjError.classList.remove('oculto');
                setTimeout(() => {
                    msjError.classList.add('oculto');
                }, 3000);
            }
        });

    const formDirector = document.getElementById('formulario-director');
    if (formDirector) {
        formDirector.addEventListener('submit', function (e) {
            const nombre = document.getElementById('nombre').value.trim();
            const nacionalidad = document.getElementById('nacionalidad').value.trim();
            const msjError = document.getElementById('error-director');
            
    const regexLetras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;

    if (nombre === '' || nacionalidad === '') {
                e.preventDefault(); 
                msjError.textContent = 'Todos los campos son obligatorios.';
                msjError.classList.remove('oculto');
                setTimeout(() => { msjError.classList.add('oculto'); }, 3000);
            } else if (!regexLetras.test(nombre) || !regexLetras.test(nacionalidad)) {
                e.preventDefault(); 
                msjError.textContent = 'Solo se permiten letras y espacios, sin símbolos ni números.';
                msjError.classList.remove('oculto');
                setTimeout(() => { msjError.classList.add('oculto'); }, 3000);
            }
        });
    }
    }
});