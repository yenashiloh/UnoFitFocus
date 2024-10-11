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
        // $user = $request->user(); // Get the authenticated user
        // $userDetails = $user->userDetails;

        // $request->user()->fill($request->validated());

        // $user = $request->user(); // Get the authenticated user
        // $userDetails = $user->userDetails; // Assuming 'userDetails' is a relationship

        // // Update fields in the users table (if any, like email)
        // $user->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $user->save();

        // $request->user()->save();

        $user = $request->user(); // Get the authenticated user
        $userDetails = $user->userDetails;
        // $user_info = UserDetails::where('user_id', Auth::id())->first();

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $userDetails->first_name = $request->first_name;
        $userDetails->middle_name = $request->middle_name;
        $userDetails->last_name = $request->last_name;
        $userDetails->birthdate = $request->birthdate;
        $userDetails->height = $request->height;
        $userDetails->weight = $request->weight;
        $userDetails->gender = $request->gender;

        $userDetails->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
