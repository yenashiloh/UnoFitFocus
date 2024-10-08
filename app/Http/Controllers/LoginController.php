<?php

namespace App\Http\Controllers;
use App\Models\LoginUser;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    protected function create(array $data)
    {
        // First, create a record in the li_user table
        $loginUser = LoginUser::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Then, create a record in the user_info table using the ID of the created login_info record
        // ifforeign key yung li_user_id tho kaya eon ung nilagay ko there, mali ba pag ganon
        UserDetails::create([
            'li_user_id' => $loginUser->id,
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
        ]);

        //return $loginUser; // Or return a user object if needed
        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:li_user'],
            'password' => [
                'required',
                'string',
                Password::min(8) // Minimum length
                    ->mixedCase() // At least one uppercase and one lowercase letter
                    ->numbers(), // At least one number
            ],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // Add other fields as necessary
        ]);
    }
}
