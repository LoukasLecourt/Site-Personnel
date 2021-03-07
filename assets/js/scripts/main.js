var navbar = document.querySelector(".navbar")
var menu = document.querySelector(".menu")
var menuLinks = document.querySelectorAll(".menuLink")

menu.addEventListener("click", toggleHamburger)

function toggleHamburger(){
    navbar.classList.toggle("showNav")
    menu.classList.toggle("showClose")
}

menuLinks.forEach( 
    function(menuLink) { 
      menuLink.addEventListener("click", toggleHamburger) 
    }
)