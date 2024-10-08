<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | FitFocus</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/Registration.css">
</head>
<body>
    @include('partials.navbar')
    <main>
        <div class="form-container">
            <form id="signUpForm" method="post" action="Receiver.php">
                <!-- Step 1: Personal Information -->
                <div class="form-step active" id="step1">
                    <h2>Personal Information</h2>
                    <label for="firstName">First Name*</label>
                    <input type="text" id="firstName" name="firstName" required>
                    <small class="error-message" id="firstNameError">This field is required.</small>
                    
                    <label for="middleName">Middle Name</label>
                    <input type="text" id="middleName" name="middleName">
                    
                    <label for="lastName">Last Name*</label>
                    <input type="text" id="lastName" name="lastName" required>
                    <small class="error-message" id="lastNameError">This field is required.</small>

                    <br><br>
                    <h2>Account Information</h2>
                    <label for="email">Email*</label>
                    <input type="email" id="email" name="email" required>
                    <small class="error-message" id="emailError">This field is required.</small>
                    <?php
                    if (isset($_SESSION['takenEmail']) && $_SESSION['takenEmail'] == true) {
                        echo '<div class="error email">Email already taken. Please use a different email.</div>';
                        unset($_SESSION['takenEmail']);
                    }
                    ?>
                    
                    <label for="password">Password*</label>
                    <div class="password-field">
                        <input type="password" id="password" name="password" required>
                        <span class="toggle-password" onclick="togglePassword('password')">
                            <i data-lucide="eye"></i>
                        </span>
                    </div>
                    <small id="passwordRequirements" class="requirements">
                        Must be at least 8 characters, contain upper and lowercase letters, and at least one number.
                    </small>
                    <small class="error-message" id="passwordError">This field is required.</small>
                    
                    <label for="confirmPassword">Confirm Password*</label>
                    <div class="password-field">
                        <input type="password" id="confirmPassword" name="confirmPassword" required>
                        <span class="toggle-password" onclick="togglePassword('confirmPassword')">
                            <i data-lucide="eye"></i>
                        </span>
                    </div>
                    <small class="error-message" id="confirmError">This field is required.</small>

                    <div class="button-group">
                        <button type="submit" id="submitReg" name="submitReg" onclick="check()">Next</button>
                    </div>
                </div>

                <p class="terms">By creating an account, you agree to our <a href="#">Terms of Service</a>.</p>
            </form>
        </div>
    </main>
    <script>
        lucide.createIcons();
        // Simulated database for email validation
        const existingEmails = ["test@example.com", "hello@domain.com"];

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
    </script>
</body>
</html>