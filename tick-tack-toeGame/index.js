const boxes = Array.from(document.querySelectorAll(".box"));
const resetbtn = document.querySelector(".reset");
const newbtn = document.querySelector("#new-btn");
const msgcontainer = document.querySelector(".msg-container");
const msg = document.querySelector("#msg");
const statusText = document.querySelector("#status-text");
const playerScoreEl = document.querySelector("#player-score");
const computerScoreEl = document.querySelector("#computer-score");
const drawScoreEl = document.querySelector("#draw-score");

const humanSymbol = "X";
const computerSymbol = "O";
const winpattern = [
  [0, 1, 2],
  [0, 3, 6],
  [0, 4, 8],
  [1, 4, 7],
  [2, 5, 8],
  [2, 4, 6],
  [3, 4, 5],
  [6, 7, 8],
];

let count = 0;
let gameOver = false;
let isComputerTurn = false;
let computerTimer;
const scores = {
  player: 0,
  computer: 0,
  draws: 0,
};

const updateStatus = (message) => {
  statusText.innerText = message;
};

const checkForWinner = (symbol) => {
  return winpattern.some((pattern) =>
    pattern.every((index) => boxes[index].innerText === symbol),
  );
};

const updateScoreboard = () => {
  playerScoreEl.innerText = scores.player;
  computerScoreEl.innerText = scores.computer;
  drawScoreEl.innerText = scores.draws;
};

const showwinner = (winner) => {
  gameOver = true;
  if (winner === humanSymbol) {
    scores.player += 1;
  } else {
    scores.computer += 1;
  }
  updateScoreboard();

  const message = winner === humanSymbol ? "You win!" : "Computer wins!";
  msg.innerText = message;
  msgcontainer.classList.remove("hide");
  disabledboxes();
};

const showdraw = () => {
  gameOver = true;
  scores.draws += 1;
  updateScoreboard();

  msg.innerText = "It's a draw! Try again.";
  msgcontainer.classList.remove("hide");
  disabledboxes();
};

const disabledboxes = () => {
  boxes.forEach((box) => {
    box.disabled = true;
  });
};

const checkGameState = () => {
  if (checkForWinner(humanSymbol)) {
    showwinner(humanSymbol);
    return true;
  }

  if (checkForWinner(computerSymbol)) {
    showwinner(computerSymbol);
    return true;
  }

  if (count === 9) {
    showdraw();
    return true;
  }

  return false;
};

const playComputerMove = () => {
  if (gameOver) return;

  const emptyBoxes = boxes.filter((box) => box.innerText === "");
  const availableIndexes = emptyBoxes.map((box) => boxes.indexOf(box));

  const winningMove = availableIndexes.find((index) => {
    boxes[index].innerText = computerSymbol;
    const isWinning = checkForWinner(computerSymbol);
    boxes[index].innerText = "";
    return isWinning;
  });

  if (winningMove !== undefined) {
    boxes[winningMove].innerText = computerSymbol;
    boxes[winningMove].classList.remove("color");
    boxes[winningMove].classList.add("color1");
    boxes[winningMove].disabled = true;
    count += 1;
    if (!checkGameState()) {
      isComputerTurn = false;
      updateStatus("Your turn");
    }
    return;
  }

  const blockingMove = availableIndexes.find((index) => {
    boxes[index].innerText = humanSymbol;
    const isWinning = checkForWinner(humanSymbol);
    boxes[index].innerText = "";
    return isWinning;
  });

  if (blockingMove !== undefined) {
    boxes[blockingMove].innerText = computerSymbol;
    boxes[blockingMove].classList.remove("color");
    boxes[blockingMove].classList.add("color1");
    boxes[blockingMove].disabled = true;
    count += 1;
    if (!checkGameState()) {
      isComputerTurn = false;
      updateStatus("Your turn");
    }
    return;
  }

  const centerIndex = 4;
  if (boxes[centerIndex].innerText === "") {
    boxes[centerIndex].innerText = computerSymbol;
    boxes[centerIndex].classList.remove("color");
    boxes[centerIndex].classList.add("color1");
    boxes[centerIndex].disabled = true;
    count += 1;
    if (!checkGameState()) {
      isComputerTurn = false;
      updateStatus("Your turn");
    }
    return;
  }

  const corners = [0, 2, 6, 8].filter((index) => boxes[index].innerText === "");
  if (corners.length > 0) {
    const cornerIndex = corners[Math.floor(Math.random() * corners.length)];
    boxes[cornerIndex].innerText = computerSymbol;
    boxes[cornerIndex].classList.remove("color");
    boxes[cornerIndex].classList.add("color1");
    boxes[cornerIndex].disabled = true;
    count += 1;
    if (!checkGameState()) {
      isComputerTurn = false;
      updateStatus("Your turn");
    }
    return;
  }

  const sideIndex = [1, 3, 5, 7].find((index) => boxes[index].innerText === "");
  if (sideIndex !== undefined) {
    boxes[sideIndex].innerText = computerSymbol;
    boxes[sideIndex].classList.remove("color");
    boxes[sideIndex].classList.add("color1");
    boxes[sideIndex].disabled = true;
    count += 1;
    if (!checkGameState()) {
      isComputerTurn = false;
      updateStatus("Your turn");
    }
  }
};

boxes.forEach((box) => {
  box.addEventListener("click", () => {
    if (
      box.disabled ||
      gameOver ||
      isComputerTurn ||
      msgcontainer.classList.contains("hide") === false
    )
      return;

    box.innerText = humanSymbol;
    box.classList.add("color");
    box.classList.remove("color1");
    box.disabled = true;
    count += 1;

    if (!checkGameState()) {
      isComputerTurn = true;
      updateStatus("Computer is thinking...");
      clearTimeout(computerTimer);
      computerTimer = setTimeout(playComputerMove, 500);
    }
  });
});

const enabledboxes = () => {
  boxes.forEach((box) => {
    box.disabled = false;
    box.innerText = "";
    box.classList.remove("color", "color1");
  });
};

const reset = () => {
  gameOver = false;
  isComputerTurn = false;
  count = 0;
  clearTimeout(computerTimer);
  enabledboxes();
  msgcontainer.classList.add("hide");
  updateStatus("Your turn");
};

newbtn.addEventListener("click", reset);
resetbtn.addEventListener("click", reset);
updateScoreboard();
reset();
