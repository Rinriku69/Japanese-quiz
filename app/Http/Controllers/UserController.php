<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Psr\Http\Message\ServerRequestInterface;
use ValidateRequests;

class UserController extends Controller
{
    function register_form(): View{
        return view('users.register');
    }

    function register(ServerRequestInterface $request): RedirectResponse{
        $users = User::create($request->getParsedBody());

        return redirect()->route('user.login');
    }

    function login_form(): View{
        return view('users.login');
    }

    function login(ServerRequestInterface $request): RedirectResponse{
     
        $credentials = $request->getParsedBody();

        // 2. Manually validate the data using Laravel's Validator facade.
        $validator = Validator::make($credentials, [
            'name' => 'required',
            'password' => 'required',
        ]);

        // 3. Check if validation fails.
        if ($validator->fails()) {
            return redirect()->route('user.login_form', ['message' => 'Name and password are required.']);
        }

        $user_data = User::where('name', $credentials['name'])->first();

        // 5. Check if the user exists and the password is correct using Hash::check().
        if ($user_data && Hash::check($credentials['password'], $user_data->password)) {
            // 6. Manually start and set the session.
            // Laravel middleware usually handles session_start(), but we do it here to be explicit.
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['username'] = $user_data->name;

            return redirect()->route('home.main');
        } else {
            // For security, use a generic error message.
            return redirect()->route('user.login_form', ['message' => 'Login failed']);
        }

    }

    function logout() : RedirectResponse{
        session_start();
        session_destroy();
        session_unset();
        return redirect()->route('home.main');
    }


}
