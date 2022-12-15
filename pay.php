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
  // first 100k - 10%
  // next 250k - 25%
  // anything after that - 30%

  $tax = 0;
  $income  = $data['income'];

  if ($income > 100000) {
    $tax += (100000 * .1);
    $income -= 100000;

    if ($income > 250000) {
      $tax += (250000 * .25);
      $income -= 250000;

      if ($income > 0) {
        $tax += ($income * .3);
      }

    } else {
      $tax += ($income * .25);
    }
  } else {
    $tax += ($income * .1);
  }
?>

  <div class="pay-page container">
    <?php
      $currentMonth = date("F");
      $currentYear = date("Y");

      $sql = "SELECT * FROM tax_history WHERE month = '$currentMonth' AND year = '$currentYear' AND userId = '$userId'";
      $query = mysqli_query($connection, $sql);
      $noOfRows = mysqli_num_rows($query);

      if ($noOfRows > 0) {
    ?>
      <img class="pay-img" src="./imgs/10820.jpg" alt="all done image">
      <h5>Hurray 🎉, You have already paid the taxes for this month.</h5>
    <?php
      } else {
    ?>
      <img class="pay-img" src="./imgs/Hand holding phone with digital wallet service and sending money.jpg" alt="owe">
      <h5>You owe the government <b>₦</b><b class="tax"><?php echo $tax ?></b> based on your ₦<span class="income"><?php echo $data['income'] ?></span> salary this month</h5>

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
                <input type="text" class="form-control" id="card-number" maxlength="19" pattern="\d{4}\s\d{4}\s\d{4}\s\d{4}" onkeyup="format(this, 'cardNumber')" required>
                <label for="card-number">Card Number</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="date" maxlength="5" pattern="\d{2}\/\d{2}" onkeyup="format(this, 'expiryDate')" required>
                <label for="date">Expiry Date</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="cvv" maxlength="3" pattern="\d*" required>
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