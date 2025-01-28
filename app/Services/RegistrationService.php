<?php
namespace App\Services;

use App\Models\User\User;
use Illuminate\Support\Facades\Auth;

class RegistrationService
{
    public function storeRegistrationData(array $validatedData): void
    {
        session()->put('registration_data', $validatedData);
    }

    public function getRegistrationData(): array
    {
        return session()->get('registration_data', []);
    }

    public function completeRegistration(array $userData, int $planId): User
    {
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => bcrypt($userData['password']),
            'payment_plans_id' => $planId,
        ]);

        session()->forget('registration_data');

        Auth::login($user);

        return $user;
    }
}