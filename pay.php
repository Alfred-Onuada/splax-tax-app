<?php
  require_once "./includes/header.php";

  if (!isset($_COOKIE['tax_user'])) {
    header('location: ./index.php');

    return;
  }

  $userId = $_COOKIE['tax_user'];

  $sql = "SELECT * FROM users WHERE email = '$userId'";
  $query = mysqli_query($connection, $sql);
  $data = mysqli_fetch_assoc($query);

  // tax brackets
  $tax = 0;
  if ($data['income'] <= 50000) {
    $tax = $data['income'] * .15;
  } else if ($data['income'] <= 150000) {
    $tax = $data['income'] * .3;
  } else {
    $tax = $data['income'] * .45;
  }
?>

  <div class="container">
    <?php
      $currentMonth = date("F");
      $currentYear = date("Y");

      $sql = "SELECT * FROM tax_history WHERE month = '$currentMonth' AND year = '$currentYear' AND userId = '$userId'";
      $query = mysqli_query($connection, $sql);
      $noOfRows = mysqli_num_rows($query);

      if ($noOfRows > 0) {
    ?>
      <h5>Hurray 🎉, You have already paid the taxes for this month.</h5>
    <?php
      } else {
    ?>
      <h5>You owe the government ₦<?php echo $tax ?> based on your ₦<?php echo $data['income'] ?> salary this month</h5>

      <button class="btn-black btn-small" data-bs-toggle="modal" data-bs-target="#paymentModal">Pay the government</button>
    <?php
      }

    ?>
  </div>


  <?php
    if ($noOfRows == 0) {
  ?>

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="paymentModalLabel">Splax Payments IO</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="hide response-container" id="response-container"></div>

            <form id="payForm" onsubmit="return false">
              <input type="number" id="tax" value="<?php echo $tax ?>" hidden disabled>
              <input type="number" id="income" value="<?php echo $data['income'] ?>" hidden disabled>
              <input type="text" id="userId" value="<?php echo $userId ?>" hidden disabled>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="card-number" placeholder="919-4242-222" onchange="format(this, 'cardNumber')" required>
                <label for="card-number">Card Number</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="date" placeholder="12/99" maxlength="5" onchange="format(this, 'expiryDate')" required>
                <label for="date">Expiry Date</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="cvv" placeholder="***" maxlength="3" required>
                <label for="cvv">CVV</label>
              </div>

              <button type="submit" id="realPayBtn" class="hide"></button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn-black" data-bs-dismiss="modal">Cancel</button>
            <button onclick="beginPayment()" type="button" class="btn-black">
              Pay ₦<?php echo $tax ?>
              <span id="loader" class="loader hide"></span>
            </button>
          </div>
        </div>
      </div>
    </div>

  <?php
    }
  ?>

<?php
  require_once "./includes/footer.php";
?>