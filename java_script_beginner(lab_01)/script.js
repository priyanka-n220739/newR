// ================= TASK 1 =================
var company = "MyStartup";
let founder = "Priya";
const year = 2026;

console.log(company, founder, year);

// ================= TASK 2 =================
function add(a, b) {
  return a + b;
}

const subtract = (a, b) => a - b;

console.log("Addition:", add(10, 5));
console.log("Subtraction:", subtract(10, 5));

// ================= TASK 3 =================
alert("Welcome to My Startup Website!");

let userName = prompt("Enter your name:");
console.log("User Name:", userName);

// ================= TASK 4 =================
function changeText() {
  document.getElementById("text").innerHTML =
    "You clicked the button!";
}

// ================= TASK 5 =================
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

// ================= TASK 6 =================
let box = document.getElementById("box");

box.onmouseover = function () {
  box.style.backgroundColor = "lightblue";
};

box.onmouseout = function () {
  box.style.backgroundColor = "white";
};

// ================= TASK 7 =================
function validateForm() {
  let name = document.getElementById("name").value;
  let email = document.getElementById("email").value;

  if (name === "" || email === "") {
    alert("All fields are required!");
    return false;
  }

  console.log("Form Submitted");
  return true;
}

// Print Function
function printPage() {
  window.print();
}