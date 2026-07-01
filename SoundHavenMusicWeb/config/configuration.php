<?php
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_database= "soundhaven";

$connection = mysqli_connect($db_server, $db_user, $db_password, $db_database);
if(mysqli_connect_error()){
    echo "Connection failed: " . mysqli_connect_error();
    header("Location: error.html");
    exit();
}
?>
