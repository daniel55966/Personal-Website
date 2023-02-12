<?php
require_once "db_conn.php";

$sql = "SELECT * FROM da_survey_results";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $results = array();
  while($row = $result->fetch_assoc()) {
    $results[] = $row;
  }
} else {
  echo "0 results";
}

echo "<pre>";
var_dump($results);
?>