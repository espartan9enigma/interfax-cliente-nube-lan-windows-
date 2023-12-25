const menu = document.querySelector('.nav__menu');
const menuList = document.querySelector('.nav__list');
const links = document.querySelectorAll('.nav__link');

menu.addEventListener('click', function(){

    menuList.classList.toggle('nav__list--show');

});

links.forEach(function(link){

    link.addEventListener('click', function(){

        menuList.classList.remove('nav__list--show');

    })

});
var prevScrollPos = window.pageYOffset;

window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollPos > currentScrollPos) {
        document.querySelector("nav").style.top = "0";
    } else {
        document.querySelector("nav").style.top = "-100px"; // Puedes ajustar este valor según la altura de tu encabezado
    }
    prevScrollPos = currentScrollPos;
}
