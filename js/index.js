class xhr{
  url = null;
  body = null;
  handler = null;
  requestType = null;

  constructor(url, handler, requestType) {
    this.url = url;
    this.handler = handler;
    this.requestType = requestType;
  }

  send(data) {
    const xhr = new XMLHttpRequest();
    xhr.open(this.requestType, this.url);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = () => (this.handler(xhr));
    xhr.send(JSON.stringify(data));
  }
}

function activateSpinner() {
  document.getElementById('loader').classList.remove('hide');
}

function killSpinner() {
  document.getElementById('loader').classList.add('hide');
}

function handleSuccess(msg) {
  const responseContainer = document.getElementById('response-container');

  responseContainer.scrollIntoView();
  responseContainer.classList.remove('hide');
  responseContainer.classList.add('success');
  responseContainer.textContent = msg;

  setTimeout(() => {
    responseContainer.classList.remove('success');
    responseContainer.classList.add('hide');
  }, 3500)
}

function handleError(msg) {
  const responseContainer = document.getElementById('response-container');

  responseContainer.scrollIntoView();
  responseContainer.classList.remove('hide');
  responseContainer.classList.add('error');
  responseContainer.textContent = msg;

  setTimeout(() => {
    responseContainer.classList.remove('error');
    responseContainer.classList.add('hide');
  }, 3500)
}

function register() {
  activateSpinner();
  const firstName = document.getElementById('firstName').value;
  const lastName = document.getElementById('lastName').value;
  const email = document.getElementById('email').value;
  const income = +(document.getElementById('income').value);
  const password = document.getElementById('password').value;
  
  const data = {
    firstName,
    lastName,
    email,
    income,
    password
  }

  function handleResponse(http) {
    if (http.readyState === 4) {
      if (http.status === 200) {
        handleSuccess(JSON.parse(http.responseText).msg);

        setTimeout(() => {
          location.assign('http://localhost/websites/splax-tax-app/index.php');
        }, 3500);
      } else {
        handleError(JSON.parse(http.responseText).msg);
      }

      killSpinner();
    }
  }

  const request = new xhr('http://localhost/websites/splax-tax-app/controllers/register.php', handleResponse, 'POST');
  request.send(data);
}

if (document.getElementById('regForm')) {
  document.getElementById('regForm').addEventListener('submit', register);
}

function login() {
  activateSpinner();
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;
  
  const data = {
    email,
    password
  }

  function handleResponse(http) {
    if (http.readyState === 4) {
      if (http.status === 200) {
        handleSuccess(JSON.parse(http.responseText).msg);

        setTimeout(() => {
          location.assign('http://localhost/websites/splax-tax-app/index.php');
        }, 3500);
      } else {
        handleError(JSON.parse(http.responseText).msg);
      }

      killSpinner();
    }
  }

  const request = new xhr('http://localhost/websites/splax-tax-app/controllers/login.php', handleResponse, 'POST');
  request.send(data);
}

if (document.getElementById('logForm')) {
  document.getElementById('logForm').addEventListener('submit', login);
}


function register() {
  activateSpinner();
  const firstName = document.getElementById('firstName').value;
  const lastName = document.getElementById('lastName').value;
  const email = document.getElementById('email').value;
  const income = +(document.getElementById('income').value);
  const password = document.getElementById('password').value;
  
  const data = {
    firstName,
    lastName,
    email,
    income,
    password
  }

  function handleResponse(http) {
    if (http.readyState === 4) {
      if (http.status === 200) {
        handleSuccess(JSON.parse(http.responseText).msg);

        setTimeout(() => {
          location.assign('http://localhost/websites/splax-tax-app/index.php');
        }, 3500);
      } else {
        handleError(JSON.parse(http.responseText).msg);
      }

      killSpinner();
    }
  }

  const request = new xhr('http://localhost/websites/splax-tax-app/controllers/register.php', handleResponse, 'POST');
  request.send(data);
}

if (document.getElementById('regForm')) {
  document.getElementById('regForm').addEventListener('submit', register);
}

function update() {
  activateSpinner();
  const firstName = document.getElementById('firstName').value;
  const lastName = document.getElementById('lastName').value;
  const income = +(document.getElementById('income').value);
  const password = document.getElementById('password').value;
  
  const data = {
    firstName,
    lastName,
    income,
    password
  }

  function handleResponse(http) {
    if (http.readyState === 4) {
      if (http.status === 200) {
        handleSuccess(JSON.parse(http.responseText).msg);

        setTimeout(() => {
          location.assign('http://localhost/websites/splax-tax-app/index.php');
        }, 3500);
      } else {
        handleError(JSON.parse(http.responseText).msg);
      }

      killSpinner();
    }
  }

  const request = new xhr('http://localhost/websites/splax-tax-app/controllers/updateProfile.php', handleResponse, 'POST');
  request.send(data);
}

if (document.getElementById('updateForm')) {
  document.getElementById('updateForm').addEventListener('submit', update);
}

function formatCreditCardNumber(input) {
  // Remove any non-numeric characters from the input
  input = input.replace(/\D/g, '');

  // Split the input into groups of 4 digits separated by a space
  input = input.replace(/([0-9]{4})/g, '$1 ');

  // Trim any excess whitespace from the beginning or end of the input
  input = input.trim();

  return input;
}

function formatExpiryDate(input) {
  var formattedInput = input.replace(/[^0-9]/g, ""); // remove any non-numeric characters

  if (formattedInput.length > 2) {
    formattedInput = formattedInput.substring(0, 2) + "/" + formattedInput.substring(2); // add "/" after first 2 digits
  }

  return formattedInput;
}


function format(element, type) {
  if (type === 'cardNumber') {
    element.value = formatCreditCardNumber(element.value);
    return;
  }

  if (type === 'expiryDate') {
    element.value = formatExpiryDate(element.value)
    return;
  }
}

function beginPayment() {
  document.getElementById('realPayBtn').click();
}

function pay() {
  activateSpinner();
  const tax = +(document.getElementById('tax').value);
  const income = +(document.getElementById('income').value);
  const userId = document.getElementById('userId').value;
  
  const data = { 
    tax,
    userId,
    income
  }

  function handleResponse(http) {
    if (http.readyState === 4) {
      if (http.status === 200) {
        handleSuccess(JSON.parse(http.responseText).msg);

        setTimeout(() => {
          location.assign('http://localhost/websites/splax-tax-app/history.php');
        }, 3500);
      } else {
        handleError(JSON.parse(http.responseText).msg);
      }

      killSpinner();
    }
  }


  // simulate 3.5 seconds wait time
  setTimeout(() => {
    const request = new xhr('http://localhost/websites/splax-tax-app/controllers/payTax.php', handleResponse, 'POST');
    request.send(data);
  }, 3500);
}

if (document.getElementById('payForm')) {
  document.getElementById('payForm').addEventListener('submit', pay);
}