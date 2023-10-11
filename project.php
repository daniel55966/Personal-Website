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
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
      <div class="container-fluid">
        <a href="/index.php" class="navbar-brand"><img class="img-responsive" src="/Images/slanalyticsmountain.png" alt="Salt Lake Analytics Logo" height="65"></a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav">
            <a href="/index.php" class="nav-item nav-link active">Home</a>
            <a href="/survey.php" class="nav-item nav-link">Survey</a>
            <a href="/results.php" class="nav-item nav-link">Results</a>
            <a href="/aboutus.php" class="nav-item nav-link">About Us</a>
            <a href="/newsletter.php" class="nav-item nav-link">Newsletter</a>          
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <div class="container-fluid pt-5 intro">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-lg-8">
          <h2 class="display-2 font-weight-bold">Are you interested in finding new and interesting products?</h1>
          <hr class="my-5" />
          <p class="font-weight-light">This website was built as my final project for the Web Development Certificate program 
            at Salt Lake Community College. I was tasked to build a survey site for a fake analytics company using HTML, CSS, 
            Bootstrap, Javascript, PHP, and MySQL. The company logo and name are my creations and have nothing to do with any known 
            businesses. The repository for this project is available for sharing upon request. Below is how I've introduced the website 
            to a potential customer, and the links in the navbar and throughout the home page go to the rest of the site. To access the 
            table on the results page, the username is 'admin' and the password is 'secret'.
          </p><br>
          <p>The Survey and Results pages do function properly. However, because this project was done for school, the database is currently
            only functional on their hosting server, not the personal one this site's currently on. Fully functional versions of the survey page 
            can be found <a href="http://www.danielanderson.slccwebdev.com/survey.php">here</a> and the results page can be found 
            <a href="http://www.danielanderson.slccwebdev.com/results.php">here</a>.
          </p><br>
          <p class="font-weight-light">Here at Salt Lake Analytics, we aim to match <i>you</i> with products that match your interests. 
            Take one of our surveys so we can match you with something you may be missing in your life! 
            This week's survey compares a rivalry that has existed since the 1970s: Coca-Cola vs Pepsi.
          </p>
          <a href="/survey.php" class="btn btn-primary" role="button">Take Survey</a><hr class="my-3" />
        </div>
      </div>
    </div><br><br><br><br><br><br><br>

    <div class="container">
      <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade my-5 py-5" data-bs-ride="carousel" data-bs-interval="7500">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/Images/kajetan-sumila-61FWNkexYVc-unsplash.jpg" class="d-block w-100 rounded img-fluid" alt="Typing on laptop">
          </div>
          <div class="carousel-item">
            <img src="/Images/anton-savinov-KOl7hA0nbos-unsplash.jpg" class="d-block w-100 rounded img-fluid" alt="Man working on a tool rack in a garage">
          </div>
          <div class="carousel-item">
            <img src="/Images/phong-ph-m-6Lggcebsp84-unsplash.jpg" class="d-block w-100 rounded img-fluid" alt="Man working on a laptop">
          </div>
        </div>
      </div>
    </div>

      <div class="container p-5 my-5 border">
        <div class="row align-items-center justify-content-center text-center h-100">
          <div class="col-lg-6 my-3">
            <h3 class="font-weight-bold">Little Bit About Us</h3>
            <p class="font-weight-light">We offer surveys to our customers so they can discover new products that suit their interests. Learn more here!</p>
            <a href="/aboutus.php" class="btn btn-secondary" role="button">About Us</a>
          </div>
        </div>
      </div>

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