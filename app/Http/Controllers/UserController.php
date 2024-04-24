<?php

namespace App\Http\Controllers;

// php artisan make:controller UserController

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:16']
        ]);
        // hashing password
        $incomingFields['password'] = bcrypt($incomingFields['password']);

        // php artisan migrate
        # new instance of user model
        User::create($incomingFields);

        return response(json_encode('From user controller'));
    }
}
