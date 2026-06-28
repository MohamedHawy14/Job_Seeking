<?php

namespace App\Contracts;

use App\Models\User;
use Illuminate\Http\Request;

interface AuthServiceInterface
{
    public function registerUser(array $data): User;

    public function logoutUser(Request $request): void;

    public function authenticateUser(array $credentials): bool;
}
