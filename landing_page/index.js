const toggleBtn = document.querySelector('.toggler-btn');
const toggleBtnIcon = document.querySelector('.toggler-btn i');
const dropDownMenu = document.querySelector('.dropdown-nav');
const closeBtn = document.querySelector('.close-btn');
const navLinks = document.querySelectorAll('.dropdown-nav li a');

toggleBtn.onclick = function () {
    dropDownMenu.classList.toggle('open');
    if (dropDownMenu.classList.contains('open')) {
        toggleBtnIcon.classList = 'fa-solid fa-xmark';
    } else {
        toggleBtnIcon.classList = 'fa-solid fa-bars';
    }
};

closeBtn.onclick = function () {
    dropDownMenu.classList.remove('open');
    toggleBtnIcon.classList = 'fa-solid fa-bars';
};

navLinks.forEach(link => {
    link.onclick = function () {
        dropDownMenu.classList.remove('open');
        toggleBtnIcon.classList = 'fa-solid fa-bars';
    };
});

window.addEventListener('resize', function () {
    if (window.innerWidth > 992) {
        dropDownMenu.classList.remove('open');
        toggleBtnIcon.classList = 'fa-solid fa-bars';
    }
});

// random card (Landing Page)
document.addEventListener("DOMContentLoaded", function () {
    let cardsData = [
        { image: "../assets/card1.png", category: "Computer Science", title: "Learning Python" },
        { image: "../assets/card2.png", category: "Web Programming", title: "Learn JS" },
        { image: "../assets/card3.png", category: "Web Programming", title: "Learn ReactJS" },
        { image: "../assets/card4.png", category: "Machine Learning", title: "Artificial Intelligence" },
        { image: "../assets/card5.png", category: "Web Programming", title: "Boostrap Basic" },
        { image: "../assets/card6.png", category: "Web Programming", title: "Basic Portfolio" },
        { image: "../assets/card7.png", category: "Web Programming", title: "Front-End Dev" },
        { image: "../assets/courses7.png", category: "Machine Learning", title: "Machine Learning" },
        { image: "../assets/courses12.png", category: "Game Developer", title: "Game Dev" },
        { image: "../assets/courses11.png", category: "Web Programming", title: "BackEnd Dev" },
        { image: "../assets/courses10.png", category: "Computer Science", title: "Cybersecurity" },
        { image: "../assets/courses8.png", category: "Computer Science", title: "Algorithms" },
        { image: "../assets/courses3.png", category: "Software Programming", title: "Mobile App Dev" },
        // Tambahkan lebih banyak gambar dan judul di sini
    ];

    // Fungsi untuk memilih elemen acak dari array
    function getRandomItem(array) {
        const index = Math.floor(Math.random() * array.length);
        const item = array[index];
        array.splice(index, 1);
        return item;
    }

    // Ambil elemen features-cards
    const featuresCards = document.querySelectorAll(".features-cards .card");

    // Atur konten untuk setiap kartu
    featuresCards.forEach(function (card) {
        const randomCardData = getRandomItem(cardsData);
        const cardImage = card.querySelector("img");
        const cardCategory = card.querySelector(".category p");
        const cardTitle = card.querySelector("h3");

        cardImage.src = randomCardData.image;
        cardCategory.textContent = randomCardData.category;
        cardTitle.textContent = randomCardData.title;
    });
});

// carousel
$(document).ready(function(){
    $(".testimonials-card").owlCarousel({
        autoplay: true,
        slideSpeed: 150000,
        items: 3,
        margin: 25,
        nav: false,
        dots: false,
        loop : true,
        mouseDrag: false, 
        touchDrag: false, 
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 2
            },
            1024: {
                items: 3
            }
        }
    });

    $(".carousel-navigation .prev-btn").click(function(){
        $(".testimonials-card").trigger("prev.owl.carousel");
    });

    $(".carousel-navigation .next-btn").click(function(){
        $(".testimonials-card").trigger("next.owl.carousel");
    });
});