var mode = document.querySelector(".toggle");
var value = "dark";
mode.addEventListener("change", function () {
  if (value === "dark") {
    value = "light";
    document.body.classList.add("light");
    document.body.classList.remove("dark");
  } else {
    value = "dark";
    console.log(value);
    document.body.classList.add("dark");
    document.body.classList.remove("light");
  }
});

// navbar
document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".container-of-span");
  container.classList.add("show");
});

// image
document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".img1-container-animate");
  container.classList.add("show1");
});

// headiing text
document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector("#changingText");
  container.classList.add("show2");
});

// paragraph
document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector("#detail-1");
  container.classList.add("show3");
});

// social media
document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".animate-social");
  container.classList.add("show3");
});

// home page text effect
const textOptions = ["Devloper", "Designer", "Creator", "Gamer"];
let currentIndex = 0;
const changingText = document.getElementById("changingText");

function changeText() {
  changingText.textContent = "I am a " + textOptions[currentIndex];
  currentIndex = (currentIndex + 1) % textOptions.length;
}

// Call changeText every 2 seconds (2000 milliseconds)
setInterval(changeText, 2000);

// var section = document.querySelectorAll("section");
var section = document.querySelectorAll(".child-box");

window.onscroll = () => {
  section.forEach((element) => {
    var top = window.scrollY;
    var offset = element.offsetTop - 400;
    var height = element.offsetHeight;
    if (top >= offset && top < offset + height) {
      element.classList.add("show");
    } else {
      element.classList.remove("show");
    }
  });
};

// create validation on form
function validate(event) {
  var errEl = document.querySelector(".errorbox");
  if (document.myform.name.value === "") {
    errEl.innerHTML = "Please enter Name.";
    document.myform.name.focus();
    return false;
  }
  if (document.myform.email.value === "") {
    errEl.innerHTML = "Please enter your E-mail.";
    document.myform.email.focus();
    return false;
  }
  if (document.myform.areatext.value === "") {
    errEl.innerHTML = "Please gives me a clue of your contacting purpose.";
    document.myform.areatext.focus();
    return false;
  }
  event.preventDefault();
  document.querySelector(".msg-box").style.display = "block";
  document.getElementById("loadingMessage").style.display = "block";
  document.getElementById("successMessage").style.display = "none";

  // Simulate a delay of 3 seconds (3000 milliseconds)
  setTimeout(function () {
    // Hide the loading message
    document.getElementById("loadingMessage").style.display = "none";
    // Show the success message
    document.getElementById("successMessage").style.display = "block";
  }, 3000);
  document.myform.reset();
  return true;
}
function msg() {
  if (document.querySelector(".msg-box").style.display === "block") {
    document.querySelector(".msg-box").style.display = "none";
  }
}
