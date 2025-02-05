var quesEl = document.querySelectorAll(".question");

quesEl.forEach((show0) => {
  var dis = false;
  var asnEl = show0.querySelector(".answer");
  show0.addEventListener("click", () => {
    if (dis === false) {
      asnEl.style.display = "block";

      dis = true;
    } else {
      asnEl.style.display = "none";
      dis = false;
    }
  });
});
