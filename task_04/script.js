// Validation function for login
function validateLogin() {
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;
  const error = document.getElementById('error');

  if(username === "" || password === "") {
    error.textContent = "Username and Password cannot be empty!";
    error.style.color = "red";
    return false; // Prevent form submission
  }

  alert("Login Successful!");
  return true; // Allow form submission
}

// Accessing elements
const username = document.getElementById('username');
const password = document.getElementById('password');
const loginBtn = document.getElementById('loginBtn');
const loginForm = document.getElementById('loginForm');


// When user focuses on input
username.addEventListener('focus', () => console.log('Username input focused'));
password.addEventListener('focus', () => console.log('Password input focused'));

// When user leaves input
username.addEventListener('blur', () => console.log('Username input blurred'));
password.addEventListener('blur', () => console.log('Password input blurred'));

// When user types
username.addEventListener('input', () => console.log('Username input changed:', username.value));
password.addEventListener('input', () => console.log('Password input changed:', password.value));

// Key events
username.addEventListener('keydown', (e) => console.log('Key down:', e.key));
username.addEventListener('keyup', (e) => console.log('Key up:', e.key));
username.addEventListener('keypress', (e) => console.log('Key press:', e.key));


loginBtn.addEventListener('click', () => console.log('Login button clicked'));
loginBtn.addEventListener('dblclick', () => console.log('Login button double clicked'));
loginBtn.addEventListener('mouseover', () => console.log('Mouse over login button'));
loginBtn.addEventListener('mouseout', () => console.log('Mouse out login button'));
loginBtn.addEventListener('mousedown', () => console.log('Mouse button down on login'));
loginBtn.addEventListener('mouseup', () => console.log('Mouse button up on login'));


loginForm.addEventListener('submit', (e) => {
  console.log('Form submitted');
  // e.preventDefault(); // Uncomment to prevent submission for testing
});

loginForm.addEventListener('reset', () => console.log('Form reset'));

window.addEventListener('load', () => console.log('Window loaded'));
window.addEventListener('resize', () => console.log('Window resized'));
window.addEventListener('scroll', () => console.log('Window scrolled'));
window.addEventListener('beforeunload', (e) => {
  console.log('Window about to be closed');
  e.returnValue = ''; // Shows confirmation dialog
});
// Copy, Cut, Paste
username.addEventListener('copy', () => console.log('Copied from username'));
username.addEventListener('cut', () => console.log('Cut from username'));
username.addEventListener('paste', () => console.log('Pasted into username'));
