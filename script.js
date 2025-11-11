// script.js

document.addEventListener("DOMContentLoaded", function () {
  const contactForm = document.getElementById("contact-form");
  const submitButton = document.getElementById("submit-btn");
  const spinner = document.getElementById("spinner");
  const statusMessage = document.getElementById("status-message");

  // Initialize EmailJS (replace with your EmailJS user ID)
  emailjs.init("M8PU3cVbgUdKou-h0");

  contactForm.addEventListener("submit", function (e) {
    e.preventDefault();

    // Hide previous messages
    statusMessage.textContent = "";
    statusMessage.className = "";

    // Show spinner and disable button
    spinner.style.display = "inline-block";
    submitButton.disabled = true;

    // Prepare the form data
    const formData = {
      name: contactForm.name.value,
      email: contactForm.email.value,
      contactBack: contactForm["contact-back"].value,
      comments: contactForm.comments.value,
    };

    // Send the email using EmailJS
    emailjs.send("service_nhu8yh5", "template_g1trs7h", formData).then(
      function (response) {
        spinner.style.display = "none";
        submitButton.disabled = false;
        statusMessage.textContent = "✅ Message sent successfully!";
        statusMessage.className = "text-success my-2";

        // Reset form
        contactForm.reset();
      },
      function (error) {
        spinner.style.display = "none";
        submitButton.disabled = false;
        statusMessage.textContent =
          "❌ Oops! Something went wrong. Please try again later.";
        statusMessage.className = "text-danger my-2";
        console.error("EmailJS error:", error);
      }
    );
  });
});

// Dice Roller Function
var parameter;
var randomNumber;

function clickEvent(diceNumber, dice) {
  var total = 0;
  try {
    if (diceNumber > 100) throw "too many dice";
  } catch (error) {
    alert("Too many dice, please keep between 1 and 100.");
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
  constructor(item) {
    this.ulElement = item;
  }

  add() {
    const todoInput = document.querySelector("#myInput").value;
    if (todoInput == "") {
      alert("You did not enter an item!");
    } else {
      const todoObject = {
        id: todoObjectList.length,
        todoText: todoInput,
        isDone: false,
      };

      todoObjectList.unshift(todoObject);
      this.display();
      document.querySelector("#myInput").value = "";
    }
  }

  done_undone(x) {
    const selectedTodoIndex = todoObjectList.findIndex((item) => item.id == x);
    console.log(todoObjectList[selectedTodoIndex].isDone);
    todoObjectList[selectedTodoIndex].isDone == false
      ? (todoObjectList[selectedTodoIndex].isDone = true)
      : (todoObjectList[selectedTodoIndex].isDone = false);
    this.display();
  }

  deleteElement(z) {
    const selectedDelIndex = todoObjectList.findIndex((item) => item.id == z);

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

      delBtn.addEventListener("click", function (e) {
        const deleteId = e.target.getAttribute("data-id");
        myToDoList.deleteElement(deleteId);
      });

      liElement.addEventListener("click", function (e) {
        const selectedId = e.target.getAttribute("data-id");
        myToDoList.done_undone(selectedId);
      });

      if (object_item.isDone) {
        liElement.classList.add("checked");
      }

      this.ulElement.appendChild(liElement);
    });
  }
}

// To Do List Main Program
const listSection = document.querySelector("#myUL");

myToDoList = new ToDo_Class(listSection);

document.querySelector(".addBtn").addEventListener("click", function () {
  myToDoList.add();
});

// Weather App functions
// Variables
const searchInput = document.querySelector("#searchInput");
searchButton = document.querySelector("#searchButton");
weatherIcon = document.querySelector("#weatherIcon");
windSpeed = document.querySelector("#windSpeed");
humidity = document.querySelector(".humidity");
weather = document.querySelector(".weather");
desc = document.querySelector(".desc");
API = "8cf5ac5621c8d0266298a149e49d7514";

// Weather Details
const setWeatherDetails = (data) => {
  desc.innerHTML = data.weather[0].description;
  weather.innerHTML = Math.round(data.main.temp - 273.15) + "°c";
  humidity.innerHTML = data.main.humidity + "%";
  windSpeed.innerHTML = data.wind.speed + "km/h";
  switch (data.weather[0].main) {
    case "Clouds":
      weatherIcon.src =
        "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.onlinewebfonts.com%2Fsvg%2Fimg_46485.png&f=1&nofb=1&ipt=c8909bf333b11e5bf52be2ed02af2e9f973978589538880ac7c771e38b0bd7f3&ipo=images";
      break;
    case "Clear":
      weatherIcon.src =
        "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.onlinewebfonts.com%2Fsvg%2Fimg_540148.png&f=1&nofb=1&ipt=13500cf99276c919117eb0b96335ac5711b22b7f55203986c7529db1b4e60f16&ipo=images";
      break;
    case "Rain":
      weatherIcon.src =
        "https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fcdn.onlinewebfonts.com%2Fsvg%2Fimg_411702.png&f=1&nofb=1&ipt=dfaa5bda7945d38f65b2c5f753fbea71d1095082456bceb39a0a7df50e489c99&ipo=images";
      break;
    case "Mist":
      weatherIcon.src =
        "https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fcdn.onlinewebfonts.com%2Fsvg%2Fimg_540402.png&f=1&nofb=1&ipt=47b219641f96d888ee081b8a3e197fb9476809a595a07a55b77e5b4bff34696d&ipo=images";
      break;
    case "Snow":
      weatherIcon.src =
        "https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fcdn.onlinewebfonts.com%2Fsvg%2Fimg_541730.png&f=1&nofb=1&ipt=8057e2ab8fb7dd9b7fd89730824f4e8dd2c80d06b90e784d384c5e30d278555d&ipo=images";
      break;
    case "Haze":
      weatherIcon.src =
        "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.onlinewebfonts.com%2Fsvg%2Fimg_354824.png&f=1&nofb=1&ipt=1fb6a2bce080e1c388a77a53f7e96580c1dcffd2f036f80edca34ee79d743600&ipo=images";
      break;
  }
};

// Call API
const callAPI = (id) => {
  fetch(
    `https://api.openweathermap.org/data/2.5/weather?q=${searchInput.value}&appid=${id}`
  )
    .then((response) => {
      // indicates whether the response is successful (status code 200-299) or not
      if (!response.ok) {
        alert("Check spelling of City and try again or Something Went Wrong!");
        throw new Error(`Request failed with status ${response.status}`);
      }
      return response.json();
    })
    .then((data) => {
      setWeatherDetails(data);
    })
    .catch((error) => console.log(error));
};

searchButton.addEventListener("click", (e) => {
  if (e.key === "Enter") {
    e.preventDefault();
    searchButton.click();
  }
});

searchButton.click();
// End Weather App

// Snake Game functions and variables
// Define HTML elements
const board = document.getElementById("game-board");
const instructionText = document.getElementById("instruction-text");
const logo = document.getElementById("logo");
const score = document.getElementById("score");
const highScoreText = document.getElementById("highScore");

// Define game variables
const gridSize = 20;
let snake = [{ x: 10, y: 10 }];
let food = generateFood();
let highScore = 0;
let direction = "right";
let gameInterval;
let gameSpeedDelay = 200;
let gameStarted = false;

// Draw game map, snake, food
function draw() {
  board.innerHTML = "";
  drawSnake();
  drawFood();
  updateScore();
}

// Draw snake
function drawSnake() {
  snake.forEach((segment) => {
    const snakeElement = createGameElement("div", "snake");
    setPosition(snakeElement, segment);
    board.appendChild(snakeElement);
  });
}

// Create a snake or food cube/div
function createGameElement(tag, className) {
  const element = document.createElement(tag);
  element.className = className;
  return element;
}

// Set the position of snake or food
function setPosition(element, position) {
  element.style.gridColumn = position.x;
  element.style.gridRow = position.y;
}

// Testing draw function
// draw();

// Draw food function
function drawFood() {
  if (gameStarted) {
    const foodElement = createGameElement("div", "food");
    setPosition(foodElement, food);
    board.appendChild(foodElement);
  }
}

// Generate food
function generateFood() {
  const x = Math.floor(Math.random() * gridSize) + 1;
  const y = Math.floor(Math.random() * gridSize) + 1;
  return { x, y };
}

// Moving the snake
function move() {
  const head = { ...snake[0] };
  switch (direction) {
    case "up":
      head.y--;
      break;
    case "down":
      head.y++;
      break;
    case "left":
      head.x--;
      break;
    case "right":
      head.x++;
      break;
  }

  snake.unshift(head);

  //   snake.pop();

  if (head.x === food.x && head.y === food.y) {
    food = generateFood();
    increaseSpeed();
    clearInterval(gameInterval); // Clear past interval
    gameInterval = setInterval(() => {
      move();
      checkCollision();
      draw();
    }, gameSpeedDelay);
  } else {
    snake.pop();
  }
}

// Test moving
// setInterval(() => {
//   move(); // Move first
//   draw(); // Then draw again new position
// }, 200);

// Start game function
function startGame() {
  gameStarted = true; // Keep track of a running game
  instructionText.style.display = "none";
  logo.style.display = "none";
  gameInterval = setInterval(() => {
    move();
    checkCollision();
    draw();
  }, gameSpeedDelay);
}

// Keypress event listener
function handleKeyPress(event) {
  if (
    (!gameStarted && event.code === "Space") ||
    (!gameStarted && event.key === " ")
  ) {
    startGame();
  } else {
    switch (event.key) {
      case "ArrowUp":
        direction = "up";
        break;
      case "ArrowDown":
        direction = "down";
        break;
      case "ArrowLeft":
        direction = "left";
        break;
      case "ArrowRight":
        direction = "right";
        break;
    }
  }
}

document.addEventListener("keydown", handleKeyPress);

function increaseSpeed() {
  //   console.log(gameSpeedDelay);
  if (gameSpeedDelay > 150) {
    gameSpeedDelay -= 5;
  } else if (gameSpeedDelay > 100) {
    gameSpeedDelay -= 3;
  } else if (gameSpeedDelay > 50) {
    gameSpeedDelay -= 2;
  } else if (gameSpeedDelay > 25) {
    gameSpeedDelay -= 1;
  }
}

function checkCollision() {
  const head = snake[0];

  if (head.x < 1 || head.x > gridSize || head.y < 1 || head.y > gridSize) {
    resetGame();
  }

  for (let i = 1; i < snake.length; i++) {
    if (head.x === snake[i].x && head.y === snake[i].y) {
      resetGame();
    }
  }
}

function resetGame() {
  updateHighScore();
  stopGame();
  snake = [{ x: 10, y: 10 }];
  food = generateFood();
  direction = "right";
  gameSpeedDelay = 200;
  updateScore();
}

function updateScore() {
  const currentScore = snake.length - 1;
  score.textContent = currentScore.toString().padStart(3, "0");
}

function stopGame() {
  clearInterval(gameInterval);
  gameStarted = false;
  instructionText.style.display = "block";
  logo.style.display = "block";
}

function updateHighScore() {
  const currentScore = snake.length - 1;
  if (currentScore > highScore) {
    highScore = currentScore;
    highScoreText.textContent = highScore.toString().padStart(3, "0");
  }
  highScoreText.style.display = "block";
}
