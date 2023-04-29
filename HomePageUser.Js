let subMenu = document.getElementById("subMenu");

function toggleMenu()
{
    subMenu.classList.toggle("open-menu");
}

const profileButton = document.getElementById("profile");

profileButton.addEventListener('click', (event) => 
{
    event.preventDefault(); // Prevent the default form submission
    window.location.href = 'profile.html';
}); 