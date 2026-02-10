<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $selectedSlug = $request->query('category');

        $categories = Category::query()
            ->orderBy('name')
            ->get();

        $postsQuery = Post::query()
            ->with('category')
            ->orderBy('title');

        if ($selectedSlug) {
            $postsQuery->whereHas('category', function ($query) use ($selectedSlug) {
                $query->where('slug', $selectedSlug);
            });
        }

        $posts = $postsQuery->get();

        return view('posts.index', [
            'categories' => $categories,
            'posts' => $posts,
            'selectedSlug' => $selectedSlug,
        ]);
    }
}
