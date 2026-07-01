const canvas = document.getElementById("gameCanvas");
const ctx = canvas.getContext("2d");
const scoreEl = document.getElementById("score");
const bestScoreEl = document.getElementById("best-score");
const pauseBtn = document.getElementById("pause-btn");
const overlay = document.getElementById("overlay");
const overlayTitle = document.getElementById("overlay-title");
const overlayText = document.getElementById("overlay-text");
const startBtn = document.getElementById("start-btn");
const controlButtons = document.querySelectorAll(".control-btn");
const boardCard = document.getElementById("board-card");
const touchHint = document.querySelector(".touch-hint");

const gridSize = 24;
let tileSize = 0;
let snake = [];
let direction = { x: 1, y: 0 };
let nextDirection = { x: 1, y: 0 };
let food = { x: 8, y: 8 };
let score = 0;
let bestScore = Number(localStorage.getItem("snake-best") || 0);
let running = false;
let gameOver = false;
let lastStepTime = 0;
let stepInterval = 140;
let animationFrameId;

const updateScoreboard = () => {
  scoreEl.textContent = score;
  bestScoreEl.textContent = bestScore;
};

const hideOverlay = () => {
  overlay.classList.add("hidden");
  touchHint.classList.add("hidden");
};

const showOverlay = (title, text, buttonText) => {
  overlayTitle.textContent = title;
  overlayText.textContent = text;
  startBtn.textContent = buttonText;
  overlay.classList.remove("hidden");
  touchHint.classList.remove("hidden");
};

const setDirection = (dir) => {
  if (dir.x === -direction.x && dir.y === -direction.y) return;
  nextDirection = dir;
};

const handleSwipeDirection = (deltaX, deltaY) => {
  const threshold = 24;
  if (Math.abs(deltaX) > Math.abs(deltaY)) {
    if (deltaX > threshold) {
      setDirection({ x: 1, y: 0 });
    } else if (deltaX < -threshold) {
      setDirection({ x: -1, y: 0 });
    }
  } else if (Math.abs(deltaY) > threshold) {
    if (deltaY > threshold) {
      setDirection({ x: 0, y: 1 });
    } else if (deltaY < -threshold) {
      setDirection({ x: 0, y: -1 });
    }
  }
};

const resetBoard = () => {
  snake = [
    { x: 10, y: 10 },
    { x: 9, y: 10 },
    { x: 8, y: 10 },
  ];
  direction = { x: 1, y: 0 };
  nextDirection = { x: 1, y: 0 };
  score = 0;
  stepInterval = 140;
  gameOver = false;
  running = true;
  lastStepTime = 0;
  placeFood();
  updateScoreboard();
  pauseBtn.textContent = "Pause";
  hideOverlay();
};

const placeFood = () => {
  do {
    food = {
      x: Math.floor(Math.random() * gridSize),
      y: Math.floor(Math.random() * gridSize),
    };
  } while (
    snake.some((segment) => segment.x === food.x && segment.y === food.y)
  );
};

const resizeCanvas = () => {
  const size = Math.min(canvas.parentElement.clientWidth - 20, 420);
  const dpr = window.devicePixelRatio || 1;
  canvas.width = size * dpr;
  canvas.height = size * dpr;
  canvas.style.width = `${size}px`;
  canvas.style.height = `${size}px`;
  ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  tileSize = size / gridSize;
  render();
};

const drawBoard = () => {
  ctx.fillStyle = "#0f172a";
  ctx.fillRect(0, 0, canvas.clientWidth, canvas.clientHeight);

  ctx.strokeStyle = "rgba(255,255,255,0.06)";
  ctx.lineWidth = 1;
  for (let i = 0; i <= gridSize; i += 1) {
    const line = i * tileSize;
    ctx.beginPath();
    ctx.moveTo(0, line);
    ctx.lineTo(canvas.clientWidth, line);
    ctx.stroke();

    ctx.beginPath();
    ctx.moveTo(line, 0);
    ctx.lineTo(line, canvas.clientHeight);
    ctx.stroke();
  }
};

const render = () => {
  drawBoard();

  snake.forEach((segment, index) => {
    const x = segment.x * tileSize;
    const y = segment.y * tileSize;
    ctx.fillStyle = index === 0 ? "#22d3ee" : "#a78bfa";
    ctx.shadowBlur = 10;
    ctx.shadowColor = index === 0 ? "#22d3ee" : "#a78bfa";
    ctx.fillRect(x + 2, y + 2, tileSize - 4, tileSize - 4);
  });
  ctx.shadowBlur = 0;

  ctx.beginPath();
  ctx.arc(
    food.x * tileSize + tileSize / 2,
    food.y * tileSize + tileSize / 2,
    tileSize / 2.4,
    0,
    Math.PI * 2,
  );
  ctx.fillStyle = "#fb7185";
  ctx.shadowBlur = 14;
  ctx.shadowColor = "#fb7185";
  ctx.fill();
  ctx.shadowBlur = 0;
};

const endGame = () => {
  gameOver = true;
  running = false;
  pauseBtn.textContent = "Pause";
  showOverlay(
    "Game Over",
    "The snake hit the wall or itself. Start a new run!",
    "Restart",
  );
};

const step = () => {
  if (!running || gameOver) return;

  direction = nextDirection;
  const head = snake[0];
  const newHead = {
    x: head.x + direction.x,
    y: head.y + direction.y,
  };

  if (
    newHead.x < 0 ||
    newHead.x >= gridSize ||
    newHead.y < 0 ||
    newHead.y >= gridSize ||
    snake.some((segment) => segment.x === newHead.x && segment.y === newHead.y)
  ) {
    endGame();
    return;
  }

  snake.unshift(newHead);

  if (newHead.x === food.x && newHead.y === food.y) {
    score += 1;
    if (score > bestScore) {
      bestScore = score;
      localStorage.setItem("snake-best", bestScore);
    }
    updateScoreboard();
    placeFood();
    stepInterval = Math.max(70, 140 - score * 4);
  } else {
    snake.pop();
  }

  render();
};

const loop = (timestamp) => {
  if (running && timestamp - lastStepTime >= stepInterval) {
    lastStepTime = timestamp;
    step();
  }

  render();
  animationFrameId = window.requestAnimationFrame(loop);
};

const togglePause = () => {
  if (gameOver) return;
  running = !running;
  pauseBtn.textContent = running ? "Pause" : "Resume";
  if (running) {
    hideOverlay();
  } else {
    showOverlay(
      "Paused",
      "Take a breather and resume when you are ready.",
      "Resume",
    );
  }
};

window.addEventListener("keydown", (event) => {
  const keyMap = {
    ArrowUp: { x: 0, y: -1 },
    ArrowDown: { x: 0, y: 1 },
    ArrowLeft: { x: -1, y: 0 },
    ArrowRight: { x: 1, y: 0 },
    w: { x: 0, y: -1 },
    s: { x: 0, y: 1 },
    a: { x: -1, y: 0 },
    d: { x: 1, y: 0 },
  };

  if (keyMap[event.key]) {
    event.preventDefault();
    setDirection(keyMap[event.key]);
  }

  if (event.code === "Space") {
    event.preventDefault();
    togglePause();
  }
});

controlButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const directionMap = {
      up: { x: 0, y: -1 },
      down: { x: 0, y: 1 },
      left: { x: -1, y: 0 },
      right: { x: 1, y: 0 },
    };
    setDirection(directionMap[button.dataset.dir]);
  });
});

let swipeStartX = 0;
let swipeStartY = 0;

const startSwipe = (clientX, clientY) => {
  swipeStartX = clientX;
  swipeStartY = clientY;
  boardCard.classList.add("active");
};

const endSwipe = (clientX, clientY) => {
  const deltaX = clientX - swipeStartX;
  const deltaY = clientY - swipeStartY;
  handleSwipeDirection(deltaX, deltaY);
  boardCard.classList.remove("active");
};

canvas.addEventListener("pointerdown", (event) => {
  startSwipe(event.clientX, event.clientY);
});

canvas.addEventListener("pointerup", (event) => {
  endSwipe(event.clientX, event.clientY);
});

canvas.addEventListener("pointerleave", () => {
  boardCard.classList.remove("active");
});

pauseBtn.addEventListener("click", togglePause);
startBtn.addEventListener("click", () => {
  resetBoard();
  if (animationFrameId) {
    window.cancelAnimationFrame(animationFrameId);
  }
  animationFrameId = window.requestAnimationFrame(loop);
});

window.addEventListener("resize", resizeCanvas);

updateScoreboard();
resetBoard();
resizeCanvas();
window.requestAnimationFrame(loop);
