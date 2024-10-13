<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Profile Information (View-Only Mode) -->
            <div id="profile-view" class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Profile Information') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("View your profile details here.") }}
                        </p>
                    </header>

                    <div class="mt-4">
                        <img class="rounded-full w-24 h-24" src="{{ asset('uploads/profile_pics/' . $userInfo->profile_pic) }}" alt="Profile picture">
                        <strong>First Name:</strong> {{ $userInfo->first_name }}<br>
                        <strong>Middle Name:</strong> {{ $userInfo->middle_name }}<br>
                        <strong>Last Name:</strong> {{ $userInfo->last_name }}<br>
                        <strong>Email:</strong> {{ $user->email }}<br>
                        <strong>Birthdate:</strong> {{ $userInfo->birthdate }}<br>
                        <strong>Height:</strong> {{ $userInfo->height }} cm<br>
                        <strong>Weight:</strong> {{ $userInfo->weight }} kg<br>
                        <strong>Gender:</strong> {{ $userInfo->gender }}
                    </div>

                    <!-- Button to enable edit mode -->
                    <x-primary-button id="edit-profile-btn" class="mt-4"> {{ __('Edit Profile') }} </x-primary-button>
                </div>
            </div>

            <!-- Profile Update Form (Edit Mode) - Hidden by default -->
            <div id="profile-edit" class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="display:none;">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Password Change Section -->
            <div id="password-view" class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Update Password') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Click the Change Password button to change your password.") }}
                        </p>
                    </header>
                    <x-primary-button id="edit-password-btn" class="mt-4"> {{ __('Change Password') }} </x-primary-button>
                </div>
            </div>

            <div id="password-edit" class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="display:none;">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.getElementById('edit-profile-btn').addEventListener('click', function() {
        // Hide the view-only mode and show the edit form
        document.getElementById('profile-view').style.display = 'none';
        document.getElementById('profile-edit').style.display = 'block';
    });
    document.getElementById('edit-password-btn').addEventListener('click', function() {
        // Hide the password display and show the edit form
        document.getElementById('password-view').style.display = 'none';
        document.getElementById('password-edit').style.display = 'block';
    });
</script>