<?php
  require_once "./includes/header.php";
?>

  <div class="container">
    <form id="contactForm" onsubmit="return false">
      <h4 class="contact-title">Shoot us a mail</h4>

      <div class="hide response-container" id="response-container"></div>

      <div class="group">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="email"  required>
          <label for="email">Email address</label>
        </div>
  
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="subject" required>
          <label for="subject">Subject</label>
        </div>
      </div>

      <div class="form-floating mb-3">
        <textarea class="form-control subject" id="body" required></textarea>
        <label for="body">Subject</label>
      </div>

      <button class="btn-black" type="submit">
        Send
        <span id="loader" class="loader hide"></span>
      </button>
    </form>
  </div>

<?php
  require_once "./includes/footer.php";
?>