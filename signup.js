const submitButton = document.getElementById('submit');

submitButton.addEventListener('click', (event) => 
{
    event.preventDefault(); // Prevent the default form submission
    window.location.href = 'loadingpage.html';
}); 