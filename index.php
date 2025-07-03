<?php
if (!isset($_SESSION)) {
  session_start();
}

$nameErr = $emailErr = $contBackErr = "";
$name = $email = $contBack = $comment = "";
$formErr = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $nameErr = "Name is required.";
    $formErr = true;
  } else {
    $name = cleanInput($_POST["name"]);
    //Use REGEX to only accept letters and spaces
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameErr = "Only letters and standard spaces allowed.";
      $formErr = true;
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required.";
    $formErr = true;
  } else {
    $email = cleanInput($_POST["email"]);
    //Check if email is formatted correctly
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Please enter a valid email address.";
      $formErr = true;
    }
  }

  if (empty($_POST["contact-back"])) {
    $contBackErr = "Please let us know if we can contact you back.";
    $formErr = true;
  } else {
    $contBack = cleanInput($_POST["contact-back"]);
  }

  $comment = cleanInput($_POST["comments"]);
}

//Clean and sanitize form inputs
function cleanInput($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && (!($formErr))) {
  $hostname = "php-mysql-exercisedb.slccwebdev.com";
  $username = "phpmysqlexercise";
  $password = "mysqlexercise";
  $databasename = "php_mysql_exercisedb";

  try {
    //Create new PDO Object
    $conn = new PDO(
      "mysql:host=$hostname;dbname=$databasename",
      $username,
      $password
    );

    //Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Variable containing SQL command
    $sql = "INSERT INTO da_fa2022_Contacts (
        name,
        email,
        contactBack,
        comments
    )
    
    VALUES (
        :name,
        :email,
        :contactBack,
        :comments   
    );";

    //Create prepared statement
    $stmt = $conn->prepare($sql);

    //Bind parameters to variables
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':contactBack', $contBack, PDO::PARAM_STR);
    $stmt->bindParam(':comments', $comments, PDO::PARAM_STR);

    //Execute SQL Statement on server
    $stmt->execute();

    //Create thank you message
    $_SESSION['message'] = '<p class="font-weight-bold">Thank you
    for your submission!</p><p class="font-weight-light">Your
    request has been sent.</p>';

    //Redirect
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
  } catch (PDOException $error) {

    //Return error code if one is created
    $_SESSION['message'] = '<p>We apologize, the form was not
      submitted successfully. Please try again later.</p>';

    $_SESSION['complete'] = true;

    //Redirect
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
  }

  $conn = null;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title>Personal Website</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</head>

<body>
  <header class="mainHeader" id="home">
    <div class="container-fluid h-100">
      <div class="row h-100 align-items-center justify-content-center text-center text-white">
        <div class="col-lg-8">
          <h1 class="display-1 font-weight-bold">Daniel Anderson</span></h1>
          <hr class="bg-white my-5" />
          <p class="font-weight-light mx-5">I am an aspiring Junior Web Developer with experience in HTML5,
            CSS3/Bootstrap, Javascript, PHP, MySQL, C#, and React. I also have experience with UX/UI design, using programs
            such as Figma, PhotoShop, and Trello. I can work hard and am willing to learn new skills in my free time.
          </p>
          <a href="#portfolio" class="btn btn-primary btn-large mt-3" role="button">Portfolio</a>
          <a href="#contact" class="btn btn-primary btn-large mt-3" role="button">Contact Me</a>
          <a href="./Resume.pdf" class="btn btn-primary btn-large mt-3" role="button" target="_blank">Résumé</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Portfolio -->
  <section id="portfolio" class="bg-primary">
    <div class="container-fluid py-5">
      <!-- Portfolio Section Title -->
      <div class="row text-white text-center">
        <div class="col">
          <h2 class="display-4 font-weight-bold">Portfolio</h2>
          <hr class="bg-white mb-5" />
        </div>
      </div>
      <!-- Portfolio Items Row Start-->
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Survey Website</h3>
              <hr class="bg-primary" />
              <p class="card-text">A survey website built to show my skills in HTML,
                CSS, Javascript, PHP, and MySQL.
              </p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="/project.php" target="_blank">Survey Website</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">TTRPG Dice Roller</h3>
              <hr class="bg-primary" />
              <p class="card-text">A Dice Roller for Dungeons & Dragons
                I coded and designed. It lets you roll an inputted number of a specific
                dice that are used in most TTRPG rulesets, adds them together then outputs
                the total.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="/dndroller.html" target="_blank">Dice Roller</a>
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://daniel55966.github.io/Dice-Roller-React" target="_blank">React Version</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Tic-Tac-Toe</h3>
              <hr class="bg-primary" />
              <p class="card-text">A version of Tic-Tac-Toe that outputs whether a player
                wins a round and which player or if the round ends in a tie.
              </p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="/tictactoe.html" target="_blank">Tic-Tac-Toe</a>
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://codesandbox.io/p/sandbox/react-dev-forked-k636jw?file=%2Fsrc%2FApp.js" target="_blank">React Version</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">UX/UI Design</h3>
              <hr class="bg-primary" />
              <p class="card-text">A design for a Mental Health Outreach app created by my team for the final project of our UX/UI Development Certificate Program.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://www.figma.com/file/XIFStCaTBs5NG7316R34xh/Help!-APP?type=design&node-id=0%3A1&mode=design&t=0wooxs9LrKTRFLoW-1" target="_blank">HELP! App Design</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Calculator</h3>
              <hr class="bg-primary" />
              <p class="card-text">A simple 10-digit calculator.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="/calculator.html" target="_blank">Calculator</a>
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://github.com/daniel55966/Calculator-React/tree/master/src" target="_blank">React Version Source Code</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">To Do List</h3>
              <hr class="bg-primary" />
              <p class="card-text">A simple to-do list built in React, where tasks can be added and deleted when completed. UPDATE: As of 6/4/2024, I've built a fullstack to-do list using Golang, React, ChakraUI, TypeScript, MongoDB, and TanStack.
              </p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://github.com/daniel55966/To-Do-List-React" target="_blank">To-Do List</a>
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://react-go-tutorial-production-02af.up.railway.app/" target="_blank">Full Stack Version</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Snake Game</h3>
              <hr class="bg-primary" />
              <p class="card-text">A version of the classic game Snake.
              </p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="snake/snake.html" target="_blank">Snake Game</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Guess The Number Game</h3>
              <hr class="bg-primary" />
              <p class="card-text">A simple Guess The Number game built in React.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://daniel55966.github.io/Guess-Number/" target="_blank">Guess The Number</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">MovieLand</h3>
              <hr class="bg-primary" />
              <p class="card-text">A simple film app with search functionality and basic information about a wide variety of movies
                pulled from the Open Movie Database API using React.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://daniel55966.github.io/film-app" target="_blank">MovieLand</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">20 Simple React Projects</h3>
              <hr class="bg-primary" />
              <p class="card-text">20 Simple React Projects, each in their own section
                and labeled on the page.
              </p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://daniel55966.github.io/20-Simple-React-Projects/" target="_blank">20 Simple React Projects</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Weather App</h3>
              <hr class="bg-primary" />
              <p class="card-text">A simple weather app built using React.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://daniel55966.github.io/weather-react" target="_blank">Weather App</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Recipe App</h3>
              <hr class="bg-primary" />
              <p class="card-text">A simple recipe app built using React and TailwindCSS.
                Note: Recipes don't include directions, only ingredients and their quantity for now.
              </p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://daniel55966.github.io/recipe-list/" target="_blank">Recipe App</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Shopping Cart App</h3>
              <hr class="bg-primary" />
              <p class="card-text">A Shopping Cart App built using React, Redux, and TailwindCSS.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://daniel55966.github.io/shopping-cart-app/" target="_blank">Shopping Cart App</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Expense Tracker</h3>
              <hr class="bg-primary" />
              <p class="card-text">A simple Expense Tracker built using React and Chakra UI.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://daniel55966.github.io/expense-tracker/" target="_blank">Expense Tracker</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Gorillas Game</h3>
              <hr class="bg-primary" />
              <p class="card-text">An updated version of the classic game Gorillas built using Javascript.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="Gorillas-Game/gorillas.html" target="_blank">Gorillas Game</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Chess</h3>
              <hr class="bg-primary" />
              <p class="card-text">A game of chess built using React and the Chess.js and Chessboard.js libraries.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://daniel55966.github.io/chess-game/" target="_blank">Chess</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Tetris</h3>
              <hr class="bg-primary" />
              <p class="card-text">A version of Tetris built using React and Typescript.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://daniel55966.github.io/React-Tetris/" target="_blank">Tetris</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Sticky Notes</h3>
              <hr class="bg-primary" />
              <p class="card-text">A Sticky Notes App built using React and Appwrite.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://daniel55966.github.io/sticky-notes-app/" target="_blank">Sticky Notes</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Sonic Ring Run</h3>
              <hr class="bg-primary" />
              <p class="card-text">An Infinite Run Sonic the Hedgehog fan game built using JavaScript and the Kaplay JS library.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://daniel55966.github.io/sonic-runner-game/" target="_blank">Sonic Ring Run</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Kaplay with React Concept</h3>
              <hr class="bg-primary" />
              <p class="card-text">A simple game built using the Kaplay JS library, React, and Jotai where you control a character on a single screen. Approach the NPC from different directions to have him share different messages with you. Press spacebar to close the dialog box after.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://kaplay-react-tutorial.vercel.app/" target="_blank">Kaplay with React Concept</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Polyrhythm Example</h3>
              <hr class="bg-primary" />
              <p class="card-text">A simple project showing how Polyrhythmic patterns can be created using several JavaScript math functions.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="Polyrhythms/index.html" target="_blank">Polyrhythm</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Memory Match Game</h3>
              <hr class="bg-primary" />
              <p class="card-text">A Match Two game built using React focusing on Accessibility concepts</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://memory-game-eight-rosy.vercel.app/" target="_blank">Memory Match Game</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Crossy Road Clone</h3>
              <hr class="bg-primary" />
              <p class="card-text">A Crossy Road clone built using Three.js. A React version that is functionally equivalent was also made.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://my-crossy-road-game.vercel.app/" target="_blank">Crossy Road</a>
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://my-crossy-road-game-react.vercel.app/" target="_blank">React Version</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Simple Chat App</h3>
              <hr class="bg-primary" />
              <p class="card-text">A simple chat app built using React and Firebase.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://chat-app-gray-chi-17.vercel.app/" target="_blank">Chat App</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Simple Dynamic Wardrobe</h3>
              <hr class="bg-primary" />
              <p class="card-text">A simple dynamic wardrobe app built using React and TailwindCSS.</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://dynamic-wardrobe.vercel.app/" target="_blank">Dynamic Wardrobe App</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Redux Toolkit Movie App</h3>
              <hr class="bg-primary" />
              <p class="card-text">A simple movie app built using React with Redux Toolkit and RTK Query</p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://redux-toolkit-tutorial-zeta.vercel.app/" target="_blank">Redux Movie App</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

        <!-- Portfolio Item -->
        <div class="col mb-4">
          <div class="card bg-light text-center border-light shadow h-100">
            <div class="card-body">
              <h3 class="card-title">Redux Toolkit Movie App</h3>
              <hr class="bg-primary" />
              <p class="card-text">A Calendly clone built using React, Typescript, Next.js, and TailwindCSS with Google Calendar functionality. Note: The code works in development perfectly, unfortunately I cannot publish the app to Google directly at this time. </p>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-primary btn-lg mt-2" role="button" href="https://calendra-app-k28e.vercel.app/" target="_blank">Calendly Clone: Calendra</a>
            </div>
          </div>
        </div>
        <!-- Portfolio Item End -->

      </div>
    </div><br>

  </section>

  <!-- Contact Form Section -->
  <section class="contactMe" id="contact">
    <div class="container py-5">
      <!-- Section Title -->
      <div class="row justify-content-center text-center">
        <div class="col-md-6">
          <h2 class="display-4 font-weight-bold">Contact Me</h2>
          <hr />
        </div>
      </div>
      <!-- Contact Form Row -->
      <div class="row justify-content-center">
        <div class="col-6">
          <!-- Contact Form Start -->
          <form action="mailto:daniel55966@gmail.com" method="get" enctype="application/x-www-form-urlencoded">

            <!-- Name Field -->
            <div class="form-group">
              <label for="name">Full Name:</label>
              <span class="text-danger">*<?php echo $nameErr; ?></span>
              <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" value="<?php if (isset($name)) {
                                                                                                              echo $name;
                                                                                                            } ?>" />
            </div>

            <!-- Email Field -->
            <div class="form-group">
              <label for="email">Email address:</label>
              <span class="text-danger">*<?php echo $emailErr; ?></span>
              <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?php if (isset($email)) {
                                                                                                                        echo $email;
                                                                                                                      } ?>" />
            </div>

            <!-- Radio Button Field -->
            <div class="form-group">
              <label class="control-label">Can we contact you back?</label>
              <span class="text-danger">*<?php echo $contBackErr; ?></span>
              <div class="form-check">
                <input type="radio" class="form-check-input" name="contact-back" id="yes" value="Yes" <?php if ((isset($contBack)) && ($contBack == "Yes")) {
                                                                                                        echo "checked";
                                                                                                      } ?> />
                <label class="form-check-label" for="yes">Yes</label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" name="contact-back" id="no" value="No" <?php if ((isset($contBack)) && ($contBack == "No")) {
                                                                                                      echo "checked";
                                                                                                    } ?> />
                <label class="form-check-label" for="no">No</label>
              </div>
            </div>

            <!-- Comments Field -->
            <div class="form-group">
              <label for="comments">Comments:</label>
              <textarea id="comments" class="form-control" rows="3" name="comments">
              <?php if (isset($comment)) {
                echo $comment;
              } ?></textarea>
            </div>

            <!-- Required Fields Note -->
            <div class="text-danger text-right">* Indicates required fields</div>

            <!-- Submit Button -->
            <button class="btn btn-primary mb-2" type="submit" role="button" name="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="thankYouModal" tabindex="-1" aria-labelledby="thankYouModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="thankYouModalLabel">Thank You</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php echo $_SESSION['message']; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Show Modal -->
  <?php
  if (isset($_SESSION['complete']) && $_SESSION['complete']) {
    echo "<script>$('#thankYouModal').modal('show');</script>";
    session_unset();
  }
  ?>

  <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/daniel-anderson-b8315b249/" target="_blank" role="button"><i class="fa fa-linkedin" aria-hidden="true"></i></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/daniel55966" target="_blank" role="button"><i class="fa fa-github" aria-hidden="true"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2025 Copyright:
      <a class="text-white">Daniel Anderson</a>
    </div>
    <!-- Copyright -->
  </footer>

</body>

</html>