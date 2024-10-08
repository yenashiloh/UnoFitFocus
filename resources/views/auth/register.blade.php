<!--
<!DOCTYPE html>
<?php
//session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | FitFocus</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/Register.css">
</head>
<body>
    <!--header-->
    <!--
    <main>
        <div class="form-container">
            <form id="signUpForm" method="post" action="Receiver.php">
                <!-- Step 1: Personal Information -->
                <!--
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
                    //if (isset($_SESSION['takenEmail']) && $_SESSION['takenEmail'] == true) {
                    //    echo '<div class="error email">Email already taken. Please use a different email.</div>';
                    //    unset($_SESSION['takenEmail']);
                    //}
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
    <script src="../assets/js/Exercises.js"></script>
</body>
</html>
-->

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- First Name -->
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <x-input-label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Middle Name (Optional) -->
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <x-input-label for="middle_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Middle Name')" />
            <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" type="text" name="middle_name" :value="old('middle_name')" autocomplete="additional-name" />
            <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <x-input-label for="last_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autocomplete="family-name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <x-input-label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <x-input-label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <x-input-label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
