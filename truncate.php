<?php
require_once "db_conn.php";
$sql = "TRUNCATE TABLE da_newsletter_table";
$conn->query($sql);
?>