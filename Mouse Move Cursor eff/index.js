const bodyEl = document.querySelector("body");
bodyEl.addEventListener("mousemove", (event) => {
  const xpos = event.offsetX;
  const ypos = event.offsetY;
  const creaEl = document.createElement("span");
  bodyEl.appendChild(creaEl);
  creaEl.style.left = xpos + "px";
  creaEl.style.top = ypos + "px";
  const size = Math.random() * 40;
  creaEl.style.width = size + "px";
  creaEl.style.height = size + "px";
  setTimeout(() => {
    creaEl.remove();
  }, 1000);
});
