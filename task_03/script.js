function validateLogin() {
  let user = document.getElementById("username").value;
  let pass = document.getElementById("password").value;
  let error = document.getElementById("error");

  if (user === "" || pass === "") {
    error.textContent = "Please fill all fields";
    return false;
  }

  alert("Login Successful!");
  window.location.href = "index.html";
  return false;
}

