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
            <form action="" method="POST">
              <input id="wid" type="email" name="email" placeholder="Enter e-mail here..." required>
              <input id="wid" type="password" name="password" placeholder="Enter Password..." required>
              <input class="white-btn" type="submit" name="submit">
            </form>
            <?php
               require("../config/configuration.php");
               //check if the form is submitted
                 if($_SERVER["REQUEST_METHOD"] == "POST"){
                   if(isset($_POST["submit"])){
                       $email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_SPECIAL_CHARS);
                       $password = $_POST["password"];
                       if(empty($email)){
                           echo "*<u style='color:red;'>e-mail is required</u><br>";
                       }else if(empty($password)){
                           echo "*<u style='color:red;'>password is required</u><br>";
                       }else{
                          try{   
                            $check = $connection->prepare("SELECT * FROM userdetails WHERE email = ?");
                            $check->bind_param("s", $email);
                            $check->execute();
                            $result = $check->get_result();
               
                            if($result->num_rows === 1){
                               $row = $result->fetch_assoc();
                               $hashed_password = $row['password'];
                               if(password_verify($password, $hashed_password)){
                                   // Password is correct, set session variables and redirect to dashboard
                                   session_start();
                                   $_SESSION['username'] = $row['name'];
                                   $_SESSION['useremail'] = $row['email'];
                                   header("Location: ../User/userDashboard.php");
                                   exit();
                               } else {
                                   echo "<u style='color:red;'>Invalid password</u><br>";
                               }
                            }else{
                               echo "<u style='color:red;'>Email not found</u><br>";
                            }            
                          }catch(Exception $e){
                              echo "Error: " . $e->getMessage() . "<br>";
                          }
                          finally{
                              //close the connection
                               mysqli_close($connection);
                               $check->close();
                          }
                       }
                   }
                 }
            ?>
            <br>
            <p id="Psize">Create New account <a href="../pages/sigin.php"> Create one!</a></p>
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
    <!-- <script>
      // prohibited to copy text
      document.addEventListener("copy", function (event) {
        event.clipboardData.setData(
          "text/plain",
          "⚠️ sorry content is not being copied."
        );
        event.preventDefault();
      });
    </script> -->
</body>
</html>