<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function registerWithEmail(string $email, string $password): User
    {
        return User::create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }

    public function loginWithEmail(string $email, string $password): ?User
    {
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }

    public function registerOrLoginWithGoogle(array $googleUser): User
    {
        return User::firstOrCreate(
            ['email' => $googleUser['email']],
            ['google_id' => $googleUser['id']]
        );
    }
}
