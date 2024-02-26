function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();

// untuk scroll
document.addEventListener('DOMContentLoaded', function() {
    // Menangkap semua tautan dengan class "nav-link"
    var links = document.querySelectorAll('.nav-link');

    // Menambahkan event listener untuk setiap tautan
    links.forEach(function(link, i) {
        // Mencegah class nav-link yang terakhir tidak ikut
        if (links.length == 5) {
            if (i != links.length - 1) {
                link.addEventListener('click', function(e) {
                    e.preventDefault(); // Mencegah perilaku default dari tautan
                    var targetId = this.getAttribute('href').substring(1); // Mendapatkan ID target dari atribut href
                    var targetElement = document.getElementById(targetId); // Mendapatkan elemen target
                    if (targetElement) {
                        // Menggunakan smooth scrolling untuk scroll ke elemen target
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            }
        } else {
            if (links.length == 6) {
                if (i != links.length - 1 && i != links.length - 2) {
                    link.addEventListener('click', function(e) {
                        e.preventDefault(); // Mencegah perilaku default dari tautan
                        var targetId = this.getAttribute('href').substring(1); // Mendapatkan ID target dari atribut href
                        var targetElement = document.getElementById(targetId); // Mendapatkan elemen target
                        if (targetElement) {
                            // Menggunakan smooth scrolling untuk scroll ke elemen target
                            targetElement.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    });
                }
            }
        }
    });
});

// send email
document.getElementById('btn_email').addEventListener('click', function() {
    var emailInput = document.getElementById('msg').value;

    var subject = 'SUBJEK';
    var body = encodeURIComponent(emailInput);

    var mailtoLink = 'mailto:kominfosandi@jogjakota.go.id?subject=' + subject + '&body=' + body;

    // Membuka klien email default dengan pesan yang ditentukan
    window.location.href = mailtoLink;
});
// SCROLL NAVBAR
$(window).scroll(function() {
    var links = $('#navbarSupportedContent');
    var scroll = $(window).scrollTop();
    var box = $('.client_section').height();
    var header = $('header').height();

    if (scroll >= box - header) {
        $("header").addClass("background-header");
        links.addClass("scroll_nav_link");
    } else {
        $("header").removeClass("background-header");
        links.removeClass("scroll_nav_link");

    }
});

// client section owl carousel
$(".client_owl-carousel").owlCarousel({
    loop: true,
    margin: 20,
    dots: false,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});



/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

//  untuk tulisan pemerintah jogja
const dynamicText = document.querySelector(".detail-box h3 span");
const words = ["Kota Yogyakarta"];
// Variables to track the position and deletion status of the word
let wordIndex = 0;
let charIndex = 0;
let isDeleting = false;
const typeEffect = () => {
    const currentWord = words[wordIndex];
    const currentChar = currentWord.substring(0, charIndex);
    dynamicText.textContent = currentChar;
    dynamicText.classList.add("stop-blinking");
    if (!isDeleting && charIndex < currentWord.length) {
        // If condition is true, type the next character
        charIndex++;
        setTimeout(typeEffect, 200);
    } else if (isDeleting && charIndex > 0) {
        // If condition is true, remove the previous character
        charIndex--;
        setTimeout(typeEffect, 100);
    } else {
        // If word is deleted then switch to the next word
        isDeleting = !isDeleting;
        dynamicText.classList.remove("stop-blinking");
        wordIndex = !isDeleting ? (wordIndex + 1) % words.length : wordIndex;
        setTimeout(typeEffect, 1200);
    }
}
typeEffect();

window.addEventListener('scroll', function() {
    var scrollPosition = window.scrollY;
    var targetElement = document.querySelector('#lokasi');

    // Set the scroll range for the animation to occur
    var startScroll = 50;
    var endScroll = 1700;

    if (scrollPosition > startScroll && scrollPosition < endScroll) {
        targetElement.classList.add('animate__animated', 'animate__fadeInUp');
    } else {
        targetElement.classList.remove('animate__animated', 'animate__fadeInUp');
    }
});
window.addEventListener('scroll', function() {
    var scrollPosition = window.scrollY;
    var targetElement = document.querySelector('#gedung');

    // Set the scroll range for the animation to occur
    var startScroll = 900;
    var endScroll = 2800;

    if (scrollPosition > startScroll && scrollPosition < endScroll) {
        targetElement.classList.add('animate__animated', 'animate__fadeInUp');
    } else {
        targetElement.classList.remove('animate__animated', 'animate__fadeInUp');
    }
});
window.addEventListener('scroll', function() {
    var scrollPosition = window.scrollY;
    var targetElement = document.querySelector('#penginapan');

    // Set the scroll range for the animation to occur
    var startScroll = 1550;
    var endScroll = 3500;

    if (scrollPosition > startScroll && scrollPosition < endScroll) {
        targetElement.classList.add('animate__animated', 'animate__fadeInUp');
    } else {
        targetElement.classList.remove('animate__animated', 'animate__fadeInUp');
    }
});
window.addEventListener('scroll', function() {
    var scrollPosition = window.scrollY;
    var targetElement = document.querySelector('#wisata');

    // Set the scroll range for the animation to occur
    var startScroll = 2250;
    var endScroll = 3900;

    if (scrollPosition > startScroll && scrollPosition < endScroll) {
        targetElement.classList.add('animate__animated', 'animate__fadeInUp');
    } else {
        targetElement.classList.remove('animate__animated', 'animate__fadeInUp');
    }
});
window.addEventListener('scroll', function() {
    var scrollPosition = window.scrollY;
    var targetElement = document.querySelector('#kuliner');

    // Set the scroll range for the animation to occur
    var startScroll = 2900;
    var endScroll = 4800;

    if (scrollPosition > startScroll && scrollPosition < endScroll) {
        targetElement.classList.add('animate__animated', 'animate__fadeInUp');
    } else {
        targetElement.classList.remove('animate__animated', 'animate__fadeInUp');
    }
});