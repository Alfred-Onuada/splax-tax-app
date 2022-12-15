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
    $subject = $postData['subject'];
    $body = $postData['body'];
    
    // validate information
    if (strlen($email) == 0 || strlen($subject) == 0 || strlen($body) == 0) {
      http_response_code(400);
      customExit("Incomplete request");
    }

    $sql = "INSERT INTO complaints (`email`, `subject`, `body`) VALUES ('$email', '$subject', '$body')";    
    $query = mysqli_query($connection, $sql);

    if (!$query) {
      http_response_code(500);
      customExit("Something went wrong on the server try again later");
    }

    http_response_code(200);
    customExit("Success");
  }

?>