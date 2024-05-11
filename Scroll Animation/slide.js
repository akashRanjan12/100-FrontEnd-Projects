// var section = document.querySelectorAll("section");
var section = document.querySelectorAll("section");

window.onscroll = () => {
  section.forEach((element) => {
    var top = window.scrollY;
    var offset = element.offsetTop - 340;
    var height = element.offsetHeight;
    if (top >= offset && top < offset + height) {
      element.classList.add("show");
    } else {
      element.classList.remove("show");
    }
  });
};

document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".sec-1");
  container.classList.add("show");
});
// Remove the event listener to prevent further animations
document.removeEventListener("DOMContentLoaded", arguments.collee);
