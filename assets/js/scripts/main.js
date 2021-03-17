var navbar = document.querySelector(".navbar")
var menu = document.querySelector(".menu")
var menuLinks = document.querySelectorAll(".menuLink")
var desc = document.querySelectorAll(".desc")

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

menu.addEventListener("click", changeOpacity)

function changeOpacity(){
    menu.classList.change("showDesc")
    menu.classList.change("showClose")
}
desc.forEach(
  function(desc) {
    desc.addEventListener("click", changeOpacity)
  }
)