<?php
  require_once "./includes/header.php";
?>

  <div class="reg-container container fill-screen">
    <h4 class="register-text">Welcome back to Taxism</h4>

    <div class="hide response-container" id="response-container"></div>

    <form id="logForm" onsubmit="return false">
      <div class="form-floating">
        <input type="email" class="form-control" id="email" required>
        <label for="email">Email address</label>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="password" required>
        <label for="password">Password</label>
      </div>

      <button class="btn-black" type="submit">
        Login
        <span id="loader" class="loader hide"></span>
      </button>
    </form>
  </div>

<?php
  require_once "./includes/footer.php";
?>
