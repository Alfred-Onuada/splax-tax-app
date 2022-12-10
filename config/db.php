<?php

  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $dbName = 'splax-tax';

  $connection = mysqli_connect($host, $user, $pass, $dbName);

  if (!$connection) {
    die("Database connection failed".mysqli_connect_error());
  }
?>