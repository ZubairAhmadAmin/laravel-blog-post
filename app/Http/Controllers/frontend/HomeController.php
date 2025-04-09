<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        return view('frontend.home.index')
                    ->with('posts', Post::orderby('created_at', 'DESC')->paginate(5));
    }

    public function show ($slug) {
        $post = Post::where('slug', $slug)->first();
        return view('frontend.home.show')
                    ->with('post', $post);
    }
}
