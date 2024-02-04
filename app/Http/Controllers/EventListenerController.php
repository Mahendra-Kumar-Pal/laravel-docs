<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Events\PostEvent;
use Illuminate\Http\Request;

class EventListenerController extends Controller
{
    public function createPost(Request $request)
    {
        $post = [
            'title' => fake()->title(),
            'description' => fake()->paragraph()
        ];
        Post::create($post);
        
        $email = 'user@gmail.com';
        event(new PostEvent($email));
        // return back()->withSuccess('Post created & Notified');
        return redirect()->route('/');
    }
}
