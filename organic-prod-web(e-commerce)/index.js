var listBarEl = document.querySelector(".list-menu-bar");
function showMenuBar() {
  listBarEl.style.visibility = "visible";
  listBarEl.classList.add("slideIn");
  listBarEl.classList.remove("slideOut");
}
function hiddenMenuBar() {
  listBarEl.style.visibility = "hidden";
  listBarEl.classList.remove("slideIn");
  listBarEl.classList.add("slideOut");
}

// date
var date = new Date();
document.querySelector("#date").innerHTML = date.getFullYear();
