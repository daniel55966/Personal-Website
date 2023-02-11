<?php
// Check if table exists
$table_check = mysqli_query($conn, "SHOW TABLES LIKE 'da_survey_results'");
if (mysqli_num_rows($table_check) == 0) {
  // Create table
    $sql = "CREATE TABLE da_survey_results (
        id INT AUTO_INCREMENT PRIMARY KEY,
        question_number INT NOT NULL,
        answer VARCHAR(30) NOT NULL
      )";

      if (mysqli_query($conn, $sql)) {
        echo "Table da_survey_results created successfully";
      } else {
        echo "Error creating table: " . mysqli_error($conn);
      }
    } else {
      // Table exists already
      echo "Table da_survey_results already exists";
    }

  mysqli_close($conn);

?>