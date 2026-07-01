<?php

include '../../config/configuration.php'; // DB connection
session_start();
$usermail = $_SESSION['useremail'];
$username = $_SESSION['username'];

echo "<h1 style='text-align: center; color: white;'>Welcome " . ucfirst($username) . "</h1>";
echo "<h4 style='text-align: center; color: white;'>" . $usermail . "</h4>";
// Fetch image

$res = $connection->query("SELECT * FROM userdetails WHERE email = '$usermail'");
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $profileImage = htmlspecialchars($row['profile_image']);
        $backgroundImage = htmlspecialchars($row['profile_background_image']);
    }
} else {
    echo "There are no posts uploaded yet.";
}

// Ensure the image URL is correct and accessible from the frontend
$imageUrl = !empty($profileImage) ? "/SoundHaven/Uploads/$profileImage" : "#"; // Adjusting the path
$imageUrl2 = !empty($backgroundImage) ? "/SoundHaven/Uploads/$backgroundImage" : "#"; // Adjusting the path
?>
<html lang="en">
<head>
  <style>
    /* CSS remains unchanged */
    .profile-image-container {
      height: 400px;
      width: 80%;  
      display: flex;
      justify-content: center;
      align-items: center;    
      align-self: center;
      justify-self:center;
    }
    .profile-images {
      width: 95%;
      height: 95%;
      overflow: hidden;
      border-radius: 10px;
      position: relative;
      border: 1px solid white;
      border-radius: 10px;
    }
    .full-screen-image {
      width: 100%;
      height: 100%;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      position: absolute;
      z-index: -1;
      
      img{  
        height: 100%;
        width: 100%;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
      }
    }
    .circle-image {
      width: 130px;
      height: 130px;
      background-color: transparent;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      position: absolute;
      z-index: 0;      
      img{  
        height: 100%;
        width: 100%;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        border: 3px solid white;
        border-radius: 50%;
      }
     
    }
    .set-img-btn,
    .set-img-btn2 {
      cursor: pointer;
      margin: 4px 20px;
    }
    .btns{
      width: 80%;  
      display: flex;
      justify-content: space-evenly;
      gap: 10px;
      align-items: center;    
      align-self: center;
      justify-self:center;
      margin-bottom: 10px;
    }
    .transparent-btn {
      padding: 4px 30px;
      font-size: 1rem;
    }
    .img-mega-container{
      width: 100%;
      height: 300px;
      position: fixed;
      display: flex;
      background-color: transparent;
      justify-content: center;
      align-items: center;
      gap: 10px;
      top: 180px;
      display: none;
    }
    .set-image-container,
    .set-image-container2 {
      color: black;
      display: none;
      background-color: whitesmoke;
      height: 270px;
      width: 280px;
      padding: 10px;
      position: absolute;
      flex-direction: column;
      gap: 10px;
      justify-content: space-around;
      align-items: center;
      border-radius: 6px;
    }
    
    .btn {
      padding: 4px 30px;
      background-color:rgb(2, 14, 26);
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
    }
    .profile-image {
      background-color:rgb(2, 14, 26);
      color: white;
      width: 90%;
      align-self: center;
      border: none;
      border-radius: 5px;
      cursor: pointer;          
    }
    /*main profile part----------------------  */
    /* popularity part */
    .popularity{
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      margin-top: 20px;
      margin-bottom: 20px;
      border-bottom: 1px solid white;
      padding-bottom: 10px;
    }
    /* end popularity */
    .menu-container{
      margin-left: 10px;
      display: flex;
      gap: 20px;
      margin-top: 10px;
      margin-bottom: 20px;
      span{
        font-size: 1.5rem;
        cursor: pointer;
        &:hover{
          text-decoration: underline;
        }
      }
    }
    .first-content {
      display: flex;
      flex-direction: column;
      .allmusic-section{
       #msg{
        text-align: center;
       }
      }
      .upload-btn{
        padding-top:40px ;
        display: flex;
        justify-content: center;
        gap: 20px;
        .upbtn{
          cursor: pointer;
        }
        .white-btn{
          padding: 4px 20px;
        }
      }
    }
    .rest-content {
      display: none;
    }
    /* upload container------------------ */
    .upload-container{
      position: fixed;
      top: 0;
      background-color:black;
      width: 100%;
      height: 100vh;      
      display:none;
      align-items: center;
      flex-direction: column;
      /* justify-content: center; */
      padding-top: 40px;
      .fa-xmark{
          width: 95%;
          width: max-content;
          display: flex;
          justify-self: flex-end;
          align-self: flex-end;
          font-size: 30px;
          cursor: pointer;
          margin-right: 30px;
          transition: all 0.3s ease;
          &:hover{
            transform: scale(1.2);
          }
      }      
      #heading{
        font-size: 50px;
        margin: 20px;
        text-align: center;
      }
      #description{
        font-size: 34px;
        margin: 20px;
        text-align: center;
      }
      form{
        display: flex;
        flex-direction: column;
        gap: 10px;
        input[type="file"]{
          padding: 4px 20px;
          background-color:rgb(2, 14, 26);
          color: white;
          border: none;
          border-radius: 5px;
          cursor: pointer;  
        }
        input[type="text"]{
          padding: 4px 20px;
          background-color:rgb(2, 14, 26);
          color: white;
          border: none;
          border-radius: 5px;
          cursor: pointer;   
          height: 30px;
          width: 270px;      
          border: 1px solid white; 
          font-size: 1.2rem;
        }
      }
      }
      .preview-music-container{
        margin-bottom: 40px;
        border: 2px dotted gray;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 40px;
        transition: all 0.3s ease;
        &:hover{
          border-color: white;
        }
      }
      .allmusic-section{
        width: 100%;
        justify-content: center;
        align-items: center;
      .track-item{     
        width: 60%;
        display: flex;
        justify-self: center;
          button{
            display: flex;
            width: 100%;
            background-color: white;
            color: black;
            gap: 10px;
            align-items: center;
            cursor: pointer;
          }     
          p{            
            text-align: start;
            padding: 4px 10px;
            font-size: 1.2rem;
          }   
      }
    }
    #des{
        width: 60%;
        display: flex;
        justify-self: center;
        text-align: start; 
        font-size: 1rem;
        border-bottom:1px solid white;
        padding-left: 20px;
    }
    /* media querries--------------------- */
    @media (max-width: 768px) {
    .profile-image-container {
        width: 95%;
    }
    .btns{
        width: 100%;
    }
    .set-img-btn,
    .set-img-btn2 {
      margin: 0;
    }
    .transparent-btn{
      padding: 3px 10px;
    }
    .allmusic-section{
      .track-item{     
          button{
            display: flex;
            width: 100%;
            background-color: white;
            color: black;
            gap: 10px;
            align-items: center;
            cursor: pointer;
          }     
          p{
            text-align: start;
            padding: 4px 10px;
            font-size: 1.2rem;
          }   
      }
    }
    .allmusic-section{
        width: 100%;
        justify-content: center;
        align-items: center;
      .track-item{     
        width: 100%;
        display: flex;
        justify-self: center;
          button{
            display: flex;
            width: 100%;
            background-color: white;
            color: black;
            gap: 10px;
            align-items: center;
            cursor: pointer;
          }     
          p{            
            text-align: start;
            padding: 4px 10px;
            font-size: 1.2rem;
          }   
      }
    }
    #des{
        width: 100%;
        display: flex;
        justify-self:unset;
        text-align: start; 
        padding: 4px 0px; 
        font-size: 1rem;
        border-bottom:1px solid white;
    }
  }
    @media (max-width: 512px) {
    .profile-image-container {
        width:100%;
        height: 280px
    }
    .img-mega-container{
      top: 80px;
    }
     .upload-container{
      #heading{
        font-size: 2rem;
        margin: 10px;
      }
      #description{
        font-size: 1.3rem;
        margin: 10px;
      }}
      .preview-music-container{
        gap: 20px;
      }
    }
  </style>
</head>
<body>

<div class="profile-image-container">
  <div class="profile-images">
    <div class="full-screen-image">
      <img src="<?= $imageUrl2 ?>" alt="Profile Image" class="profile-image" >
    </div>
    <div class="circle-image">
      <img src="<?= $imageUrl ?>" alt="Profile Image" class="profile-image">
    </div>
  </div>
</div>
<div class="btns">
<!-- btn -->
<div class="set-img-btn">
  <p class="transparent-btn">profile Image</p>
</div>
<!-- btn2 -->
<div class="set-img-btn2">
  <p class="transparent-btn">background Image</p>
</div>
</div>
<!-- image -->
 <div class="img-mega-container">
<div class="set-image-container">
  <div class="data">
    <h1>Set Profile Image</h1>
    <p>Upload your profile image</p>
  </div>
  <div class="preview">
    <img src="" alt="preview" class="preview-image" width="100px">
  </div>
  <form id="profile-form" enctype="multipart/form-data">
    <input id="profile-image" type="file" name="profile_image" required>
    <input class="btn" type="submit" value="submit">
  </form>
</div>
<!-- image2 -->
 <div class="set-image-container2">
  <div class="data">
    <h1>Set background Image</h1>
    <p>Upload your profile image</p>
  </div>
  <div class="preview2">
    <img src="" alt="preview" class="preview-image2" width="100px">
  </div>
  <form id="profile-form2" enctype="multipart/form-data">
    <input id="profile-image2" type="file" name="profile_background_image" required>
    <input class="btn" type="submit" value="upload">
  </form>
</div>
</div>
<hr>
<main-part>
    <div class="popularity">
      <span class="likes">Likes</span>
      <span class="followers">Followers</span>
      <span class="following">Following</span>
    </div>

<div class="menu-container">
  <span onclick="showBox('menu-content1')">All</span>
  <span onclick="showBox('menu-content2')">Playlist</span>
  <span onclick="showBox('menu-content3')">Album</span>
  <span onclick="showBox('menu-content4')">Tracks</span>
</div>
<div class="menu-content-container">
  <div class="first-content menu-content1">
    <div class="allmusic-section">       
  <?php
      // Retrieve title, description, and music path from the usercontent table
      $musicRes = $connection->query("SELECT * FROM usercontent WHERE user_id = (SELECT id FROM userdetails WHERE email = '$usermail') ORDER BY uploaded_at DESC");
            if ($musicRes->num_rows > 0) {
          while ($row = $musicRes->fetch_assoc()) {
              // Fetch title, description, and music path
              $title = htmlspecialchars($row['title']);
              $description = htmlspecialchars($row['description']);
              $musicPath = htmlspecialchars($row['music_path']);
              
              // Display each track with the play button
              echo "
              <div class='track-item'>
                <button class='play-track' data-src='../Uploads/$musicPath'>
                <p>$title</p>                
                ▶ Play $title
                </button>
              </div>
               <p id='des'>$description</p><br>";
            }
            } else {
                echo "<p>There are no posts uploaded yet.</p>";
            }
        ?>
      </div>

    <div class="upload-btn">
      <p class="upbtn transparent-btn" onclick="openUploadContainer()">Upload you track now.</p>
      <p class="upbtn white-btn" onclick="openUploadContainer()">upload</p>
    </div>
  </div>
  <div class="rest-content menu-content2">
    <h1>Playlist</h1>
    <p>All your uploaded content will be here</p>
  </div>
  <div class="rest-content menu-content3">
    <h1>Album</h1>
    <p>All your uploaded content will be here</p>
  </div>
  <div class="rest-content menu-content4">
    <h1>Tracks</h1>
    <p>All your uploaded content will be here</p>
  </div>
</div>
</main-part>
<upload-part>
  <!-- upload music container----------------------- -->
  <div class="upload-container">
    <i class="fa-solid fa-xmark"></i>
  <p id="heading">Upload your track</p>
  <p id="description">Upload your track and share it with the world.</p>    
  <!-- preview music container -->
  <div class="preview-music-container">
    <audio id="audio-player" controls>
      <source src="" id="audio-preview" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>
<form id="upload-form" enctype="multipart/form-data">
  <input type="file" name="music_path" id="track-input" accept="audio/*" required>
  <input type="text" name="title" placeholder="Track Title" required>
  <input type="text" name="description" placeholder="Track Description" required>
  <input class="transparent-btn" type="submit" value="Upload Track">
</form>
  </div>
</div>
</upload-part>
<script>
  let profile = true;

  document.querySelector('.set-img-btn').addEventListener('click', function() {
    const container = document.querySelector('.set-image-container');
    const container2 = document.querySelector('.set-image-container2');
    const mega_cont = document.querySelector('.img-mega-container');
    if (profile) {
      container.style.display = 'flex';
      mega_cont.style.display = 'flex';
      container2.style.display = 'none';
    } else {
      container.style.display = 'none';
      mega_cont.style.display = 'none';
    }
    profile = !profile;
  });

  document.querySelector('.set-img-btn2').addEventListener('click', function() {
    const container = document.querySelector('.set-image-container2');
    const container2 = document.querySelector('.set-image-container');
    const mega_cont = document.querySelector('.img-mega-container');
    if (profile) {
      container.style.display = 'flex';
      mega_cont.style.display = 'flex';
      container2.style.display = 'none';
    } else {
      container.style.display = 'none';
      mega_cont.style.display = 'none';
    }
    profile = !profile;
  });

  document.querySelector("main-part").addEventListener("click", function() {
    const container = document.querySelector('.set-image-container');
    const container2 = document.querySelector('.set-image-container2');
    const megaContainer = document.querySelector('.img-mega-container');
    container.style.display = 'none';
    container2.style.display = 'none';
    megaContainer.style.display = 'none';
    profile = !profile;
  });
    // x mark of upload container--------
    document.querySelector('.fa-xmark').addEventListener('click', function() {
         document.querySelector('.upload-container').style.display = 'none';
    });
    // btns of upload container--------
       function openUploadContainer() {
        document.querySelector('.upload-container').style.display = 'flex';
       }

  // Image preview
  document.querySelector('#profile-image').addEventListener('change', function() {
    const file = this.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
      document.querySelector('.preview-image').src = e.target.result;
    }
    reader.readAsDataURL(file);
  })
  // image preview2
  document.querySelector('#profile-image2').addEventListener('change', function() {
    const file = this.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
      document.querySelector('.preview-image2').src = e.target.result;
    }
    reader.readAsDataURL(file);
  }) 

  // Handle AJAX Form Submission
  document.getElementById('profile-form').addEventListener('submit', function(event) {
    event.preventDefault();
    let formData = new FormData(this);
    
    fetch('apis/uploadProfileImage.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        document.querySelector('.full-screen-image img').src = data.imageUrl;
        document.querySelector('.circle-image img').src = data.imageUrl;
        alert('Image uploaded successfully!');
      } else {
        alert('Image upload failed.');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Error occurred during image upload.');
    });
  });

  // Handle AJAX Form Submission for background image
  document.getElementById('profile-form2').addEventListener('submit', function(event) {
    event.preventDefault();
    let formData = new FormData(this);
    
    fetch('apis/uploadbackgroundimage.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        document.querySelector('.full-screen-image img').src = data.imageUrl;
        alert('Image uploaded successfully!');
      } else {
        alert('Image upload failed.');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Error occurred during image upload.');
    });
  });
</script>
<script>
  function showBox(boxClass) {
    const boxes = document.querySelectorAll('.menu-content-container > div');
    boxes.forEach(box => {
      if (box.classList.contains(boxClass)) {
        box.style.display = 'block';
      } else {
        box.style.display = 'none';
      }
    });
  }
</script>
<script>
  document.getElementById('track-input').addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (e) {
      const audio = document.getElementById('audio-player');
      const source = document.getElementById('audio-preview');

      source.src = e.target.result;
      audio.load(); // reload the audio element
      audio.play(); // optional: autoplay the preview
    };
    reader.readAsDataURL(file);
  });
</script>
<script>
document.getElementById('upload-form').addEventListener('submit', function(event) {
    event.preventDefault();
    let formData = new FormData(this);
    
    fetch('apis/uploadTracks.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('Music uploaded successfully!');
        
        // Create audio player dynamically
        let audioPlayer = document.createElement('audio');
        audioPlayer.controls = true;
        audioPlayer.src = '../../Uploads/' + data.music_path; // Ensure 'music_path' is in the response

        // Create title and description
        let title = document.createElement('h3');
        title.textContent = data.title; // Ensure 'title' is in the response

        let description = document.createElement('p');
        description.textContent = data.description; // Ensure 'description' is in the response

        // Create a container for the music item
        let musicItem = document.createElement('div');
        musicItem.classList.add('music-item');

        // Append elements to music item
        musicItem.appendChild(title);
        musicItem.appendChild(description);
        musicItem.appendChild(audioPlayer);

        // Append music item to the music section
        document.querySelector('.allmusic-section').appendChild(musicItem);
      } else {
        alert('Music upload failed.');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Error occurred during music upload.');
    });
});
</script>


</body>
</html>