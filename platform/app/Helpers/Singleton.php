<?php

declare(strict_types=1);

namespace App\Helpers;
use App\Models\User;

class Singleton
{
    public User $user;
    public function __construct(int $userId)
    {
        $this->user = User::find($userId);
    }
}
