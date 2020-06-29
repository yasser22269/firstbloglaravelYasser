<?php

namespace App\Http\Controllers\back;

use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       $comment= Comment::all();
       $user= User::all();
       $post= Post::all();
       $category= Category::all();

        return view('dashboard.index',compact('comment','user','post','category'));
    }
}
