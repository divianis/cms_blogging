<?php

namespace App\Http\Controllers\Blog;

use App\Tag;
use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show')
            ->with('post', $post);
    }

    public function category(Category $category)
    {
//        $search = request()->query('search');
//        if ($search) {
//            $posts = $category->posts()
//                ->where('title', 'LIKE', "%($search)%")->simplePaginate(4);
//        } else {
//            $posts = $category->posts()->simplePaginate(4);
//        }


        return view('blog.category')
            ->with('category', $category)
            //->with('posts', $category->posts()->simplePaginate(4))
            //->with('posts', $posts)
            ->with('posts', $category->posts()->searched()->simplePaginate(6))
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function tag(Tag $tag)
    {
        return view('blog.tag')
            ->with('tag', $tag)
            //->with('posts', $tag->posts()->simplePaginate(4))
            ->with('posts', $tag->posts()->searched()->simplePaginate(6))
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }
}
