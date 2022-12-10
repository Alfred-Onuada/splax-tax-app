<?php
  require_once "./includes/header.php";
?>

  <div class="container">
    <h5>Have a look at your tax payment history</h5>

    <div class="tax-history">
      <h6>From 2022</h6>

      <table class="table table-striped">
        <thead>
          <td>S/N</td>
          <td>Month</td>
          <td>Estimated income</td>
          <td>Tax</td>
          <td>Due date</td>
          <td>Date paid</td>
          <td>Late payment</td>
        </thead>
        <tbody>
          <tr>
            <td>02.</td>
            <td>Feburary</td>
            <td>₦140,000</td>
            <td>₦10,000</td>
            <td>01-03-2022</td>
            <td>27-02-2022</td>
            <td>No</td>
          </tr>
          <tr>
            <td>01.</td>
            <td>January</td>
            <td>₦140,000</td>
            <td>₦10,000</td>
            <td>01-02-2022</td>
            <td>31-01-2022</td>
            <td>No</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

<?php
  require_once "./includes/footer.php";
?>