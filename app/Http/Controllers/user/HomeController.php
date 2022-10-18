<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;

use App\Models\category;


class HomeController extends Controller
{
public function index()
{
    $posts = post::where('status',3)->orderBy('created_at','DESC')->paginate(5);
    return view('user/home',compact('posts'));
}
public function category(category $category)
{
    $posts = $category->posts();
    return view('user/home',compact('posts'));
}
}
