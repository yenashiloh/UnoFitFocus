lucide.createIcons();

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
    lucide.createIcons();  // Re-render the icons
}

function check() {
    let valid = true;
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    
    if (!email.value.trim()) {
        email.classList.add('error');
        document.getElementById('emailError').style.display = 'block';
        valid = false;
    }
    
    if (!password.value.trim()) {
        password.classList.add('error');
        document.getElementById('passwordError').style.display = 'block';
        valid = false;
    }
}