<?php
require_once "db_conn.php";
$sql = "TRUNCATE TABLE da_survey_results";
$conn->query($sql);
?>