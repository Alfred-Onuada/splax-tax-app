<?php
  require_once "./includes/header.php";
?>

  <div class="container">
    <!-- <h5>Hurray 🎉, You have already paid the taxes for this month.</h5> -->

    <h5>You owe the government ₦60,000 based on your ₦700,000 salary this month</h5>

    <button class="btn-black btn-small" data-bs-toggle="modal" data-bs-target="#paymentModal">Pay the government</button>

  </div>


  <!-- Modal -->
  <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="paymentModalLabel">Splax Payments IO</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="card-number" placeholder="919-4242-222">
              <label for="card-number">Card Number</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="cvv" placeholder="***" maxlength="3">
              <label for="cvv">CVV</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="date" placeholder="12/99">
              <label for="date">Expiry Date</label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-black" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn-black">Pay</button>
        </div>
      </div>
    </div>
  </div>

<?php
  require_once "./includes/footer.php";
?>