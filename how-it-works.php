<?php
  require_once "./includes/header.php";
?>

  <div class="container">
    <h4>Below is a demo of how online tax systems work</h4>

    <div class="steps">
      <h4>Step 1</h4>

      <br>
      <p>Find a reputable tax calculator website. There are many different tax calculator tools available online, so it's important to find one that is reliable and accurate. Some websites may be more user-friendly than others, so take some time to explore a few different options to find the one that best fits your needs.</p>
    </div>
    <div class="steps">
      <h4>Step 2</h4>

      <br>
      <p>Gather the necessary information. Before you can use a tax calculator, you will need to have certain information on hand, such as your income, any deductions or credits you plan to claim, and your filing status. If you are unsure of what information you need, most tax calculator websites will provide a list of items you should have ready before beginning.</p>
    </div>
    <div class="steps">
      <h4>Step 3</h4>

      <br>
      <p>Enter the information into the calculator. Once you have all of the necessary information, you can begin using the tax calculator. Typically, this involves entering your income, deductions, and other relevant details into the appropriate fields on the website. The calculator will then use this information to determine your estimated tax liability or refund.</p>
    </div>

    <br>
    <p>
      Overall, using an online tax calculator can be a quick and easy way to get a sense of how much you may owe or be owed in taxes. It can also help you make informed decisions about your finances and tax strategy. Keep in mind, however, that the results from an online tax calculator are only estimates and may not reflect your actual tax liability. It's always a good idea to consult with a tax professional or use official tax software for a more accurate calculation.
    </p>

    <br>
    <h5>Give it a spin with our online calculator</h5>

    <div class="hide response-container" id="response-container"></div>

    <div class="demo-calculator">
      <div class="form-floating mb-3">
        <input type="number" class="form-control" id="income" required onkeyup="calculateTax()">
        <label for="income">Total Income</label>
      </div>

      <div class="form-floating mb-3">
        <input type="number" class="form-control" id="deductions" required onkeyup="calculateTax()">
        <label for="income">Allowable deductions</label>
      </div>

      <h5>Your estimated tax is: <b>₦<span id="tax">0.00</span></b></h5>
    </div>

  </div>  

<?php
  require_once "./includes/footer.php";
?>