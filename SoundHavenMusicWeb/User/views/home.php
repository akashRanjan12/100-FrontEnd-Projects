<?php
// Assuming you have a session started and user data available
session_start();
require  "../../config/configuration.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
  .current-playlist-container{
    padding: 20px;
  }
</style>
<body>
  <div class="current-playlist-container">
    <h1>This is the section of latest play music by the user</h1>
    <h3>this feature will coming soon</h3>
  </div>
  <div class="user-playlist-container">
    <div class="user">
        
    </div>
  </div>
  
<script>
  document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".view-user-tracks").forEach(btn => {
      btn.addEventListener("click", function () {
        const userEmail = this.parentElement.getAttribute("data-email");
        // Store selected email in sessionStorage
        sessionStorage.setItem("selectedUserEmail", userEmail);
        // Load the specific user's track view (SPA method)
        $(".content").load("views/track.php");
      });
    });
  });
</script>
</body>
</html>