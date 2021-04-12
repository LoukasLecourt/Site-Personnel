var navbar = document.querySelector(".navbar")
var menu = document.querySelector(".menu")
var menuLinks = document.querySelectorAll(".menuLink")
var opacity = document.querySelectorAll(".desc1")
var text = document.querySelectorAll(".desc")

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