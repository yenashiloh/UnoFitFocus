<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/Login.css">
</head>
<body>
    @include('partials.navbar')
    <main>
        <div class="form-container">
            <form id="signInForm" action="Receiver.php" method="post">
                <h2>Sign In</h2>

                <div class="error-message">
                    <?php
                    if (isset($_SESSION['isValidEmail']) && $_SESSION['isValidEmail'] == false) {
                        echo '<span class="error-dialogue"> This email address is not connected to an account! Please double-check or register first.</span>';
                        unset($_SESSION['isValidEmail']);
                    } else if (isset($_SESSION['isValidPass']) && $_SESSION['isValidPass'] == false) {
                        echo '<span class="error-dialogue"> Your password is incorrect! Please try again.</span>';
                        unset($_SESSION['isValidPass']);
                    } 
                    ?>
                </div>
                
                <!-- Email Input -->
                <label for="email">Email*</label>
                <input type="email" id="email" name="email" required>
                <small class="error-message" id="emailError">This field is required.</small>

                <!-- Password Input -->
                <label for="password">Password*</label>
                <div class="password-field">
                    <input type="password" id="password" name="password" required>
                    <span class="toggle-password" onclick="togglePassword('password')">
                        <i data-lucide="eye"></i>
                    </span>
                </div>
                <small class="error-message" id="passwordError">This field is required.</small>

                <!-- Forgot Password Link -->
                <p class="forgot-password"><a href="#">Forgot Password?</a></p>

                <!-- Sign In Button -->
                <button type="submit" id="submitLog" name="submitLog" onclick="check()">Sign In</button>
            </form>
        </div>
    </main>
    <script src="../assets/js/Login.js"></script>
</body>
</html>