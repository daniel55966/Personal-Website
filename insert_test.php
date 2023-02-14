<?php
 ini_set('display_errors', '1');
 ini_set('display_startup_errors', '1');
 error_reporting(E_ALL);
    require_once "db_conn.php";

    $sql = "INSERT INTO da_newsletter_table SET name = 'Bob Bobson', email = 'email@email.com';";
    $conn->query($sql);

    $sql = "SELECT * FROM da_newsletter_table;";
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