<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Models\PaymentPlan\paymentPlan;
use App\Services\AuthService;
use App\Services\RegistrationService;
use App\Http\Requests\Auth\RegisterStepOneRequest;
use App\Http\Requests\Auth\RegisterStepTwoRequest;



class UserAuthController extends Controller
{
  protected $authService;
  protected $registrationService;

  public function __construct(AuthService $authService, RegistrationService $registrationService)
  {
    $this->authService = $authService;
    $this->registrationService = $registrationService;
  }

  public function show_register_step_one()
  {
    return view('auth.register.step-one');
  }

  public function process_register_step_one(RegisterStepOneRequest $request)
  {
    $this->registrationService->storeRegistrationData($request->validated());

    return redirect()->route('register.step-two');
  }

  public function show_register_step_two()
  {
    $plans = PaymentPlan::all();
    return view('auth.register.step-two', compact('plans'));
  }

  public function process_register_step_two(RegisterStepTwoRequest $request)
  {
    $userData = $this->registrationService->getRegistrationData();

    if (empty($userData)) {
      return redirect()->route('register.step_one')->with('error', 'Registration data not found. Please start over.');
    }

    $user = $this->registrationService->completeRegistration($userData, $request->plan_id);

    return redirect()->route('user.home');
  }

  public function show_login()
  {
    return view('auth.login');
  }

  public function login(LoginRequest $request)
  {
    if ($this->authService->login($request)) {
      return redirect()->route('user.home');
    }
  }

  public function logout(Request $request)
  {
    return $this->authService->logout($request);
  }
}
