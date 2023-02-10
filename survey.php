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
    <header>
        <div class="topnav" id="myTopnav">
            <a class="active" href="/index.html">Home</a>
            <a href="/survey.php">Survey</a>
            <a href="/results.php">Results</a>
            <a href="/newsletter.php">Newsletter</a>
            <a href="/aboutus.html">About Us</a>
            <a href="javascript:void(0);" class="icon" onclick="navFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
      </header>

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
            <form class=" bg-white px-4" action="results.php">
              <p class="fw-bold">Which brand of cola do you prefer, Coke or Pepsi?</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question1" id="coke" value="Coke" />
                <label class="form-check-label" for="coke">
                  Coke
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question1" id="pepsi" value="Pepsi" />
                <label class="form-check-label" for="pepsi">
                  Pepsi
                </label>                
                <hr class="my-4" />
              </div>

              <p class="fw-bold">Have you ever tried both brands and switched from one to the other?</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question2" id="yes" value="Yes" />
                <label class="form-check-label" for="yes">
                  Yes
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question2" id="no" value="No" />
                <label class="form-check-label" for="no">
                  No
                </label>                
                <hr class="my-4" />
              </div>

              <p class="fw-bold">Which brand do you think has the better advertisements?</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question3" id="coke" value="Coke" />
                <label class="form-check-label" for="coke">
                  Coke
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question3" id="pepsi" value="Pepsi" />
                <label class="form-check-label" for="pepsi">
                  Pepsi
                </label>                
                <hr class="my-4" />
              </div>

              <p class="fw-bold">Which brand do you think is more affordable?</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question4" id="coke" value="Coke" />
                <label class="form-check-label" for="coke">
                  Coke
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question4" id="pepsi" value="Pepsi" />
                <label class="form-check-label" for="pepsi">
                  Pepsi
                </label>                
                <hr class="my-4" />
              </div>

              <p class="fw-bold">Which brand do you associate more with special events or occasions?</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question5" id="coke" value="Coke" />
                <label class="form-check-label" for="coke">
                  Coke
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question5" id="pepsi" value="Pepsi" />
                <label class="form-check-label" for="pepsi">
                  Pepsi
                </label>                
                <hr class="my-4" />
              </div>

              <p class="fw-bold">Have you noticed a difference in the ingredients between Coke and Pepsi?</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question6" id="yes" value="Yes" />
                <label class="form-check-label" for="yes">
                  Yes
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question6" id="no" value="No" />
                <label class="form-check-label" for="no">
                  No
                </label>                
                <hr class="my-4" />
              </div>

              <p class="fw-bold">Have you tried any other cola brands besides Coke and Pepsi?</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question7" id="yes" value="Yes" />
                <label class="form-check-label" for="yes">
                  Yes
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question7" id="no" value="No" />
                <label class="form-check-label" for="no">
                  No
                </label>                
                <hr class="my-4" />
              </div>

              <p class="fw-bold">Which brand do you think has a better overall reputation?</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question8" id="coke" value="Coke" />
                <label class="form-check-label" for="coke">
                  Coke
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question8" id="pepsi" value="Pepsi" />
                <label class="form-check-label" for="pepsi">
                  Pepsi
                </label>                
                <hr class="my-4" />
              </div>

              <p class="fw-bold">Which brand do you think has a more unique taste?</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question9" id="coke" value="Coke" />
                <label class="form-check-label" for="coke">
                  Coke
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question9" id="pepsi" value="Pepsi" />
                <label class="form-check-label" for="pepsi">
                  Pepsi
                </label>                
                <hr class="my-4" />
              </div>

              <p class="fw-bold">Which brand do you think has a more appealing packaging design?</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question9" id="coke" value="Coke" />
                <label class="form-check-label" for="coke">
                  Coke
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="question9" id="pepsi" value="Pepsi" />
                <label class="form-check-label" for="pepsi">
                  Pepsi
                </label>                
                <hr class="my-4" />
              </div>
              <button type="button" class="index-button">Submit</button>
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
