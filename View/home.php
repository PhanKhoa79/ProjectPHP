<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"content="IE=edge">
    <title>Home</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/logo_shoes.png">
    <link href="../assets/style.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

  </head>
    
  <body>
    
    <!-- header -->
    <header>
      <a href="#" class="logo">V<span>k</span>h<span>a</span></a>

      <ul class="navlist">
        <li><a href="#men">Men</a><li>
        <li><a href="#women">Women</a></li>
        <li><a href="#child">Child</a></li>
        <li><a href="#sport">Sport</a></li>
        <li><a href="#sale">Sale</a></li>
      </ul> 

        <ul class="navlist-top">
          <?php
            if(isset($_SESSION['login']['user'])){ 
          ?>
            <li class="user-avatar">
              <a href="#">
                <img src="
                  <?php 
                    if(isset($_SESSION['login']['avatar'])) {
                      echo $_SESSION['login']['avatar'];
                    }
                  ?>"
                alt="User Avatar" />
              </a>
              <span class="user-name">
                <?php 
                  echo $_SESSION['login']['user'];
                ?>
              </span>
            </li>
            <li><a href="logOut.php">Log out</a></li>
          <?php 
            } else {
          ?>
            <li><a href="signIn.php">Sign In</a></li>
            <li><a href="signUp.php">Sign Up</a></li>
          <?php 
            }
          ?>
        </ul>
      
      <div class="bx bx-menu" id="menu-icon"></div>
    </header>

    <!-- slider -->
    
    <section class="home" id="home">
      <div class="home-text">
        <div>
          <h1>ILLEGALLY FAST</h1>
          <p>Quá nhiều công nghệ trong một đôi giày chạy bộ, nó <br>
           không được cho phép trong các cuộc đua hệ tuyển.<br> Trải nghiệm trước cho hội viên adiClub.</p>
        </div>
        <div class="button">
          <a href="#" class="btn-men"><span><i class='bx bxl-shopify'></i></span>Buy For Men</a>
          <br>
          <a href="#" class="btn-women"><span><i class='bx bxl-shopify'></i></span>Buy For Women</a>
        </div>
      </div>
    </section>

    <section class="tabbed-carousel-wrapper">
      <div class="grid-row">
        <div class="col-mb">

        </div>
      </div>
    </section>

    <!-- liên kết với js -->
    <script src="../main.js"></script>

  </body>

</html>
