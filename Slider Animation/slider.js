// slider of heading

let slideIndex = 1;
showSlide(slideIndex);
let slideInterval = setInterval(() => changeSlide(1), 3000); // Auto slide every 3 seconds

function changeSlide(n) {
  clearInterval(slideInterval); // Clear previous interval
  showSlide((slideIndex += n));
  slideInterval = setInterval(() => changeSlide(1), 4000); // Reset interval
}

function showSlide(n) {
  let slides = document.getElementsByClassName("slider-image");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.transform = "translateX(" + -(slideIndex - 1) * 100 + "%)"; // Use transform for sliding effect
  }
}
