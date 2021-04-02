<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('home')->with([
            'posts' => $posts
        ]);
    }
}
