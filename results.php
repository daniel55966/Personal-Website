
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Customer Relationship Manager Survey Results Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script>
      $(document).ready(function() {
        $("#passwordModal").modal("show");

        $("#submitButton").click(function() {
          var username = $("#username").val();
          var password = $("#password").val();

          // Check if the entered username and password match the correct credentials
          if (username === "admin" && password === "secret") {
            $("#passwordModal").modal("hide");
            // Show the protected content
          } else {
            alert("Incorrect username or password. Please try again.");
          }
        });
      });
    </script>
  </head>

  <body>
    <div class="modal" id="passwordModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Enter your username and password</h5>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username">
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="index-button" id="submitButton">Submit</button>
          </div>
        </div>
      </div>
    </div>

    <div class="topnav" id="myTopnav">
        <a href="/index.html">Home</a>
        <a href="/survey.html">Survey</a>
        <a class="active" href="/results.php">Results</a>
        <a href="/newsletter.php">Newsletter</a>
        <a href="/aboutus.html">About Us</a>
        <a href="javascript:void(0);" class="icon" onclick="navFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
  </body>
</html>