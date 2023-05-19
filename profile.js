const EditButton = document.getElementById('editBtn');


EditButton.addEventListener('click', (event) => 
{
    event.preventDefault(); // Prevent the default form submission
    window.location.href = 'edit_profile.html';
}); 