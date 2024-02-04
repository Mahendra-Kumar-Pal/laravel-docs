<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\User;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
    public function all()
    {
        return Blog::paginate(10);
    }

    public function getByUser(User $user)
    {
        return Blog::where('user_id', $user->id)->paginate(10);
    }
}