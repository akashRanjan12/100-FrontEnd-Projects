
<?php
require "../config/configuration.php";
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S☆undHaven/Blog</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="pages.css">
      <link rel="stylesheet" href="../assets/css/blogstyle.css">
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
     <div class="navbar">
          <div class="logo">𝄞 S☆und Haven</div>
          <a href="../index.php" class="home"><i class="fa-solid fa-arrow-left-long"></i> Go Home</a>
     </div>
     <header>
      <div class="landing-page">
     <?php
        // Retrieve content data from the database
        $res = $connection->query("SELECT * FROM blogcontent WHERE post_id = 12");
    if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $image = "<img src='" . htmlspecialchars($row['image']) . "' width='350px'>";
        $title = htmlspecialchars($row["title"]);
        $content = htmlspecialchars($row["content"]);
        $id = htmlspecialchars($row["post_id"]);

        echo "<div class='box'>";
        echo "<div class='image-sec reveal'>";
        echo $image;
        echo "</div>";
        echo "<div class='data-sec reveal'>";
        echo "<p class='title'>" . $title . "</p><br>";
        echo "<p class='content'>" . $content . "</p>";  
        // echo "<p style='text-align: end; width:97%;'>" . htmlspecialchars($row['create_at']) . "</p>";
        echo "</div>";
        echo "</div><br>";  
    }
} else {
    echo "There are no posts uploaded yet.";
}
?>
      </div>
     </header>
     <main>
      <div class="blog-container">
     <?php
      // Retrieve content data from the database
      $res = $connection->query("SELECT * FROM blogcontent ORDER BY post_id DESC");
    if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $image = "<img src='" . htmlspecialchars($row['image']) . "' width='280px'><br>";
        $title = htmlspecialchars($row["title"]);
        $content = htmlspecialchars($row["content"]);
        $id = htmlspecialchars($row["post_id"]);

        echo "<div class='box reveal'>";
        echo $image;
        echo "<p class='title'>" . $title . "</p>";
        echo "<p class='content'>" . $content . "</p>";  
        echo "<p style='text-align: end; width:97%;'>" . htmlspecialchars($row['create_at']) . "</p>";
        echo "</div><br>";  
    }
} else {
    echo "There are no posts uploaded yet.";
}
?>
      </div>
     </main>
    <footer>
      <?php
        require "../includes/pagesfooter.php";
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
      // scroll eff--------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  const elements = document.querySelectorAll(".reveal");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    },
    { threshold: 0.2 }
  ); // Trigger when 20% of the element is visible

  elements.forEach((el) => observer.observe(el));
});

    </script>
</body>
</html>