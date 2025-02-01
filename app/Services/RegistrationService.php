<?php
namespace App\Services;

use App\Models\User\User;
use App\Models\Plan\Plan;
use App\Models\Subscription\Subscription;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


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
        DB::transaction(function () use ($userData, $planId, &$user) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => bcrypt($userData['password']),
                'plan_id' => $planId,
            ]);
        
            $plan = Plan::findOrFail($planId);
        
            if ($plan->name === 'monthly') {
                $endDate = now()->addMonth(); 
            } else {
                $endDate = now()->addYear();
            } 

            Subscription::create([
                'user_id' => $user->id,
                'plan_id' => $planId,
                'start_date' => now(),
                'end_date' => $endDate,
            ]);

        });

        session()->forget('registration_data');

        Auth::login($user);

        return $user;
    }
}