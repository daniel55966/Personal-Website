<?php 
  if (!isset($_SESSION)) {
    session_start();
  }

  $nameErr = $emailErr = "";
  $name = $email = $comment = "";
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

    $comment = cleanInput($_POST["comments"]);
  }

  //Clean and sanitize form inputs
  function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if (($_SERVER["REQUEST_METHOD"] == "POST") && (!($formErr)))  {  
    $hostname = "php-mysql-exercisedb.slccwebdev.com";
    $username = "phpmysqlexercise";
    $password = "mysqlexercise";
    $databasename = "php_mysql_exercisedb";

    try {
    //Create new PDO Object
    $conn = new PDO("mysql:host=$hostname;dbname=$databasename", 
            $username, $password);

    //Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Variable containing SQL command
    $sql = "INSERT INTO da_newsletter_table (
        name,
        email,
        comments
    )
    
    VALUES (
        :name,
        :email,
        :comments   
    );";

    //Create prepared statement
    $stmt = $conn->prepare($sql);

    //Bind parameters to variables
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Customer Relationship Manager Survey Newsletter Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </head>

  <body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
      <div class="container-fluid">
        <a href="/index.php" class="navbar-brand"><img class="img-responsive" src="/Images/slanalyticsmountain.png" alt="Salt Lake Analytics Logo" height="65"></a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav">
            <a href="/index.php" class="nav-item nav-link">Home</a>
            <a href="/survey.php" class="nav-item nav-link">Survey</a>
            <a href="/results.php" class="nav-item nav-link">Results</a>
            <a href="/aboutus.php" class="nav-item nav-link">About Us</a>
            <a href="/newsletter.php" class="nav-item nav-link active">Newsletter</a>          
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <section class="newsletter" id="newsletter">
      <div class="container py-5">
        <!-- Section Title -->
        <div class="row justify-content-center text-center">
          <div class="col md-6">
            <h2 class="display-4 font-weight-bold">Sign up for our weekly newsletter!</h2><br>
            <p>Want updates to when our next survey will happen? Would you like to know about some of our methods in using your data? 
              Sign up for our weekly newsletter here!
            </p>
            <hr />
          </div>
        </div>
        <!-- Newsletter Signup Form -->
        <div class="row justify-content-center">
          <div class="col-6">
            <!-- Form Start --> 
            <form action<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="POST" novalidate>

              <!-- Name Field -->
						<div class="form-group">
							<label for="name">Full Name:</label>
              <span class="text-danger">*<?php echo $nameErr; ?></span>
							<input type="text" class="form-control" id="name" placeholder="Full Name" name="name"
              value="<?php if (isset($name)) {echo $name;} ?>" />
						</div>
						
						<!-- Email Field -->
						<div class="form-group">
							<label for="email">Email address:</label>
              <span class="text-danger">*<?php echo $emailErr; ?></span>
							<input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" 
              value="<?php if (isset($email)) {echo $email;} ?>"/>
						</div>

            <!-- Comments Field -->
						<div class="form-group">
							<label for="comments">Comments:</label>
							<textarea id="comments" class="form-control" rows="3" name="comments">
              <?php if (isset($comment)) {echo $comment;} ?></textarea><br>
						</div>

            <!-- Required Fields Note -->
            <div class="text-danger text-right">* Indicates Required Fields</div><br>

            <!-- Submit Button -->
            <button class="btn btn-success" type="submit" role="button" name="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <div class="footer-dark">
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-3 item">
            <h3>Services</h3>
            <ul>
              <li><a href="/survey.php">Surveys</a></li>
              <li><a href="/results.php">Analytics</a></li>
            </ul>
            </div>
            <div class="col-sm-6 col-md-3 item">
              <h3>About</h3>
              <ul>
                <li><a href="/aboutus.php">Company</a></li>
                <li><a href="/aboutus.php">Team</a></li>
              </ul>
            </div>
            <div class="col-md-6 item text">
              <h3>Salt Lake Analytics</h3>
              <p>We aim to connect our customers with the products and services they deserve.</p>
            </div>
            <div class="col item social">
              <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
              <a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
              <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
              <a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
          <p class="copyright">Salt Lake Analytics &copy; 2023</p>
        </div>
      </footer>
    </div>
  </body>
</html>