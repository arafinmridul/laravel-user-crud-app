<?php

namespace App\Http\Controllers;

// php artisan make:controller UserController
// php artisan migrate // for db tables creation

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:16']
        ]);
        // hashing password
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        # new instance of user model
        $user = User::create($incomingFields);
        auth()->login($user);

        return redirect('/');
        // return response(json_encode('From user controller'));
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/');
    }
}
