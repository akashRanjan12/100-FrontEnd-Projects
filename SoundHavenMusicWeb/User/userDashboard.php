<?php
session_start();

if (!isset($_SESSION["useremail"], $_SESSION["username"])) {
  header("Location: ../index.php");
  exit();
}

if (isset($_POST["logout"])) {
  echo "<scrip>localStorage.clear();</script>";
  session_destroy();
  header("Location: ../pages/logout.php");
  exit();
}
require '../config/configuration.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>S☆undHaven</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="userassets/userstyle.css" />
  </head>
  <body>
    <!-- preloader -->
  <div id="preloader">
  <p style="font-size: 7rem">𝄞</p>
  <p>S☆und Haven</p>
  <div class="loading">
    <svg width="64px" height="48px">
      <polyline points="0.157 23.954, 14 23.954, 21.843 48, 43 0, 50 24, 64 24" id="back"></polyline>
      <polyline points="0.157 23.954, 14 23.954, 21.843 48, 43 0, 50 24, 64 24" id="front"></polyline>
    </svg>
  </div>
  <h1>Welcome to the S☆und Haven.</h1>
  <h3>Website is loading, please wait...</h3>
</div>
<!-- end preloader -->

    <header>
      <div class="usernavbar">
        <div class="logo">𝄞</div>
        <div class="search-container">
          <form action="search.php" method="POST">
            <input type="search" placeholder="Search for artists, tracks, bands" />
          </form>
        </div>
        <a href="upload">Uploads</a>
        <div class="user">
          <span class="image">user</span>
          <span class="icon"><i class="fa-solid fa-angle-down"></i></span>
        </div>
        <div class="burger"><i class="fa-solid fa-bars"></i></div>
      </div>

      <div class="special_menu">
        <span class="about"><a href="../pages/aboutpage.php" class="external-link">About S☆undHaven</a></span>
        <span class="blog"><a href="../pages/Blogpage.php" class="external-link">S☆undHaven Blog</a></span>
      </div>

      <div class="burger-menu">
        <span><a href="premium">Try artist pro</a></span>
        <span><a href="notification">Notification</a></span>
        <span><a href="message">Message</a></span>
        <span><a href="playlist">My Playlist</a></span>
        <span><a href="support_help_page">Support</a></span>
      </div>
<!-- user menu data along with the user profile and all kina details -->
      <div class="user-menu">
        <div class="options">
          <p style="border-bottom: 1px solid black">
            image <?php echo ucfirst($_SESSION['username']); ?>
          </p>
          <span><a href="profile">Profile</a></span>
          <span><a href="likes">Likes</a></span>
          <span><a href="upload">Uploads</a></span>
          <form style="display: inline-block;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <input type="submit" name="logout" value="Logout Account" onclick="localStorage.clear();">
          </form>
        </div>
      </div>
<!--  bottom navbar -->
      <div class="user-resp-navbar-bottom">
        <div class="options">
          <a href="home"><i class="fa-solid fa-house-crack"></i><span>Home</span></a>
          <a href="feed"><i class="fa-solid fa-cloud"></i><span>Feed</span></a>
          <a href="search"><i class="fa-solid fa-magnifying-glass"></i><span>Search</span></a>
          <a href="library"><i class="fa-solid fa-swatchbook"></i><span>Library</span></a>
          <a href="downloadpage"><i class="fa-solid fa-cloud-arrow-down"></i><span>Download</span></a>
        </div>
      </div>
    </header>
<!-- ajax contetn section reloaded all the views section -->
    <main>
      <div class="content" style="height: auto;">Loading content...</div>
    </main>
<!-- audio player -->
    <div class="global-audio-container">
      <audio id="global-audio" controls style="width: 100%">
        <source src="" type="audio/mpeg" />
        Your browser does not support the audio element.
      </audio>
    </div>
<!-- footer -->
    <footer style="padding-top: 60px">
      <?php require "../includes/userfooter.php"; ?>
    </footer>


<script src="userassets/userburgerlogic.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="userassets/ajax.js"></script>
<script>
  window.addEventListener("load", function () {
  const preloader = document.getElementById("preloader");
  const contentDiv = document.querySelector(".content");

  if (!localStorage.getItem("visited")) {
    localStorage.setItem("visited", "true");
    if (preloader) preloader.style.display = "block";

    setTimeout(function () {
      if (preloader) preloader.style.display = "none";
      if (contentDiv) contentDiv.style.display = "block";
    }, 2000);
  } else {
    if (preloader) preloader.style.display = "none";
    if (contentDiv) contentDiv.style.display = "block";
  }
});
</script>
<script>
  document.querySelectorAll(".blog, .about").forEach(item => {
    item.addEventListener("click", () => {
      alert("You are leaving the Home Page!");
    });
  });
</script>
  </body>
</html>