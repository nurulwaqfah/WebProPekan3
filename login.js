function showRegister(){
document.getElementById("loginForm").style.display="none";
document.getElementById("registerForm").classList.remove("hidden");
document.getElementById("backLogin").classList.remove("hidden");
}

function showLogin(){
document.getElementById("loginForm").style.display="block";
document.getElementById("registerForm").classList.add("hidden");
document.getElementById("backLogin").classList.add("hidden");
}