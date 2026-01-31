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
    function register_form(): View
    {
        return view('users.register');
    }

    function register(ServerRequestInterface $request): RedirectResponse
    {
        $users = User::create($request->getParsedBody());

        return redirect()->route('user.login');
    }

    function login_form(): View
    {
        return view('users.login');
    }

    function login(ServerRequestInterface $request): RedirectResponse
    {

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

        if (Auth::attempt(['name' => $credentials['name'], 'password' => $credentials['password']])) {
            $request = request(); // Get global request helper since ServerRequestInterface doesn't have session() easily accessible in this context without conversion or dependency injection of Illuminate Request
            $request->session()->regenerate();

            return redirect()->route('home.main');
        }

        // For security, use a generic error message.
        return redirect()->route('user.login_form', ['message' => 'Login failed']);
    }

    function logout(): RedirectResponse
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home.main');
    }


    function profile(): View|RedirectResponse
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('user.login_form');
        }

        // Eager load quiz attempts ordered by latest
        $attempts = $user->quizAttempts()->orderBy('created_at', 'desc')->get();

        return view('users.profile', [
            'user' => $user,
            'attempts' => $attempts
        ]);
    }

    function show_attempt($id): View|RedirectResponse
    {
        $attempt = \App\Models\QuizAttempt::with('answers')->find($id);

        if (!$attempt || $attempt->user_id !== Auth::id()) {
            return redirect()->route('user.profile')->with('error', 'Attempt not found or unauthorized.');
        }

        return view('users.attempt_detail', [
            'attempt' => $attempt
        ]);
    }

    function destroy_attempt($id): RedirectResponse
    {
        $attempt = \App\Models\QuizAttempt::find($id);

        if ($attempt && $attempt->user_id === Auth::id()) {
            $attempt->delete();
        }

        return redirect()->route('user.profile')->with('success', 'Quiz attempt deleted.');
    }
}
