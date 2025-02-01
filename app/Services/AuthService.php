<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User\User;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;

class AuthService
{

  public function login(LoginRequest $request): bool
  {
    return $this->perform_login($request, User::class, 'web');
  }

  public function admin_login(LoginRequest $request): bool
  {
    return $this->perform_login($request, Admin::class, 'admin');
  }

  public function logout(Request $request, string $guard, string $route = 'show.login')
  {
    Auth::guard($guard)->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route($route)->with('success', 'You have been logged out successfully.');
  }



  private function perform_login(LoginRequest $request, string $model, string $guard): bool
  {
    $validated = $request->validated();
    $user = $model::where('email', $validated['email'])->first();
    if ($user && $user->is_active) {
      if (Auth::guard($guard)->attempt($validated)) {
        $request->session()->regenerate();
        return true;
      }
    }

    throw ValidationException::withMessages([
      'credentials' => 'Sorry, incorrect credentials',
    ]);
  }
}
