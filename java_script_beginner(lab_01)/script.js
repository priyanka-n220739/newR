 // TASK 1: Variables
var company = "MyStartup";
let founder = "Priya";
const year = 2026;
console.log(company, founder, year);

// TASK 2: Functions
function add(a, b) {
  return a + b;
}

const subtract = (a, b) => a - b;

console.log("Addition:", add(10, 5));
console.log("Subtraction:", subtract(10, 5));

// TASK 3: Built-in functions
alert("Welcome to Startup Website!");
let user = prompt("Enter your name:");
document.getElementById("greet").innerHTML = "Hello " + user;
console.log("User:", user);

// TASK 4: DOM manipulation
function changeText() {
  document.getElementById("text").innerHTML = "Text Changed!";
}

function addContent() {
  let p = document.createElement("p");
  p.innerText = "New Content Added";
  document.body.appendChild(p);
}

function removeContent() {
  let elements = document.querySelectorAll("p");
  if (elements.length > 1) {
    elements[elements.length - 1].remove();
  }
}

// TASK 5: Styling
let toggle = false;
function toggleStyle() {
  let box = document.getElementById("box");
  if (!toggle) {
    box.style.backgroundColor = "yellow";
    box.style.color = "red";
    box.style.fontSize = "20px";
  } else {
    box.style.backgroundColor = "white";
    box.style.color = "black";
    box.style.fontSize = "16px";
  }
  toggle = !toggle;
}

// TASK 6: Events
let hoverBox = document.getElementById("hoverBox");
hoverBox.onmouseover = function() {
  hoverBox.style.backgroundColor = "lightblue";
}
hoverBox.onmouseout = function() {
  hoverBox.style.backgroundColor = "white";
}

// TASK 7: Form validation
function validateForm() {
  let name = document.getElementById("name").value;
  let email = document.getElementById("email").value;

  if (name === "" || email === "") {
    alert("All fields required!");
    return false;
  }

  console.log("Form Submitted");
  return true;
}

// Print
function printPage() {
  window.print();
}
