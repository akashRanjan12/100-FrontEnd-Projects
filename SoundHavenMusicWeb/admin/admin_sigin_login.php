
<?php
require "../config/configuration.php";
$flip = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/samestyle.css">
    <link rel="stylesheet" href="../assets/css/adminpagestyle.css">
</head>
<body>
    <?php
        require "../includes/navbar.html";
    ?>
    <main>
    <div class="card-container">
    <div class="card <?php echo $flip ? 'flipped' : ''; ?>" id="card">
    
    <!-- Sign-up form (Front Side) -->
    <div class="side front">
        <p id="admin">Admin</p><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <input id="wid" type="text" name="name" placeholder="Enter name..." required>
        <input id="wid" type="email" name="email" placeholder="Enter email..." required>
        <input id="wid" type="password" name="password" placeholder="Enter password..." required>
        <input id="wid" type="password" name="c_password" placeholder="Confirm password..." required>        
        <input class="transparent-btn" type="submit" name="sigin" value="signup">
        </form><br>
      <p>Already have an account? <a href="#" onclick="flipToLogin()">Login!</a></p>
      <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sigin']) && $_POST['sigin'] == 'signup') {
                // handle signup here...
                //check if the form is submitted                    
                $name = filter_input(INPUT_POST,"name", FILTER_SANITIZE_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_SPECIAL_CHARS);
                $password = $_POST["password"];
                $confirmpassword = $_POST["c_password"];
                if(empty($name)){
                    echo "<u style='color:red;'>Name is required</u><br>";
                }else if(empty($email)){
                    echo "<u style='color:red;'>e-mail is required</u><br>";
                }else if(empty($password)){
                    echo "<u style='color:red;'>Password is required</u><br>";
                }else if($password <= 6){
                    echo "<u style='color:red;'>Password must be at least 6 characters</u><br>";
                }else if(empty($confirmpassword)){
                    echo "<u style='color:red;'>ConFirm password is empty</u><br>";
                }else if($password != $confirmpassword){
                    echo "<u style='color:red;'>Password must be same</u><br>";
                }else{
                    try{   
                        // Check if email already exists
                        $check = $connection->prepare("SELECT * FROM admindetails WHERE email = ?");
                        $check->bind_param("s", $email);
                        $check->execute();
                        $result = $check->get_result();
        
                    if($result->num_rows > 0){
                        echo "Email already exists<br>";
                    }else{
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $stmt = $connection->prepare("INSERT INTO admindetails (name, email, password) VALUES (?, ?, ?)");
                        $stmt->bind_param("sss", $name, $email, $hashed_password);
                        $stmt->execute();
                        if($stmt->affected_rows > 0){
                            echo "successfull Sigin";
                            // if successful:
                            $flip = true;
                        }else{
                            echo "Error: Could not create account<br>";
                            echo "Please try again<br>";
                            exit();
                        }
                    }
                    }catch(mysqli_sql_exception ){
                        echo "Connection failed:";
                        exit();
                    }finally{
                        $check->close();
                        $connection->close();
                    }
                }
            }
        ?>
    </div>
            <a name="login"></a>
    <!-- Login form (Back Side) -->
    <div class="side back">
        <p id="admin">Admin</p><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <input id="wid" type="email" name="email" placeholder="Enter email..." required>
        <input id="wid" type="password" name="password" placeholder="Enter password..." required>
        <input class="transparent-btn" type="submit" name="login" value="login">
      </form><br>
      <p>Don't have an account? <a href="#" onclick="flipToSignup()">Create one.</a></p>
      <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']) && $_POST['login'] == 'login') {
                $flip = true; // 👈 ensure it stays flipped on login submit
                $email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_SPECIAL_CHARS);
                $password = $_POST["password"];
        if(empty($email)){
            echo "<u style='color:red;'>e-mail is required</u><br>";
        }else if(empty($password)){
            echo "<u style='color:red;'>password is required</u><br>";
        }else{
           try{   
             $check = $connection->prepare("SELECT * FROM admindetails WHERE email = ?");
             $check->bind_param("s", $email);
             $check->execute();
             $result = $check->get_result();

             if($result->num_rows === 1){
                $row = $result->fetch_assoc();
                $hashed_password = $row['password'];
                if(password_verify($password, $hashed_password)){
                    echo "successfull login";
                    // Password is correct, set session variables and redirect to dashboard
                    session_start();
                    $_SESSION['adminname'] = $row['name'];
                    $_SESSION['adminemail'] = $row['email'];
                    header("Location: adminDashboard.php");
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
        ?>
    </div>
  </div>
</div>

    </main>
    <footer>
        <?php
        require "../includes/footer.php";
        ?>
    </footer>
    <script>
         window.addEventListener("DOMContentLoaded", () => {
            <?php if (isset($flip) && $flip): ?>
                document.getElementById("card").classList.add("flipped");
            <?php endif; ?>
        });
    </script>
    <script>
        function flipToLogin() {
            document.getElementById('card').classList.add('flipped');
        }
        function flipToSignup() {
            document.getElementById('card').classList.remove('flipped');
        }
    </script>
</body>
</html>
