let btn = document.querySelector("#btn");
let crrmode = "block";
btn.addEventListener("click", () => {
  let box = document.querySelector(".box1-10th");
  if (crrmode === "block") {
    crrmode = "none";
    box.classList.add("hide");
    box.classList.remove("show");
  } else {
    crrmode = "block";
    box.classList.add("show");
    box.classList.remove("hide");
  }
});
// part of list
// board
let liboard = document.querySelector(".liboard");
let curmode = "none";
liboard.addEventListener("click", () => {
  let inbox = document.querySelector("#inliboard");

  if (curmode === "none") {
    curmode = "block";
    inbox.style.display = "block";
  } else {
    curmode = "none";
    inbox.style.display = "none";
  }
});
// syllabus
let liboard2 = document.querySelector(".libox");
let curmode2 = "none";
liboard2.addEventListener("click", () => {
  let inbox2 = document.querySelector("#inlibox");

  if (curmode2 === "none") {
    curmode2 = "block";
    inbox2.style.display = "block";
  } else {
    curmode2 = "none";
    inbox2.style.display = "none";
  }
});
// sub1
let liboard3 = document.querySelector("#sub1");
let curmode3 = "none";
liboard3.addEventListener("click", () => {
  let inbox3 = document.querySelector("#insub1");

  if (curmode3 === "none") {
    curmode3 = "block";
    inbox3.style.display = "block";
  } else {
    curmode3 = "none";
    inbox3.style.display = "none";
  }
});
// sub2
let liboard4 = document.querySelector("#sub2");
let curmode4 = "none";
liboard4.addEventListener("click", () => {
  let inbox4 = document.querySelector("#insub2");

  if (curmode4 === "none") {
    curmode4 = "block";
    inbox4.style.display = "block";
  } else {
    curmode4 = "none";
    inbox4.style.display = "none";
  }
});
// sub3
let liboard5 = document.querySelector("#sub3");
let curmode5 = "none";
liboard5.addEventListener("click", () => {
  let inbox5 = document.querySelector("#insub3");

  if (curmode5 === "none") {
    curmode5 = "block";
    inbox5.style.display = "block";
  } else {
    curmode5 = "none";
    inbox5.style.display = "none";
  }
});
// sub4
let liboard6 = document.querySelector("#sub4");
let curmode6 = "none";
liboard6.addEventListener("click", () => {
  let inbox6 = document.querySelector("#insub4");

  if (curmode6 === "none") {
    curmode6 = "block";
    inbox6.style.display = "block";
  } else {
    curmode6 = "none";
    inbox6.style.display = "none";
  }
});
// sub5
let liboard7 = document.querySelector("#sub5");
let curmode7 = "none";
liboard7.addEventListener("click", () => {
  let inbox7 = document.querySelector("#insub5");

  if (curmode7 === "none") {
    curmode7 = "block";
    inbox7.style.display = "block";
  } else {
    curmode7 = "none";
    inbox7.style.display = "none";
  }
});
// sub6
let liboard8 = document.querySelector("#sub6");
let curmode8 = "none";
liboard8.addEventListener("click", () => {
  let inbox8 = document.querySelector("#insub6");

  if (curmode8 === "none") {
    curmode8 = "block";
    inbox8.style.display = "block";
  } else {
    curmode8 = "none";
    inbox8.style.display = "none";
  }
});
