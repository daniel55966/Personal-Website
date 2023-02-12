<?php
 ini_set('display_errors', '1');
 ini_set('display_startup_errors', '1');
 error_reporting(E_ALL);
    require_once "db_conn.php";

    $sql = "INSERT INTO da_survey_results SET question_number = '1', answer = 'foobar';";
    $conn->query($sql);

    $sql = "SELECT * FROM da_survey_results;";
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