<?php
  require_once "./includes/header.php";
?>

<div class="container">
  <h5 class="faqs-title">Some frequently asked questions?</h5>

  <img class="faqs-img" src="./imgs/5066368.jpg" alt="Faqs vector">

  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne" onclick="toggleAccordion(this)">
      <button class="accordion-button" type="button" aria-expanded="true">
        What is the deadline for filing my taxes?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
      <div class="accordion-body">
        The deadline for filing your taxes is typically April 15th of each year.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo" onclick="toggleAccordion(this)">
      <button class="accordion-button collapsed" type="button" aria-expanded="false">
        How do I calculate my tax liability?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
      <div class="accordion-body">
      To calculate your tax liability, you will need to gather all of your income information and use a tax calculator or consult with a tax professional.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree" onclick="toggleAccordion(this)">
      <button class="accordion-button collapsed" type="button" aria-expanded="false">
        Can I claim deductions to reduce my tax liability?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
      <div class="accordion-body">
        Yes, you may be eligible to claim deductions on your tax return to reduce your tax liability. These deductions can include things like charitable donations, student loan interest, and medical expenses
      </div>
    </div>
  </div>
</div>

</div>

<?php
  require_once "./includes/footer.php";
?>