<?php
  require_once "./includes/header.php";
?>

  <div class="container fill-screen">
    <?php
      if (!isset($_COOKIE['tax_user'])) {
        header('location: ./index.php');

        return;
      }

      $userId = $_COOKIE['tax_user'];

      $sql = "SELECT DISTINCT year FROM `tax_history` WHERE userId = '$userId' ORDER BY year DESC";
      $query = mysqli_query($connection, $sql);
      $numOfRows = mysqli_num_rows($query);

      if ($numOfRows == 0) {
    ?>
    <div class="not-found">
      <img class="pay-img" src="./imgs/404.jpeg" alt="404">
      <h5>There is nothing to see here for now.</h5>
    </div>
    <?php
      } else {
    ?>
    <h5>Have a look at your tax payment history</h5>
    <?php
      }

      $lastAccessedYear = '';

      while ($data = mysqli_fetch_assoc($query)) {
        $year = $data['year'];

    ?>

      <div class="tax-history">
        <h6>From <?php echo $data['year'] ?></h6>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <td>S/N</td>
              <td>Month</td>
              <td>Estimated income</td>
              <td>Tax</td>
              <td>Due date</td>
              <td>Date paid</td>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM `tax_history` WHERE userId = '$userId' AND year = '$year'";
                $taxQuery = mysqli_query($connection, $sql);

                $rowNo = mysqli_num_rows($taxQuery);
                while ($taxData = mysqli_fetch_assoc($taxQuery)) {
              ?>
                <tr>
                  <td><?php echo $rowNo; ?></td>
                  <td><?php echo $taxData['month'] ?></td>
                  <td>₦<?php echo number_format($taxData['estimatedIncome']) ?></td>
                  <td>₦<?php echo number_format($taxData['tax']) ?></td>
                  <td><?php echo date('M j Y g:i A', strtotime($taxData['due']))?></td>
                  <td><?php echo date('M j Y g:i A', strtotime($taxData['due'])) ?></td>
                </tr>
              <?php
                  $rowNo--;
                }
              ?>
            </tbody>
          </table>
        </div>
        <br>
      </div>

    <?php

      }
    ?>

  </div>

<?php
  require_once "./includes/footer.php";
?>
