<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tax Management System</title>

  <!-- CSS only -->
  <link rel="stylesheet" href="./css/styles.css?id=<?php echo time() ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  
  <header>
    <div class="row">
      <div class="col-md-3 col-lg-3">
        <h1 class="title">Taxism</h1>
      </div>
      <div class="col-md-9 col-lg-9 nav-pane">
        <ul class="nav" type="none">
          <li><a href="./index.php">Home</a></li>
          <li><a href="./about-us.php">About Us</a></li>
          <li><a href="./contact.php">Contact Us</a></li>
          <li><a href="./how-it-works.php">How it works</a></li>
          <li><a href="./faqs.php">FAQs</a></li>

          <div class="nav-division"></div>

          <?php
            if (isset($_COOKIE['tax_user'])) {
          ?>
            <div class="dropdown">
              <li data-bs-toggle="dropdown" aria-expanded="false"><a href="#">Profile</a></li>
              <div class="dropdown-menu">
                <li><a href="./edit-profile.php">Edit Profile</a></li>
                <li><a href="./history.php">Tax History</a></li>
                <li><a href="./pay.php">Pay Taxes</a></li>
                <li><a href="./logout.php">Logout</a></li>
              </div>
            </div>
          <?php
            } else {
          ?>
          <li><a href="./register.php">Register</a></li>
          <li><a href="./login.php">Log In</a></li>
          <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </header>