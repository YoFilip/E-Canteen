const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');

// Nasłuchiwanie zdarzenia kliknięcia do przycisku hamburger, aby przełączać menu mobilne
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    mobile_menu.classList.toggle('active');
});

// Nasłuchiwanie zdarzenia przewijania strony, aby zmieniać kolor tła nagłówka
document.addEventListener('scroll', () => {
    var scroll_position = window.scrollY;
    if (scroll_position > 800) {
        header.style.backgroundColor = 'black';
    } else {
        header.style.backgroundColor = 'transparent';
    }
});

// Nasłuchiwanie zdarzenia kliknięcia do elementów menu, aby ukryć menu mobilne po wybraniu opcji
menu_item.forEach((item) => {
    item.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        mobile_menu.classList.toggle('active');
    });
});
