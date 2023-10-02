$(document).ready(function () {
    $("#menu-toggle").click(function () {
        $("#menu").toggleClass("active");
        $(".menu-toggle").toggleClass("active");
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const carousel = document.querySelector(".carousel");
    const carouselItems = document.querySelectorAll(".carousel-item");
    const numItems = 6;
    const itemsPerPage = 3; // Nombre d'éléments affichés à la fois

    let currentIndex = 0;

    function updateCarousel() {
        const itemWidth = carouselItems[0].clientWidth + 20; // Largeur de l'élément plus marge
        const offset = -currentIndex * itemWidth;
        carousel.style.transform = `translateX(${offset}px)`;
    }

    function nextSlide() {
        currentIndex = (currentIndex + itemsPerPage) % numItems;
        updateCarousel();
    }

    function prevSlide() {
        currentIndex = (currentIndex - itemsPerPage + numItems) % numItems;
        updateCarousel();
    }

    const nextButton = document.createElement("button");
    nextButton.textContent = "Suivant";
    nextButton.addEventListener("click", nextSlide);

    const prevButton = document.createElement("button");
    prevButton.textContent = "Précédent";
    prevButton.addEventListener("click", prevSlide);

    const controls = document.createElement("div");
    controls.classList.add("carousel-controls");
    controls.appendChild(prevButton);
    controls.appendChild(nextButton);

    document.querySelector(".carousel-container").appendChild(controls);
});
