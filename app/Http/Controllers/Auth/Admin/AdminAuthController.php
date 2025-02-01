<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\Auth\LoginRequest;


class AdminAuthController extends Controller
{
  protected $authService;

  public function __construct(AuthService $authService)
  {
    $this->authService = $authService;
  }

  public function show_login()
  {
    return view('admin.auth.login');
  }


  public function login(LoginRequest $request)
  {
    if ($this->authService->admin_login($request)) {
      return redirect()->route('admin.home');
    }
  }

  public function logout(Request $request)
  {
    return $this->authService->logout($request, 'admin', 'show.admin.login');
  }
}
