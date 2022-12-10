<?php
  require_once "./includes/header.php";
?>

  <div class="reg-container container">
    <h4 class="register-text">Welcome back to Taxism</h4>
    <form>
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
        <label for="email">Email address</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password" placeholder="********" required>
        <label for="password">Password</label>
      </div>

      <button class="btn-black" type="button">Login</button>
    </form>
  </div>

<?php
  require_once "./includes/footer.php";
?>