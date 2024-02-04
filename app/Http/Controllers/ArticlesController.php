<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticlesController extends Controller
{
     // Returns all 500 articles with Caching
    public function index()
    {
        return Cache::remember('articles', 60, function () {
            return Article::all();
        });
    }

    // Returns all 500 without Caching 
    public function allWithoutCache() {
        return Article::all();
    }
}
