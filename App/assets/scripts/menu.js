const menuResponsivo = document.querySelector("#menuResponsivo");
const menuIcon = document.querySelector("#menuIcon");

function dropdown() {
  menuResponsivo.classList.toggle("hidden");

  if (!menuResponsivo.classList.contains("hidden")) {
    menuIcon.setAttribute("name", "x"); 
  } else {
    menuIcon.setAttribute("name", "menu");
  }
}
