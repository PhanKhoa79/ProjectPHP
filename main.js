//chuyển hướng trang
function redirectToSignUp() {
      window.location.href = 'signUp.php';
}

function redirectToSignIn() {
  window.location.href = 'signIn.php';
}

//check độ dài mật khẩu
function checkPasswordLenght() {
  let password = document.getElementById("password").value;
  let errorIf = document.getElementById("password-error");
  if(password.length < 8) {
    errorIf.innerHTML = "Password must be at least 8 characters long.";
  } else {
    errorIf.innerHTML = "";
  }
}

//vô hiệu hóa button login
function disableLogin() {
  let password = document.getElementById('passwordField').value;
  let btnLogin = document.getElementById('btnLogin');
  if(password.length < 8) {
    btnLogin.disabled = true; // Vô hiệu hóa nút
    btnLogin.classList.add("cursor-not-allowed"); // Thêm lớp CSS để đổi con trỏ
  } else {
    btnLogin.disabled = false;
    btnLogin.classList.remove("cursor-not-allowed"); 
  }
}
//ẩn hiện password
function hiddenPassword(show, fieldId, showIconId, hiddenIconId) {
  let passwordField = document.getElementById(fieldId);
  let showPassword = document.getElementById(showIconId);
  let hiddenPassword = document.getElementById(hiddenIconId);

  if(show) {
      passwordField.type = "text";
      showPassword.style.display = "none";
      hiddenPassword.style.display = "inline-block";
  } else {
      passwordField.type = "password";
      showPassword.style.display = "inline-block";
      hiddenPassword.style.display = "none";
  }
}

//scroll hiển thị section
const header = document.querySelector("header");
window.addEventListener("scroll", function() {
   header.classList.toggle("sticky", window.scrollY > 100);
});
