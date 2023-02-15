<?php
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
  error_reporting(E_ALL);

  if (!isset($_SESSION)) {
    session_start();
  }

  $answerErr = "";
  $question_numbers = $_POST['question_numbers'] ?? [];
  $answers = $_POST['answers'] ?? [];
  $formErr = false;

  // Clean and sanitize form inputs
  function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && !$formErr)  {  
    $hostname = "php-mysql-exercisedb.slccwebdev.com";
    $username = "phpmysqlexercise";
    $password = "mysqlexercise";
    $databasename = "php_mysql_exercisedb";

    /* echo "<pre>";
    var_dump($_POST);
    exit; */

    try {
    //Create new PDO Object
    $conn = new PDO("mysql:host=$hostname;dbname=$databasename", 
            $username, $password);

    //Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $user_id = time();

    foreach ($_POST['answers'] as $question_number => $answer) {
      //Variable containing SQL command
      $sql = "INSERT INTO da_survey_results (
          question_number,
          answer,
          user_id
      )
      
      VALUES (
          :question_number,
          :answer,
          :user_id
      );";

      //Create prepared statement
      $stmt = $conn->prepare($sql);

      //Initialize variables
      $question_number = cleanInput($question_number) + 1;
      $answer = cleanInput($answer);

      //Bind parameters to variables
      $stmt->bindParam(':question_number', $question_number, PDO::PARAM_STR);
      $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
      $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

      //Execute SQL Statement on server
      $stmt->execute();
   }

    //Create thank you message
    $_SESSION['message'] = '<p class="font-weight-bold">Thank you
    for your submission!</p><p class="font-weight-light">Your
    request has been sent.</p>';
    
    //Redirect
    //header('Location: ' . $_SERVER['REQUEST_URI']);
    //exit;

    } catch (PDOException $error) {
      
      //Return error code if one is created
      $_SESSION['message'] = '<p>We apologize, the form was not
      submitted successfully. Please try again later.</p>';

      $_SESSION['complete'] = true;
      var_dump($error);
      exit;

      //Redirect
      //header('Location: ' . $_SERVER['REQUEST_URI']);
      //exit;
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Customer Relationship Manager Survey Homepage</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>  
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </head>

  <body class="bg-light">
    <!-- Navbar -->
    <div class="topnav" id="myTopnav">
      <a class="active" href="/index.php">Home</a>
      <a href="/survey.php">Survey</a>
      <a href="/results.php">Results</a>
      <a href="/newsletter.php">Newsletter</a>
      <a href="/aboutus.php">About Us</a>
      <a href="https://www.linkedin.com" class="linkedin split"><i class="fa fa-linkedin"></i></a>
      <a href="https://www.twitter.com" class="twitter split"><i class="fa fa-twitter"></i></a>
      <a href="https://www.facebook.com" class="facebook split"><i class="fa fa-facebook"></i></a>
      <a href="javascript:void(0);" class="icon" onclick="navFunction()">
          <i class="fa fa-bars"></i>
      </a>
    </div>

      <section class="container survey-section">
        <div class="row align-items-center justify-content-center text-center">
          <h2 class="py-3">Coke vs Pepsi Comparison Survey</h2>
        </div>
      </section>
      <section class="survey-section container">
        <div class="row align-items-center justify-content-center text-left
        py-5">
        <div class="row col-5">
          <h4 class="fw-bold text-center mt-3"></h4>
            <form class=" bg-white px-4" action="survey.php" method="post">

              <?php 
              $questions = [
                [
                  'type' => 'coke-pepsi',
                  'question' => 'Which brand of cola do you prefer, Coke or Pepsi?',
                ],

                [
                  'type' => 'yes-no',
                  'question' => 'Have you ever tried both brands and switched from one to the other?',
                ],

                [
                  'type' => 'coke-pepsi',
                  'question' => 'Which brand do you think has the better advertisements?',
                ],

                [
                  'type' => 'coke-pepsi',
                  'question' => 'Which brand do you think is more affordable?',
                ],

                [
                  'type' => 'coke-pepsi',
                  'question' => 'Which brand do you associate more with special events or occasions?',
                ],

                [
                  'type' => 'yes-no',
                  'question' => 'Have you noticed a difference in the ingredients between Coke and Pepsi?',
                ],

                [
                  'type' => 'yes-no',
                  'question' => 'Have you tried any other cola brands besides Coke and Pepsi?',
                ],

                [
                  'type' => 'coke-pepsi',
                  'question' => 'Which brand do you think has a better overall reputation?',
                ],

                [
                  'type' => 'coke-pepsi',
                  'question' => 'Which brand do you think has a more unique taste?',
                ],

                [
                  'type' => 'coke-pepsi',
                  'question' => 'Which brand do you think has a more appealing packaging design?',
                ],
              ];

              function coke_radio_button($number) {
                echo '<div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="answers['.$number.']" id="coke" value="Coke" />
                        <label class="form-check-label" for="coke">
                          Coke
                        </label>
                      </div>';
              }

              function pepsi_radio_button($number) {
                echo '<div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="answers['.$number.']" id="pepsi" value="Pepsi" />
                        <label class="form-check-label" for="pepsi">
                          Pepsi
                        </label>
                      </div>';
              }
                          
              function yes_radio_button($number) {
                echo '<div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="answers['.$number.']" id="yes" value="Yes" />
                        <label class="form-check-label" for="yes">
                          Yes
                        </label>
                      </div>';
              }

              function no_radio_button($number) {
                echo '<div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="answers['.$number.']" id="no" value="No" />
                        <label class="form-check-label" for="no">
                          No
                        </label>
                      </div>';
              }
              
              foreach ($questions as $index => $question) {
                $question_number = $index;
                ?><!-- Question <?= $question_number ?> -->
                          <input type="hidden" name="question_numbers[]" value="<?= $question_number ?>">
                          <p class="fw-bold"><?= $question['question'] ?></p>
                          <?php if ($question['type'] == 'coke-pepsi') {
                            coke_radio_button($question_number);
                            pepsi_radio_button($question_number);
                          }
                          if ($question['type'] == 'yes-no') {
                            yes_radio_button($question_number);
                            no_radio_button($question_number);
                          } ?>            
                <hr class="my-4" /><?php
              }
              ?>

              <input type="submit" class="index-button" id="open-modal"></button>
              <div id="survey-modal" class="survey-modal">
                <div class="modal-content">
                  <span class="close">&times;</span>
                  <p>Thank you for submitting the survey!</p>
                </div>
              </div>
            </form>
            <div class="text-end">
            </div> 

          </div>        
        </div>
    </section>

    <footer class="py-4 bg-dark mt-auto">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Company 2023</p>
      </div>
    </footer>
  </body>
</html>
