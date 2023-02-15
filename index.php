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

  <!-- Navbar -->
  <body class="bg-light">
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

    <div class="container-fluid pt-5 intro">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-lg-8">
          <h2 class="display-2 font-weight-bold">Ever wonder what people are thinking?</h1>
          <hr class="my-5" />
          <p class="font-weight-light">Let's find out, shall we? Take our survey about Coke vs Pepsi 
          so we can find out how cool you are (Hint: You're cool regardless).</p>
          <a href="/survey.php" class="button index-button" role="button">Take Survey</a>
        </div>
      </div>
    </div>

    <section class="aboutUs" id="about">
      <div class="container p-5 my-5 border">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-lg-6 my-3">
            <h3 class="font-weight-bold">Little Bit About Us</h3>
            <p class="font-weight-light">We take survey data and use MAGIC on it to know stuff. Learn more here!</p>
            <a href="/aboutus.php" class="button index-button" role="button">About Us</a>
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