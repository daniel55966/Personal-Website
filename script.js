// Form Validation Try/Catch: JS Week 4
function validateForm() {
    let x = document.forms["myForm"]["name"].value;
    let y = document.forms["myForm"]["email"].value;
    try {
        if (x == "") throw "is empty";
    } 
    catch(error) {
        alert("Full name is required");
        return false;
    }
    try {
        if (y == "") throw "is empty";
    }
    catch(error) {
        alert ("Email address is required");
        return false;
    }
}

// Array Lesson: JS Week 3
let referenceArray = [["Reference 1", " This is my reference for Daniel"], ["Reference 2", " This is my reference for Daniel"], ["Reference 3", " This is my reference for Daniel"]];

let myVar = "My references are: <ol>";

for (let i = 0; i < referenceArray.length; i++){
    myVar += "<li>" + referenceArray[i] + "</li>"
}

myVar += "</ol>";

document.getElementById("References").innerHTML = myVar;

// Dice Roller Function
var parameter;
var randomNumber;

function clickEvent(diceNumber, dice) {
    var total = 0;
    try {
        if (diceNumber > 100) throw "too many dice"; 
    }
    catch(error) {
        alert("Too many dice, please keep between 1 and 100.")
        return false;
    }
    for (var i = 0; i < diceNumber; i++) {
        randomNumber = Math.floor(Math.random() * dice) + 1;
        total += randomNumber;
    }

    parameter = document.getElementById("demo");
    parameter.innerHTML = total;
}

// Calculator Functions
// Clear Screen
function clearScreen() {
    document.getElementById("result").value = "";
}

// Display Values
function display(value) {
    document.getElementById("result").value += value;
}

// Evaluate Expression and Return Result
function calculate() {
    var x = document.getElementById("result").value;
    var y = eval(x);
    document.getElementById("result").value = y;
}

