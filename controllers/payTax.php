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
    $tax = $postData['tax'];
    $userId = $_COOKIE['tax_user'];
    $income = $postData['income'];
    $currentMonth = date("F");
    $currentYear = date("Y");
    $due = date('Y-m-d', strtotime('first day of next month'));

    // validate information
    if ($tax <= 0 || strlen($userId) == 0 || $income < 0 || $tax > $income) {
      http_response_code(400);
      customExit("Invalid payment information");
    }

    // find user record in database
    $sql = "INSERT INTO tax_history (`month`, `year`, `estimatedIncome`, `tax`, `due`, `userId`) VALUES ('$currentMonth', '$currentYear', $income, $tax, '$due', '$userId')";
    $query = mysqli_query($connection, $sql);

    if (!$query) {
      http_response_code(500);
      customExit("Something went wrong, try again");
    }

    http_response_code(200);
    customExit("Success");
  }

?>