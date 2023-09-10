<?php
    include_once('../Controller/UserController.php');

    if (isset($_POST['create'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_pw = $_POST['confirmpassword'];
        $userController = new UserController();
        //Kiểm tra xem mật khẩu đã đủ 8 kí tự chưa
        if(strlen($password) >= 8) {
        //Kiểm tra xem mật khẩu xác nhận đúng chưa
            if($password === $confirm_pw) {
              $result = $userController->register($username, $email, $password);
              if($result === true) {
                header('location: signIn.php');
                exit;
              } else {
                $text_err = "Email or Username already exists!";
              }
            } else {
              $text_error = "Password incorrect!";
            }
        } 
    }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible"content="IE=edge">
  <title>Register</title>
  <link rel="icon" type="image/x-icon" href="../assets/img/logo_shoes.png">
  <link href="../dist/output2.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../main.js"></script>
</head>
<body>
    <section class="bg-orange-50 min-h-screen flex items-center justify-center">
      <div class="bg-orange-100 flex rounded-2xl shadow-2xl max-w-3xl p-5 items-center justify-center">
        <!-- poster -->
        <div class="w-1/2 p-5">
           <img class="md:block hidden rounded-2xl" src="../assets/img/poster_res.jpg" alt="">
        </div>
      <!-- form -->
        <div class="md:w-1/2 px-16">
          <h2 class="font-bold text-[#D62569] text-2xl mb-2 mt-4">Register</h2>
          <form action="" class="flex flex-col gap-6" method="post">
            <!-- Username -->
            <div class="flex flex-col gap-2 mt-4">
              <h2 class="font-bold text-black text-base">Username</h2>
              <input class="p-2 rounded-xl border" type="text" name="username">
            </div>

            <!-- Email -->
            <div class="flex flex-col mt-4 gap-2 relative">
              <h2 class="font-bold text-black text-base">Email</h2>
              <input class="p-2 rounded-xl border" type="text" name="email" placeholder="example:abc@gmail.com">
                <?php 
                  if(isset($text_err) && ($text_err != "")) {
                    echo '<p class="text-sm text-red-600 absolute -bottom-6">' . $text_err . '</p>';
                  }   
                ?>
            </div>

            <!-- Password -->
            <div class="flex flex-col gap-2 mt-4 relative">
              <h2 class="font-bold text-black text-base">Password</h2>
              <input class="p-2 rounded-xl border" type="password" name="password" id="password" oninput="checkPasswordLenght()" placeholder="8+ characters">
              <p id="password-error" class="text-sm text-red-600 absolute -bottom-10"></p>
              <span id="showPasswordRes" class="-mt-2 cursor-pointer" onclick="hiddenPassword(true, 'password', 'showPasswordRes', 'hiddenPasswordRes')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 translate-y-1/2" viewBox="0 0 16 16">
                      <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                      <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg>
              </span>

              <span id="hiddenPasswordRes" class="hidden -mt-2 cursor-pointer" onclick="hiddenPassword(false, 'password', 'showPasswordRes', 'hiddenPasswordRes')">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye-slash absolute top-1/2 right-3 translate-y-1/2" viewBox="0 0 16 16">
                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                    <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                   </svg>
              </span>
            </div>
            
            <!-- Confirm password -->
            <div class="flex flex-col gap-2 mt-4 relative">
              <h2 class="font-bold text-black text-base">Confirm Password</h2>
              <input class="p-2 rounded-xl border" type="password" name="confirmpassword" placeholder="Confirm Password" id="passwordConfFieldRes">
              <?php 
                  if(isset($text_error) && ($text_error != "")) {
                    echo '<p class="text-sm text-red-600 absolute -bottom-6">' . $text_error . '</p>';
                  }   
                ?>
              <span id="showConfPasswordRes" class="-mt-2 cursor-pointer" onclick="hiddenPassword(true, 'passwordConfFieldRes', 'showConfPasswordRes', 'hiddenConfPasswordRes')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 translate-y-1/2" viewBox="0 0 16 16">
                      <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                      <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg>
              </span>

              <span id="hiddenConfPasswordRes" class="hidden -mt-2 cursor-pointer" onclick="hiddenPassword(false, 'passwordConfFieldRes', 'showConfPasswordRes', 'hiddenConfPasswordRes')">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye-slash absolute top-1/2 right-3 translate-y-1/2" viewBox="0 0 16 16">
                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                    <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                   </svg>
              </span>
            </div>

            <!-- click để tạo tk -->
            <button type="submit" name="create" class="bg-[#D62569] hover:scale-105 duration-300 rounded-2xl text-white mt-4 py-2">Create Account</button>

          </form>

          <div class="mt-4 text-xs flex justify-between items-center">
              <p>Already have an account?</p>
              <button class="py-2 px-5 bg-white border border-double border-2 border-red-200 rounded-2xl hover:scale-110 duration-300" onclick="redirectToSignIn()">Sign In</button>
          </div>

        </div>
        
      </div>
    </section>

   
</body>
</html>