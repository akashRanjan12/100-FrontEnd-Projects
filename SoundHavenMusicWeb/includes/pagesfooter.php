
<style>
      * {
        padding: 0;
        margin: 0;
      }
      body {
        overflow-x: hidden;
      }
      a {
        text-decoration: none;
        color: whitesmoke;
      }
      .container-01 {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        background-color: #010312;
        color: whitesmoke;
        justify-content: space-around;
        align-items: center;
        padding: 40px 20px;
        .logo-cont {
          display: flex;
          flex-direction: column;
          gap: 10px;
          .logo {
            font-size: 3.5rem;
            font-weight: 600;
            color: white;
          }
          .quote {
            padding: 5px 20px;
            font-size: 1.2rem;
            text-align: center;
          }
        }
        .data-cont {
          display: flex;
          gap: 50px;
          .dc-01,
          .dc-02 {
            display: flex;
            flex-direction: column;
            gap: 10px;
            color: rgb(162, 162, 162);
            h2 {
              color: white;
            }
            a {
              transition: all 0.3s ease;
              &:hover {
                transform: scale(1.1);
                color: whitesmoke;
              }
            }
          }
        }
        .sm-cont {
          display: flex;
          flex-direction: column;
          .sm {
            padding-top: 10px;
            display: flex;
            gap: 20px;
            font-size: 1.2rem;
            a {
              transition: all 0.3s ease;
              &:hover {
                transform: scale(1.2);
              }
              .fa-facebook {
                transition: all 0.3s ease;
                &:hover {
                  color: blue;
                }
              }
              .fa-twitter {
                transition: all 0.3s ease;
                &:hover {
                  color: rgb(48, 73, 255);
                }
              }
              .fa-instagram {
                transition: all 0.3s ease;
                &:hover {
                  color: orange;
                }
              }
              .fa-youtube {
                transition: all 0.3s ease;
                &:hover {
                  color: orangered;
                }
              }
            }
          }
        }
      }
      .footer-bottom {
        text-align: center;
        font-size: 1.2rem;
        padding: 30px 10px;
        color: aliceblue;
        background-color: #010312;
        border-top: 1px solid gray;
      }
      @media screen and (max-width: 512px) {
        .container-01 {
          /* justify-content: center; */
          text-align: center;
          .data-cont {
          display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .logo-cont {
          display: flex;
          flex-direction: column;
          gap: 10px;
          .logo {
            font-size: 2.5rem;
          }
          .quote {
            padding: 5px;
          }
        }
        }
      }
    </style>
    <footer>
      <div class="container-01">
        <div class="logo-cont">
          <div class="logo">𝄞 S☆und Haven</div>
          <div class="quote">
            <p>
              "Where every beat finds its soul."
              <br />
              Tune in. Zone out. Vibe forever.
            </p>
          </div>
        </div>
        <div class="data-cont">
          <div class="dc-01">
            <h2>Explore</h2>
            <a href="pages/aboutpage.php">About Us</a>
            <a href="pages/Blogpage.php">Blog</a>
            <a href="pages/playlist.php">Charts</a>
            <a href="pages/premium.php">Resources for Artists</a>
          </div>
          <div class="dc-02">
            <h2>Support</h2>
            <a href="pages/helppage.php">Help Center</a>
            <a href="pages/aboutpage.php">Privacy Policy</a>
            <a href="pages/aboutpage.php">Terms & Conditions</a>
            <a href="pages/aboutpage.php">Community Guidelines</a>
          </div>
        </div>
        <div class="sm-cont">
          <h1>Follow us on..</h1>
          <div class="sm">
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <i class="fa-regular fa-copyright"></i>
        <font class="date"> 2026 </font>
        <font> S☆und Haven — All rights reserved. Crafted for music lovers worldwide.</font>
      </div>
    </footer>
    <script>
      // set date for copy right
      var date = new Date();
      document.querySelector(".date").innerHTML = date.getFullYear();
    </script>