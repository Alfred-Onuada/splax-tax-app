<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tax Management System</title>

  <!-- CSS only -->
  <link rel="stylesheet" href="./css/styles.css?id=<?php echo time() ?>">
  <link rel="stylesheet" href="./css/custom.css?id=<?php echo time() ?>">
</head>
<body>

  <?php
    require_once "./config/db.php";
  ?>
  <header>
    <div class="row navbar-row">
      <div class="col-md-3 col-lg-3 col-sm-12 hamburger-row">
        <h1 class="title">Taxism</h1>

        <div onclick="navEvent()" class="hamburger">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
      <div id="navbar-responsive" class="col-sm-12 col-md-9 col-lg-9 nav-pane navbar-hide navbar-links">
        <ul class="nav" type="none">
          <li><a href="./index.php">Home</a></li>
          <li><a href="./about-us.php">About Us</a></li>
          <li><a href="./contact.php">Contact Us</a></li>
          <li><a href="./how-it-works.php">How it works</a></li>
          <li><a href="./faqs.php">FAQs</a></li>

          <?php
            if (isset($_COOKIE['tax_user'])) {
          ?>
            <div class="dropdown dropmenu">
              <li onclick="activateDropdown()"><a href="#">Profile &#9660</a></li>
              <div id="dropdownMenu" class="dropdown-menu hide">
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