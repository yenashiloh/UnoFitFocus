lucide.createIcons();
// Simulated database for email validation
//const existingEmails = ["test@example.com", "hello@domain.com"];

// Function to go to the next step
function check() {
    let valid = true;
    // Step 1 validation
    const firstName = document.getElementById('firstName');
    const lastName = document.getElementById('lastName');
    
    if (!firstName.value.trim()) {
        firstName.classList.add('error');
        document.getElementById('firstNameError').style.display = 'block';
        valid = false;
    }
    
    if (!lastName.value.trim()) {
        lastName.classList.add('error');
        document.getElementById('lastNameError').style.display = 'block';
        valid = false;
    }

    // Step 2 validation
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const emailError = document.getElementById('emailError');
    const confirmError = document.getElementById('confirmError');
    const passwordRequirements = document.getElementById('passwordRequirements');

    if (!email.value.trim()) {
        email.classList.add('error');
        emailError.style.display = 'block';
        valid = false;
    }

    if (!password.value.trim()) {
        password.classList.add('error');
        document.getElementById('passwordError').style.display = 'block';
        valid = false;
    }

    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    if (!passwordPattern.test(password.value)) {
        passwordRequirements.style.color = 'red';
        valid = false;
    } else {
        passwordRequirements.style.color = 'green';
    }

    if (password.value !== confirmPassword.value) {
        confirmError.textContent = "Passwords do not match.";
        confirmError.style.display = 'block';
        valid = false;
    } else {
        confirmError.textContent = "";
    }
}

// Toggle password visibility
function togglePassword(id) {
    const passwordField = document.getElementById(id);
    const icon = passwordField.nextElementSibling.querySelector('i');

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.setAttribute('data-lucide', 'eye-off');
    } else {
        passwordField.type = 'password';
        icon.setAttribute('data-lucide', 'eye');
    }
    lucide.createIcons();
}

// Input field listener for validation removal
document.querySelectorAll('input').forEach(input => {
    input.addEventListener('input', () => {
        if (input.classList.contains('error')) {
            input.classList.remove('error');
            input.nextElementSibling.style.display = 'none';
        }
    });
});