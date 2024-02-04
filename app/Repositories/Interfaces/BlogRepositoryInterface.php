<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface BlogRepositoryInterface
{
    public function all();

    public function getByUser(User $user);
}