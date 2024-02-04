<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\BlogRepository;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class RepositoryInterfaceController extends Controller
{
    private $blogRepositoryInterface;

    public function __construct(BlogRepositoryInterface $blogRepositoryInterface)
    {
        $this->blogRepositoryInterface = $blogRepositoryInterface;
    }

    public function index()
    {
        $blogs = $this->blogRepositoryInterface->all();
        return view('blog')->with('blogs', $blogs);
    }

    public function detail($id)
    {
        $user = User::find($id);
        $blogs = $this->blogRepositoryInterface->getByUser($user);
        return view('blog')->with('blogs', $blogs);
    }
}
