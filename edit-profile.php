<?php
  require_once "./includes/header.php";
?>

  <div class="reg-container container">
    <h4 class="register-text">Update your Taxism account</h4>
    <form>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="firstName" placeholder="John">
        <label for="firstName">First Name</label>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="lastName" placeholder="Doe">
        <label for="lastName">Last Name</label>
      </div>

      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" placeholder="name@example.com" disabled>
        <label for="email">Email address</label>
      </div>

      <div class="form-floating mb-3">
        <input type="number" class="form-control" id="income" placeholder="₦10,000">
        <label for="income">Monthly Income</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password" placeholder="********">
        <label for="password">Password</label>
      </div>

      <button class="btn-black" type="button">Update profile</button>
    </form>
  </div>

<?php
  require_once "./includes/footer.php";
?>