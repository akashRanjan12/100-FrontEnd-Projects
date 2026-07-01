<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S☆undHaven/Sigin</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="pages.css">
      <style>
        .logout-message {
  text-align: center;
  padding: 50px;
  font-family: 'Arial', sans-serif;
}

.logout-message h2 {
  font-size: 28px;
  color: #333;
}

.logout-message p {
  font-size: 18px;
  color: #666;
  margin: 20px 0;
}

.logout-message .btn {
  display: inline-block;
 
}
/* 
.logout-message .btn:hover {
  background-color: #1c6fd3;
} */

      </style>
</head>
<body>
        <!-- preloader------------------ -->
        <div id="preloader">
      <p style="font-size: 7rem">𝄞</p>
      <p>S☆und Haven</p>
      <div class="loading">
        <svg width="64px" height="48px">
          <polyline
            points="0.157 23.954, 14 23.954, 21.843 48, 43 0, 50 24, 64 24"
            id="back"></polyline>
          <polyline
            points="0.157 23.954, 14 23.954, 21.843 48, 43 0, 50 24, 64 24"
            id="front"></polyline>
        </svg>
      </div>
      <h1>welcome to the S☆und Haven.</h1>
      <h3>Website is loading please wait...</h3>
    </div>
    <!-- end preloader-------------- -->
     <!-- navbar -->
      <?php
        require "../includes/navbar.html";
      ?>
     <!-- main part--------------------- -->
     <div class="logout-message">
  <h2>🎵 You’ve been logged out</h2>
  <p>Thank you for visiting S☆und Haven!<br>We hope you enjoyed the music. See you again soon!</p>
  <a href="../pages/login.php" class="white-btn btn">Login Again</a>
  <a href="../index.php" class="transparent-btn btn">Return to Home</a>
</div>
    <footer style="padding-top: 60px">
        <?php
          require "../includes/footer.php";
        ?>
    </footer>
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
      // prohibited to copy text
      document.addEventListener("copy", function (event) {
        event.clipboardData.setData(
          "text/plain",
          "⚠️ sorry content is not being copied."
        );
        event.preventDefault();
      });
    </script>
</body>
</html>