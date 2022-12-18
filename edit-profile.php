<?php
  require_once "./includes/header.php";

  if (!isset($_COOKIE['tax_user'])) {
    header('location: ./index.php');

    return;
  }

  $userId = $_COOKIE['tax_user'];

  $sql = "SELECT * FROM users WHERE email = '$userId'";
  $query = mysqli_query($connection, $sql);
  $noOfRows = mysqli_num_rows($query);

  if ($noOfRows <= 0) {
    header('location: ./index.php');

    return;
  }

  $data = mysqli_fetch_assoc($query);
?>

  <div class="reg-container container fill-screen">
    <h4 class="register-text">Update your Taxism account</h4>

    <div class="hide response-container" id="response-container"></div>

    <form id="updateForm" onsubmit="return false">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="firstName" value="<?php echo $data['firstName'] ?>">
        <label for="firstName">First Name</label>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="lastName" value="<?php echo $data['lastName'] ?>">
        <label for="lastName">Last Name</label>
      </div>

      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" value="<?php echo $data['email'] ?>" disabled>
        <label for="email" class="label-active">Email address</label>
      </div>

      <div class="form-floating mb-3">
        <input type="number" class="form-control" id="income" value="<?php echo $data['income'] ?>">
        <label for="income">Monthly Income (taxable income)</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password">
        <label for="password">Password</label>
      </div>

      <button class="btn-black" type="submit">
        Update profile
        <span id="loader" class="loader hide"></span>
      </button>
    </form>
  </div>

<?php
  require_once "./includes/footer.php";
?>
