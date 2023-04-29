const usernameInput = document.querySelector('#username');
const passwordInput = document.querySelector('#password');
const submitButton = document.querySelector('#login');

submitButton.addEventListener('click', (event) => {
  event.preventDefault(); // Prevent the default form submission

  if (usernameInput.value === 'ran' && passwordInput.value === '1234') {
    // alert('Please enter a username.');
    window.location.href = 'loadingpage.html'; 
  }
  else
  {
    alert('Please enter a username and password.');
  }

  // Replace with the URL of the page you want to redirect to
});

