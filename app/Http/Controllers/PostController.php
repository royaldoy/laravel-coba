<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public function all()
    {
        // return "aaa";
        // dd(request('search'));
        $title = "";
        if (request('category')) {
            $category = Category::firstwhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $user = User::firstwhere('username', request('author'));
            $title = ' by ' . $user->name;
        }

        return view('home', [
            "login" => "Login Form",
            "title" => "All Post" . $title,
            "active" => "home",
            "post" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function cari()
    {
        $post = Post::latest();

        if (request('search')) {
            $post->where('title', 'like', '%' . request('search') . '%');
        }

        return view('home', [
            "login" => "Login Form",
            "title" => "Daftar Buku",
            "active" => "home",
            "post" => $post->get()
        ]);
    }

    public function show(Post $post)
    {
        // return $post;
        return view('single', [
            "title" => "Detail Buku",
            "active" => "blog",
            "post" => $post
        ]);
    }

    public function show2($post)
    {
        // return Post::find($post)

        $a = Post::all();
        return view('single', [
            "title" => "Detail Buku",
            "post" => Post::find($post),
            "active" => "blog",
        ]);
    }
}
