<?php
  require_once "./includes/header.php";
?>

  <div class="reg-container container">
    <h4 class="register-text">Join us today at Taxism</h4>

    <div class="hide response-container" id="response-container"></div>

    <form id="regForm" onsubmit="return false">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="firstName" placeholder="John" required>
        <label for="firstName">First Name</label>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="lastName" placeholder="Doe" required>
        <label for="lastName">Last Name</label>
      </div>

      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
        <label for="email">Email address</label>
      </div>

      <div class="form-floating mb-3">
        <input type="number" class="form-control" id="income" placeholder="₦10,000" required>
        <label for="income">Monthly Income (taxable income)</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password" placeholder="********" required>
        <label for="password">Password</label>
      </div>

      <button class="btn-black" type="submit">
        Register
        <span id="loader" class="loader hide"></span>
      </button>
    </form>
  </div>

<?php
  require_once "./includes/footer.php";
?>