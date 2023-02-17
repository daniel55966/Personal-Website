<?php
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
  error_reporting(E_ALL);

  require_once "db_conn.php";

  $sql = "SELECT question_number,
          SUM(CASE WHEN answer = 'Coke' THEN 1 ELSE 0 END) AS 'Coke',
          SUM(CASE WHEN answer = 'Pepsi' THEN 1 ELSE 0 END) AS 'Pepsi',
          SUM(CASE WHEN answer = 'Yes' THEN 1 ELSE 0 END) AS 'Yes',
          SUM(CASE WHEN answer = 'No' THEN 1 ELSE 0 END) AS 'No'
        FROM da_survey_results
        GROUP BY question_number";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $results = array();
    while($row = $result->fetch_assoc()) {
      $results[] = $row;
    }
  } else {
    echo "0 results";
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

    <!-- Pagination Scrips -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Initialize Datatables Pagination --> 
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
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

    <!-- Navbar -->
    <div class="topnav" id="myTopnav">
      <a class="active" href="/index.php">Home</a>
      <a href="/survey.php">Survey</a>
      <a href="/results.php">Results</a>
      <a href="/newsletter.php">Newsletter</a>
      <a href="/aboutus.php">About Us</a>
      <a href="javascript:void(0);" class="icon" onclick="navFunction()">
          <i class="fa fa-bars"></i>
      </a>
    </div>

    <section id="table">
      <div class="container py-5">
        <div class="row">
          <div class="col">
            <h2>Survey Results</h2>
            <hr />
            <!-- Table -->
            <table class="table" id="dataTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Question Number</th>
                  <th>Answer</th>
                  <th>User ID</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM da_survey_results";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['question_number'] . "</td>";
                  echo "<td>" . $row['answer'] . "</td>";
                  echo "<td>" . $row['user_id'] ?? '' . "</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

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
              <h3>Company Name</h3>
              <p>Some text about our company here.</p>
            </div>
            <div class="col item social">
              <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
              <a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
              <a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
          <p class="copyright">Company Name &copy; 2023</p>
        </div>
      </footer>
    </div>
  </body>
</html>