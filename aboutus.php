<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Customer Relationship Manager Survey About Us Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </head>

  <body>
    <div class="topnav" id="myTopnav">
        <a href="/index.php">Home</a>
        <a href="/survey.php">Survey</a>
        <a href="/results.php">Results</a>
        <a href="/newsletter.php">Newsletter</a>
        <a class="active" href="/aboutus.php">About Us</a>
        <a href="javascript:void(0);" class="icon" onclick="navFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="about-section text-center intro">
      <h1>About Us</h1>
      <p>This is some text about us.</p>
    </div>

    <!-- Employee Cards -->
    <section class="our-team container-fluid">
      <h2 class="text-center">Our Team</h2>
      <hr class="my-5">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <div class="col">
          <div class="card">
            <img class="card-img-top" src="/Images/me2.PNG" style="width: 50%; height: 50%;" alt="filler image">
            <div class="card-body">
              <h2 style="color: black;">Bob Jones</h2>
              <p class="title" style="color: grey;">CEO</p>
              <p style="color: black;">Some text here.</p>
              <p style="color: black;">bob@example.com</p>
              <p><button class="index-button">Contact</button></p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img class="card-img-top" src="/Images/GemSlime.PNG" style="width: 50%; height: 50%;" alt="filler image">
            <div class="about-us-container">
              <h2 style="color: black;">James Jameson</h2>
              <p class="title" style="color: grey;">VP of Analytics</p>
              <p style="color: black;">Some text here.</p>
              <p style="color: black;">james@example.com</p>
              <p><button class="index-button">Contact</button></p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img class="card-img-top" src="/Images/Pappy.PNG" style="width: 50%; height: 50%" alt="filler image">
            <div class="about-us-container">
              <h2 style="color: black;">Steve Adams</h2>
              <p class="title" style="color: grey;">VP of Surveys</p>
              <p style="color: black;">Some text here.</p>
              <p style="color: black;">steve@example.com</p>
              <p><button class="index-button">Contact</button></p>
            </div>
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