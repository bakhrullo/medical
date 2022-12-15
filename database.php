<?php
  $ini = parse_ini_file('settings.ini');

  $servername = "localhost";
  $username = $ini['db_user'];
  $password = $ini['db_pass'];
  $dbname = $ini['db_name'];

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>
