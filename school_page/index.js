var isElementVisible = false;
let btn = document.querySelector(".button00");
btn.onclick = () => {
  var icon = document.querySelector(".nav");
  isElementVisible = !isElementVisible;
  if (isElementVisible) {
    icon.style.display = "block";
  } else {
    icon.style.display = "none";
  }
};
