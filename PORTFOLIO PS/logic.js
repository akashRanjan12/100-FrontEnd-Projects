const container = document.getElementById("card-container");
const cards = Array.from(container.children);
const scrollLeftButton = document.getElementById("scroll-left");
const scrollRightButton = document.getElementById("scroll-right");

// Clone cards for seamless infinite scrolling
const totalCards = cards.length;
cards.forEach((card) => {
  const clone = card.cloneNode(true);
  container.appendChild(clone);
});

// Helper variables
const cardWidth = 400 + 20; // Card width + gap
const totalWidth = cardWidth * totalCards;

// Scroll position adjustment
function adjustScroll() {
  if (container.scrollLeft >= totalWidth) {
    container.scrollLeft = 0;
  } else if (container.scrollLeft <= 0) {
    container.scrollLeft = totalWidth;
  }
}

// Auto-scroll logic
function autoScroll() {
  container.scrollLeft += 1;
  adjustScroll();
  requestAnimationFrame(autoScroll);
}

// Manual scrolling
scrollLeftButton.addEventListener("click", () => {
  container.scrollLeft -= cardWidth;
  adjustScroll();
});

scrollRightButton.addEventListener("click", () => {
  container.scrollLeft += cardWidth;
  adjustScroll();
});

// Start auto-scrolling
autoScroll();

const containerNew = document.getElementById("card-container-new");
const cardsNew = Array.from(containerNew.children);
const scrollLeftButtonNew = document.getElementById("scroll-left-new");
const scrollRightButtonNew = document.getElementById("scroll-right-new");

// Clone cards for seamless infinite scrolling
const totalCardsNew = cardsNew.length;
cardsNew.forEach((card) => {
  const clone = card.cloneNode(true);
  containerNew.appendChild(clone);
});

// Helper variables
const cardWidthNew = 400 + 20; // Card width + gap
const totalWidthNew = cardWidthNew * totalCardsNew;

// Scroll position adjustment
function adjustScrollNew() {
  if (containerNew.scrollLeft >= totalWidthNew) {
    containerNew.scrollLeft = 0;
  } else if (containerNew.scrollLeft <= 0) {
    containerNew.scrollLeft = totalWidthNew;
  }
}

// Auto-scroll logic
function autoScrollNew() {
  containerNew.scrollLeft += 1;
  adjustScrollNew();
  requestAnimationFrame(autoScrollNew);
}

// Manual scrolling
scrollLeftButtonNew.addEventListener("click", () => {
  containerNew.scrollLeft -= cardWidthNew;
  adjustScrollNew();
});

scrollRightButtonNew.addEventListener("click", () => {
  containerNew.scrollLeft += cardWidthNew;
  adjustScrollNew();
});

// Start auto-scrolling
autoScrollNew();

// burger
function showBox() {
  document.getElementById("box").style.display = "block";
}

// Function to hide the box
function hideBox() {
  document.getElementById("box").style.display = "none";
}

// date
var date = new Date();
document.querySelector("#date").innerHTML = date.getFullYear();

// phone current time and date
// date
document.querySelector(
  ".date"
).innerHTML = `${date.getDate()} / ${date.toLocaleString("default", {
  month: "long",
})}
  / ${date.getFullYear()}
`;
// time

document.querySelector(
  ".time"
).innerHTML = `${date.getHours()}:${date.getMinutes()}`;
