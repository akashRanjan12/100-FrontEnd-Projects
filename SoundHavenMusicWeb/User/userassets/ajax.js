$(document).ready(function () {
  const globalAudioElem = $("#global-audio"); // Audio element
  const globalAudio = globalAudioElem[0]; // DOM audio object
  const userKey = "<?php echo $_SESSION['username']; ?>"; // Unique user identifier for localStorage

  let trackQueue = []; // Array of track metadata
  let currentIndex = -1; // Index of currently playing track

  // Bind track click events and refresh track queue
  function bindTrackPlayEvents() {
    const trackElements = $(".play-track");

    trackQueue = trackElements
      .map(function () {
        return {
          src: $(this).data("src"),
          element: this,
        };
      })
      .get();

    trackElements.off("click").on("click", function () {
      const clickedIndex = trackElements.index(this);
      playTrackAtIndex(clickedIndex);
    });
  }

  // Play a track by index
  function playTrackAtIndex(index) {
    if (index < 0 || index >= trackQueue.length) return;
    const { src } = trackQueue[index];
    currentIndex = index;

    globalAudioElem.find("source").attr("src", src);
    globalAudio.load();

    globalAudio.addEventListener("loadedmetadata", function handleLoaded() {
      globalAudio.removeEventListener("loadedmetadata", handleLoaded);
      globalAudio.currentTime = 0;
      globalAudio.play();
    });

    globalAudioElem.slideDown(300);

    localStorage.setItem(userKey + "_audioSrc", src);
    localStorage.setItem(userKey + "_showPlayer", "true");
    localStorage.removeItem(userKey + "_audioTime");
  }

  // Restore audio state from localStorage
  function restoreAudioState() {
    const savedSrc = localStorage.getItem(userKey + "_audioSrc");
    const showPlayer = localStorage.getItem(userKey + "_showPlayer");
    const savedTime =
      parseFloat(localStorage.getItem(userKey + "_audioTime")) || 0;

    if (savedSrc && showPlayer === "true") {
      globalAudioElem.find("source").attr("src", savedSrc);
      globalAudio.load();

      globalAudio.addEventListener("loadedmetadata", function handleMetadata() {
        globalAudio.removeEventListener("loadedmetadata", handleMetadata);
        if (!isNaN(savedTime)) {
          globalAudio.currentTime = savedTime;
        }
      });

      globalAudioElem.show();

      trackQueue.forEach((track, idx) => {
        if (track.src === savedSrc) {
          currentIndex = idx;
        }
      });
    }
  }

  // Save current playback time every second
  setInterval(() => {
    if (!globalAudio.paused && globalAudio.currentTime > 0) {
      localStorage.setItem(userKey + "_audioTime", globalAudio.currentTime);
    }
  }, 1000);

  // Auto play next track when current ends------------------------------------------------------------
  globalAudio.addEventListener("ended", function () {
    playTrackAtIndex(currentIndex + 1);
  });

  // Load view based on the current hash-------------------------
  function loadViewFromHash() {
    const page = window.location.hash.substring(1) || "home";
    $(".content").load("views/" + page + ".php", function () {
      bindTrackPlayEvents();
    });
  }

  // SPA navigation with hash---------------------------------------
  $(
    ".usernavbar a, .user-menu .options a, .burger-menu a, .user-resp-navbar-bottom a"
  ).click(function (e) {
    e.preventDefault();
    const page = $(this).attr("href").replace("#", "");
    window.location.hash = page;
  });

  $(window).on("hashchange", loadViewFromHash);

  // Initial setup--------------------------------------------
  globalAudioElem.hide();
  loadViewFromHash();
  restoreAudioState();
});
