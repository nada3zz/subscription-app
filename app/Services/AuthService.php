<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User\User;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class AuthService
{
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->first();

        if ($user && $user->is_active) {
            if (Auth::attempt($validated)) {
              $request->session()->regenerate();
              return true;
            }
          }

          throw ValidationException::withMessages([
            'credentials' => 'Sorry, incorrect credentials',
          ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show.login')->with('success', 'You have been logged out successfully.');
    }

    
}

