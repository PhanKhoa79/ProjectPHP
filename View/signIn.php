  <?php
    session_start();
      include_once('../Controller/UserController.php');

      if (isset($_POST['login'])) {
          $email = $_POST['email'];
          $password = $_POST['password'];
          $userController = new UserController();

          $result = $userController->login($email, $password);
          if($result !== true) {
            $text_err = "Email or password is invalid!";
          } 
      }
      ?>
  <!doctype html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"content="IE=edge">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/logo_shoes.png">
    <link href="../dist/output2.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../main.js"></script>
  </head>
  <body>
    <section class="bg-orange-50 min-h-screen flex items-center justify-center">
      <!-- form -->
        <div class="bg-orange-100 flex rounded-2xl shadow-2xl max-w-3xl p-5 items-center">
          <div class="md:w-1/2 px-16">
            <h2 class="font-bold text-[#D62569] text-2xl">Login</h2>
            <p class="text-sm mt-4">If you already a member, easily log in</p>
            <form action="signIn.php" class="flex flex-col gap-4" method="post">
              <div class="flex flex-col mt-4 gap-2">
                <h2 class="font-bold text-black text-base">Email</h2>
                <input class="p-2 rounded-xl border" type="text" name="email">
              </div>

              <!-- Password -->
              <div class="flex flex-col gap-2 mt-4 relative">
                <h2 class="font-bold text-black text-base">Password</h2>
                <input class="p-2 rounded-xl border" type="password" name="password" id="passwordField" oninput="disableLogin()">
                <?php 
                  if(isset($text_err) && ($text_err != "")) {
                    echo '<p class="text-sm text-red-600 absolute -bottom-6">' . $text_err . '</p>';
                  }   
                ?>
                <!-- icon show password -->
                <span id="showPassword" class="-mt-2 cursor-pointer" onclick="hiddenPassword(true, 'passwordField', 'showPassword', 'hiddenPassword')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 translate-y-1/2" viewBox="0 0 16 16">
                      <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                      <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg>
                </span>

                <!-- icon hidden password -->
                <span id="hiddenPassword" class="hidden -mt-2 cursor-pointer" onclick="hiddenPassword(false, 'passwordField', 'showPassword', 'hiddenPassword')">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye-slash absolute top-1/2 right-3 translate-y-1/2" viewBox="0 0 16 16">
                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                    <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                   </svg>
                </span>
              </div>

              <button type="submit" name="login" id="btnLogin" class="bg-[#D62569] hover:scale-105 duration-300 rounded-2xl text-white mt-6 py-2">Login</button>
            </form>
            <div class="mt-10 grid grid-cols-3 items-center text-gray-400">
              <hr class="text-gray-400">
              <p class="text-center text-sm">OR</p>
              <hr class="text-gray-400">
            </div>

            <button class="bg-white border py-2 w-full rounded-2xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300">
            <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20px" height="25px" viewBox="0 0 48 48">
              <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
            </svg>
              Login with Google
            </button>

              <p class="mt-5 text-xs border-b border-gray-400 py-4">Forgot your password?</p>

              <div class="mt-3 text-xs flex justify-between items-center">
                <p>Don't Have An Account?</p>
                <button class="py-2 px-5 bg-white border-double border-2 border-red-200 rounded-2xl hover:scale-110 duration-300" onclick="redirectToSignUp()">Register</button>
              </div>
          </div>

          <!-- img login -->
          <div class="w-1/2 p-5">
            <img class="md:block hidden rounded-2xl" src="../assets/img/poster_giay.jpg" alt="">
          </div>
        </div>
    </section>

  </body>
  </html>