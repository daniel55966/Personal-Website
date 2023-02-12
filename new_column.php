<?php

require_once "db_conn.php";

$sql = "ALTER TABLE da_survey_results
RENAME COLUMN name TO user_id;";
$conn->query($sql);

?>