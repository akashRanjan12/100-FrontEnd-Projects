<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require "../config/configuration.php";

// 1. Redirect to signup if session data missing
if (!isset($_SESSION["email"], $_SESSION["name"], $_SESSION["password"])) {
    header("Location: signup.php");
    exit();
}

$email = $_SESSION["email"];
$name = $_SESSION["name"];
$password = $_SESSION["password"];
$message = "";

// 2. Handle resend OTP
if (isset($_GET['resend'])) {
    unset($_SESSION["otp"], $_SESSION["otp_created_at"]);
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?')); // refresh without ?resend
    exit();
}

// 3. Generate OTP if not already sent
if (!isset($_SESSION["otp"])) {
    $otp = random_int(1000, 9999);
    $_SESSION["otp"] = $otp;
    $_SESSION["otp_created_at"] = time();

    // Send email
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "akash12ranjan@gmail.com"; // use your sender email
        $mail->Password = 'qsee ejor buwq znqi';     // use your app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('akash12ranjan@gmail.com', 'SoundHavenOtp');
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for S☆und Haven';
        $mail->Body = 'Your OTP is <b>' . $_SESSION["otp"] . '</b>. It will expire in 10 minutes.';
        $mail->send();
        $message = "<p style='color:green;'>OTP has been sent to your email.</p>";
    } catch (Exception $e) {
        $message = "<p style='color:red;'>Mailer Error: " . $mail->ErrorInfo . "</p>";
    }
}

// 4. Handle OTP submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["verify"])) {
    $userOtp = $_POST["otp"] ?? "";

    if ($userOtp == $_SESSION["otp"]) {
        try {
            $stmt = $connection->prepare("INSERT INTO userdetails (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $password);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                unset($_SESSION["otp"], $_SESSION["name"], $_SESSION["email"], $_SESSION["password"], $_SESSION["otp_created_at"]);
                header("Location: login.php");
                exit();
            } else {
                $message = "<p style='color:red;'>Database error! Please try again later.</p>";
            }
        } catch (mysqli_sql_exception $e) {
            $message = "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
        }
    } else {
        $message = "<p style='color:red;'>Incorrect OTP. Please try again.</p>";
    }
}
?>

<!-- HTML PART -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>S☆undHaven | Verify OTP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="pages.css">
</head>
<body>
  <!-- Preloader -->
  <div id="preloader">
    <p style="font-size: 7rem">𝄞</p>
    <p>S☆und Haven</p>
    <div class="loading">
      <svg width="64px" height="48px">
        <polyline points="0.157 23.954, 14 23.954, 21.843 48, 43 0, 50 24, 64 24" id="back"></polyline>
        <polyline points="0.157 23.954, 14 23.954, 21.843 48, 43 0, 50 24, 64 24" id="front"></polyline>
      </svg>
    </div>
    <h1>Welcome to S☆und Haven.</h1>
    <h3>Website is loading, please wait...</h3>
  </div>

  <!-- Navbar -->
  <?php require "../includes/navbar.html"; ?>

  <!-- OTP Form -->
  <div class="form-container">
    <div class="container">
      <div class="card">
        <p class="logo" style="font-size: 7rem;">𝄞</p>
        <p class="logo">S☆und Haven</p><br>
        <form method="POST">
          <input id="wid" type="text" name="otp" placeholder="Enter OTP here..." required />
          <input class="transparent-btn" type="submit" name="verify" value="Verify OTP" />
        </form>
        <br>
        <?= $message ?>  <br>
        <!-- <p>OTP sent to <b><?= htmlspecialchars($email) ?></b></p> -->
        <p>Didn't receive OTP? <a href="?resend=true">Resend OTP</a></p>
        <br>
        <a href="../pages/sigin.php">Go Back</a>
      </div>
    </div>
  </div>

  <footer style="padding-top: 60px">
    <?php require "../includes/footer.php"; ?>
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
    // Disable copying text
    document.addEventListener("copy", function (event) {
      event.clipboardData.setData("text/plain", "⚠️ Sorry, copying is disabled.");
      event.preventDefault();
    });
  </script>
</body>
</html>
