function getmove() {
  const moves = ["rock", "paper", "scissor"];
  const index = Math.floor(Math.random() * moves.length);
  return moves[index];
}

const winEl = document.querySelector("#win-score");
const loseEl = document.querySelector("#losses-score");
const tieEl = document.querySelector("#ties-score");
const storeRes = document.querySelector("#store-res");
const resultBubble = document.querySelector("#result-bubble");
const choiceButtons = document.querySelectorAll(".choice-card");

const score = {
  wins: 0,
  losses: 0,
  ties: 0,
};

function formatMove(move) {
  if (move === "rock") return "Rock";
  if (move === "paper") return "Paper";
  return "Scissors";
}

function highlightChoice(selectedMove) {
  choiceButtons.forEach((button) => {
    button.classList.remove("active");
    if (button.classList.contains(selectedMove)) {
      button.classList.add("active");
    }
  });
}

function checkmove(move) {
  const getcompmove = getmove();
  let result = "";

  if (move === "rock") {
    if (getcompmove === "scissor") {
      result = "You Win!";
    } else if (getcompmove === "paper") {
      result = "You Lose!";
    } else {
      result = "Tie!";
    }
  } else if (move === "paper") {
    if (getcompmove === "rock") {
      result = "You Win!";
    } else if (getcompmove === "scissor") {
      result = "You Lose!";
    } else {
      result = "Tie!";
    }
  } else if (move === "scissor") {
    if (getcompmove === "rock") {
      result = "You Lose!";
    } else if (getcompmove === "paper") {
      result = "You Win!";
    } else {
      result = "Tie!";
    }
  }

  if (result === "You Win!") {
    score.wins += 1;
  } else if (result === "You Lose!") {
    score.losses += 1;
  } else {
    score.ties += 1;
  }

  highlightChoice(move);
  resultBubble.className = "result-bubble";
  if (result === "You Win!") {
    resultBubble.classList.add("win");
  } else if (result === "You Lose!") {
    resultBubble.classList.add("lose");
  } else {
    resultBubble.classList.add("tie");
  }

  storeRes.innerHTML = `You picked <strong>${formatMove(move)}</strong> • Computer picked <strong>${formatMove(getcompmove)}</strong><br>${result}`;
  winEl.innerHTML = score.wins;
  loseEl.innerHTML = score.losses;
  tieEl.innerHTML = score.ties;
}

function resetscore() {
  score.wins = 0;
  score.losses = 0;
  score.ties = 0;

  winEl.innerHTML = score.wins;
  loseEl.innerHTML = score.losses;
  tieEl.innerHTML = score.ties;
  resultBubble.className = "result-bubble";
  storeRes.innerHTML = "Pick your move to start the battle.";
  choiceButtons.forEach((button) => button.classList.remove("active"));
}
