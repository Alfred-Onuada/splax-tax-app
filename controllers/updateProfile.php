<?php

  // import the connection
  require_once "./../config/db.php";
  require_once "./../utils/customExit.php";

  // parse the post request
  $rawPostData = file_get_contents("php://input");
  $postData = json_decode($rawPostData, true);

  // get data
  $firstName = isset($postData['firstName']) ? $postData['firstName'] : '';
  $lastName = isset($postData['lastName']) ? $postData['lastName'] : '';
  $income = isset($postData['income']) ? $postData['income'] : '';
  $password = isset($postData['password']) ? $postData['password'] : '';
  $email = isset($_COOKIE['tax_user']) ? $_COOKIE['tax_user'] : '';

  // prepare the statement
  $sql = "UPDATE users SET";
  $updates = array();

  if (strlen($firstName) == 0) {
    http_response_code(400);
    customExit("First name cannot be empty");
  } else {
    array_push($updates, "firstName = '$firstName'");
  }

  if (strlen($lastName) == 0) {
    http_response_code(400);
    customExit("Last name cannot be empty");
  } else {
    array_push($updates, "lastName = '$lastName'");
  }

  if ($income == 0) {
    http_response_code(400);
    customExit("Income cannot be zero");
  } else {
    array_push($updates, "income = $income");
  }

  // password can be empty
  if (strlen($password) > 0 && strlen($password) < 8) {
    http_response_code(400);
    customExit("Leave the password field empty, else specify 8 or more characters");
  }

  if (strlen($password) > 8) {
    $hashedPassword = hash("sha256", $password);
    array_push($updates, "password = '$hashedPassword'");
  }

  if (sizeof($updates) == 0) {
    http_response_code(400);
    customExit("Update cannot be empty");
  }

  $sql = $sql." ".join(", ", $updates);
  $sql = $sql." WHERE email = '$email'";
  $query = mysqli_query($connection, $sql);

  if (!$query) {
    http_response_code(500);
    customExit("Something went wrong on the server try again later");
  }

  http_response_code(200);
  customExit("Success");

?>