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
  const password = document.getElementById('firstName').value;
  
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