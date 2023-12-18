document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(track.children);
    const nextButton = document.querySelector('.carousel-button.next');
    const prevButton = document.querySelector('.carousel-button.prev');
    let currentIndex = 0;
    const visibleSlides = 5; // Nombre de diapositives à afficher à la fois
    const slideWidth = slides[0].offsetWidth + 30; 

    // Déplacer le carrousel
    const moveToSlide = (track, currentIndex) => {
        const amountToMove = currentIndex * slideWidth;
        track.style.transform = 'translateX(-' + amountToMove + 'px)';
    };

    // Bouton suivant
    nextButton.addEventListener('click', e => {
        currentIndex = (currentIndex + visibleSlides >= slides.length) ? 0 : currentIndex + 1;
        moveToSlide(track, currentIndex);
    });

    // Bouton précédent
    prevButton.addEventListener('click', e => {
        currentIndex = (currentIndex - 1 < 0) ? slides.length - visibleSlides : currentIndex - 1;
        moveToSlide(track, currentIndex);
    });
});

