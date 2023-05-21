// Profile picture preview
const profilePicInput = document.getElementById('profile-pic-input');
const profilePic = document.getElementById('profile-pic');

profilePicInput.addEventListener('change', function(event) {
  const file = event.target.files[0];
  const reader = new FileReader();

  reader.onload = function(e) {
    profilePic.src = e.target.result;
  };

  reader.readAsDataURL(file);
});

// Save profile details
const saveButton = document.getElementById('save-button');

saveButton.addEventListener('click', function() {
  const name = document.getElementById('name').value;
  const surname = document.getElementById('surname').value;
  const age = document.getElementById('age').value;
  const gender = document.getElementById('gender').value;
  const idNumber = document.getElementById('id-number').value;
  const email = document.getElementById('email').value;
  const phone = document.getElementById('phone').value;
  const bio = document.getElementById('bio').value;

  // Validate the input fields
  const errorMessage = document.getElementById('error-message');
  errorMessage.innerHTML = '';

  if (!name || !surname || !age || !gender || !idNumber || !email || !phone || !bio) {
    errorMessage.innerHTML = 'Please fill in all the details.';
    return;
  }

  // Save the details (you can customize this part according to your needs)
  // Here, we simply log the details to the console
  console.log('Name:', name);
  console.log('Surname:', surname);
  console.log('Age:', age);
  console.log('Gender:', gender);
  console.log('ID Number:', idNumber);
  console.log('Email Address:', email);
  console.log('Phone Number:', phone);
  console.log('Bio:', bio);
});

// Delete profile
const deleteButton = document.getElementById('delete-button');

deleteButton.addEventListener('click', function() {
  // Perform the delete operation (you can customize this part according to your needs)
  // Here, we simply log a message to the console
  console.log('Profile deleted.');
});
