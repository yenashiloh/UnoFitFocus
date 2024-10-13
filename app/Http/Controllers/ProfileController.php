<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user(); // Get the authenticated user
        $userDetails = $user->userDetails;

        return view('profile.edit', [
            //'user' => $request->user(),
            'user' => $user,
            'userInfo' => $userDetails,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        Log::info('Trying to update user profile.'); 
    
        // Retrieve user info based on authenticated user's ID
        $user_info = UserDetails::where('user_id', Auth::id())->first();
    
        // Check if user_info exists
        if (!$user_info) {
            Log::error('UserDetails not found for user ID: ' . Auth::id());
            return Redirect::route('profile.edit')->with('error', 'User details not found.');
        }
        $userDetails = $user_info; // You already have the user_info
    
        // Check if userDetails exists
        if (!$userDetails) {
            Log::error('User relationship not found for user ID: ' . Auth::id());
            return Redirect::route('profile.edit')->with('error', 'User relationship not found.');
        }
    
        // Update user details
        $userDetails->first_name = $request->name;
        $userDetails->middle_name = $request->middle_name;
        $userDetails->last_name = $request->last_name;
        $userDetails->birthdate = $request->birthdate;
        $userDetails->height = $request->height;
        $userDetails->weight = $request->weight;
        $userDetails->gender = $request->gender;
    
        // Save the updated user info
        $userDetails->save();
    
        return Redirect::route('profile.edit')->with('status', 'Profile updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
