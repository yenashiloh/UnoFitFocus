<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile | FitFocus</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/Sample.css">
</head>
<body>

<div class="profile-container">
    <h2>User Profile</h2>

    <!-- Profile Photo -->
    <div class="profile-photo">
        <img src="default-profile.jpg" alt="Profile Picture" id="profileImage">
        <button class="edit-photo-btn" id="editPhotoBtn">📷</button>
    </div>

    <!-- Profile Information -->
    <div class="profile-info" id="profileInfo">
        <label for="firstName">First Name:</label>
        <p id="firstNameText">John</p>
        <input type="text" id="firstNameInput" value="John">

        <label for="middleName">Middle Name:</label>
        <p id="middleNameText">Doe</p>
        <input type="text" id="middleNameInput" value="Doe">

        <label for="lastName">Last Name:</label>
        <p id="lastNameText">Smith</p>
        <input type="text" id="lastNameInput" value="Smith">

        <label for="birthdate">Birthdate:</label>
        <p id="birthdateText">1990-01-01</p>
        <input type="date" id="birthdateInput" value="1990-01-01">

        <label for="height">Height (cm):</label>
        <p id="heightText">180</p>
        <input type="number" id="heightInput" value="180">

        <label for="weight">Weight (kg):</label>
        <p id="weightText">75</p>
        <input type="number" id="weightInput" value="75">

        <label for="gender">Gender:</label>
        <p id="genderText">Male</p>
        <input type="text" id="genderInput" value="Male">
    </div>

    <!-- Buttons -->
    <div class="btn-container">
        <button class="edit-btn" id="editInfoBtn">Edit Info</button>
        <button class="save-btn hidden" id="saveInfoBtn">Save</button>
        <button class="cancel-btn hidden" id="cancelInfoBtn">Clear Changes</button>
    </div>
</div>

<script>
    // Edit profile photo logic
    document.getElementById('editPhotoBtn').addEventListener('click', function() {
        alert('Change profile photo logic can be implemented here.');
    });

    // Edit profile information logic
    const editInfoBtn = document.getElementById('editInfoBtn');
    const saveInfoBtn = document.getElementById('saveInfoBtn');
    const cancelInfoBtn = document.getElementById('cancelInfoBtn');
    
    const textFields = document.querySelectorAll('#profileInfo p');
    const inputFields = document.querySelectorAll('#profileInfo input');

    editInfoBtn.addEventListener('click', function() {
        textFields.forEach(text => text.classList.add('hidden'));
        inputFields.forEach(input => input.style.display = 'block');
        editInfoBtn.classList.add('hidden');
        saveInfoBtn.classList.remove('hidden');
        cancelInfoBtn.classList.remove('hidden');
    });

    // Save Changes
    saveInfoBtn.addEventListener('click', function() {
        textFields.forEach(text => text.classList.remove('hidden'));
        inputFields.forEach(input => input.style.display = 'none');
        editInfoBtn.classList.remove('hidden');
        saveInfoBtn.classList.add('hidden');
        cancelInfoBtn.classList.add('hidden');

        // Update the displayed text with the new input values
        document.getElementById('firstNameText').innerText = document.getElementById('firstNameInput').value;
        document.getElementById('middleNameText').innerText = document.getElementById('middleNameInput').value;
        document.getElementById('lastNameText').innerText = document.getElementById('lastNameInput').value;
        document.getElementById('birthdateText').innerText = document.getElementById('birthdateInput').value;
        document.getElementById('heightText').innerText = document.getElementById('heightInput').value;
        document.getElementById('weightText').innerText = document.getElementById('weightInput').value;
        document.getElementById('genderText').innerText = document.getElementById('genderInput').value;
    });

    // Clear Changes
    cancelInfoBtn.addEventListener('click', function() {
        textFields.forEach(text => text.classList.remove('hidden'));
        inputFields.forEach(input => input.style.display = 'none');
        editInfoBtn.classList.remove('hidden');
        saveInfoBtn.classList.add('hidden');
        cancelInfoBtn.classList.add('hidden');
    });
</script>

</body>
</html>