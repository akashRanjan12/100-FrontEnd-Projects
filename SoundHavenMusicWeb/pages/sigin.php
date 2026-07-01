<?php
  require "../config\configuration.php";
?>
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
      <!-- form -->
      <div class="form-container">
      <div class="container">
        <div class="card">
          <p class="logo">𝄞</p>
          <p class="logo">S☆und Haven</p><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
              <input id="wid" type="text" name="name" placeholder="Enter Nmae here..." required>
              <input id="wid" type="email" name="email" placeholder="Enter e-mail here..." required>
              <input id="wid" type="password" name="password" placeholder="Enter Password..." required>
              <input id="wid" type="password" name="repassword" placeholder="Enter again password..." required>
              <input class="white-btn" type="submit" name="submit">
            </form><br>
            <?php
require "../config/configuration.php";
session_start();

$name = $email = $pass = $c_pass = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
  $name = htmlspecialchars(trim($_POST["name"]));
  $email = htmlspecialchars(trim($_POST["email"]));
  $pass = $_POST["password"];
  $c_pass = $_POST["repassword"];

  if (empty($name)) {
    $message = "<p style='color:red;'>Name is required</p>";
  } elseif (empty($email)) {
    $message = "<p style='color:red;'>Email is required</p>";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message = "<p style='color:red;'>Invalid email format</p>";
  } elseif (empty($pass)) {
    $message = "<p style='color:red;'>Password is required</p>";
  } elseif (strlen($pass) < 6) {
    $message = "<p style='color:red;'>Password must be at least 6 characters</p>";
  } elseif ($pass !== $c_pass) {
    $message = "<p style='color:red;'>Passwords do not match</p>";
  } else {
    try {
      $check = $connection->prepare("SELECT * FROM userdetails WHERE email = ?");
      $check->bind_param("s", $email);
      $check->execute();
      $res = $check->get_result();

      if ($res->num_rows > 0) {
        $message = "<p style='color:red; text-align:center;'>This email already exists. Try another.</p>";
      } else {
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = password_hash($pass, PASSWORD_DEFAULT); // store hashed, insert after OTP
        header("Location: ../pages/otp.php");
        exit();
      }
    } catch (mysqli_sql_exception $e) {
      $message = "<p style='color:red;'>Database error: " . $e->getMessage() . "</p>";
    }
        }
      }
        ?>
            <p id="Psize">Already have an account? <a href="../pages/login.php"> Login!</a></p>
        </div>
      </div>
       </div>
       <!-- end form -->
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
