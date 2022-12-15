<?php

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // import the connection
    require_once "./../config/db.php";
    require_once "./../utils/customExit.php";

    // parse the post request
    $rawPostData = file_get_contents("php://input");
    $postData = json_decode($rawPostData, true);

    // get the user information from the request payload
    $email = $postData['email'];
    $firstName = $postData['firstName'];
    $lastName = $postData['lastName'];
    $password = $postData['password'];
    $income = $postData['income'];

    // validate information
    if (strlen($email) == 0 || strlen($password) == 0 || strlen($firstName) == 0 || strlen($lastName) == 0) {
      http_response_code(400);
      customExit("Incomplete request");
    }

    if ($income <= 0) {
      http_response_code(400);
      customExit("Income can not be less than or equal to zero");
    }

    // register user
    $hashedPassword = hash("sha256", $password);

    $sql = "INSERT INTO users (`email`, `password`, `firstName`, `lastName`, `income`) VALUES ('$email', '$hashedPassword', '$firstName', '$lastName', $income)";    
    $query = mysqli_query($connection, $sql);

    if (!$query) {
      http_response_code(500);
      customExit("Something went wrong on the server try again later");
    }

    // set session info
    setcookie("tax_user", $email, time() + (3600 * 24 * 30), "/");

    http_response_code(200);
    customExit("Success");
  }

?>