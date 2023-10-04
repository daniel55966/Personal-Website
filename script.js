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

// To Do List Class
const todoObjectList = [];

class ToDo_Class {
    constructor(item){
        this.ulElement = item;
    }

    add() {
        const todoInput = document.querySelector("#myInput").value;
        if (todoInput == "") {
            alert("You did not enter an item!")
        } else {
            const todoObject = {
                id : todoObjectList.length,
                todoText : todoInput,
                isDone : false,
            }

        todoObjectList.unshift(todoObject);
        this.display();
        document.querySelector("#myInput").value = '';

        }
    }

    done_undone(x) {
        const selectedTodoIndex = todoObjectList.findIndex((item)=> item.id == x);
        console.log(todoObjectList[selectedTodoIndex].isDone);
        todoObjectList[selectedTodoIndex].isDone == false ? todoObjectList[
        selectedTodoIndex].isDone = true : todoObjectList[selectedTodoIndex].isDone = false;
        this.display();
    }

    deleteElement(z) {
        const selectedDelIndex = todoObjectList.findIndex((item)=> item.id == z);

        todoObjectList.splice(selectedDelIndex, 1);
        
        this.display();
    }

    display() {
        this.ulElement.innerHTML = "";

        todoObjectList.forEach((object_item) => {

            const liElement = document.createElement("li");
            const delBtn = document.createElement("i");

            liElement.innerText = object_item.todoText;
            liElement.setAttribute("data-id", object_item.id);

            delBtn.setAttribute("data-id", object_item.id);
            delBtn.classList.add("far", "fa-trash-alt");

            liElement.appendChild(delBtn);

            delBtn.addEventListener("click", function(e) {
                const deleteId = e.target.getAttribute("data-id");
                myToDoList.deleteElement(deleteId);
            })

            liElement.addEventListener("click", function(e) {
                const selectedId = e.target.getAttribute("data-id");
                myToDoList.done_undone(selectedId);
            })

            if (object_item.isDone) {
                liElement.classList.add("checked");
            }

            this.ulElement.appendChild(liElement);
        })
    }
}

// To Do List Main Program
const listSection = document.querySelector('#myUL');

myToDoList = new ToDo_Class(listSection);

document.querySelector(".addBtn").addEventListener("click", function() {
    myToDoList.add()
})