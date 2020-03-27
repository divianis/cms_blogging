<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Category;
use App\Tag;

use Storage;

//use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    // membuat constructor baru
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']); // only adalah method
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('posts.index')->with('posts', Post::all());
        return view('posts.index')->with('posts', Post::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request) // Memakai route model binding
    {
        // upload image
        // dd($request->image->store('posts'));
        // dd($request->all());

        $image = $request->image->store('posts');

        // create post
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category,
            'user_id' =>auth()->user()->id // untuk user yang membuat postingan
        ]);

        if ($request->tags) {
            $post->tags()->attach($request->tags); // attach() karena belongsToMany
        }

        // flash message
        session()->flash('success', 'Post created successfully');

        // redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //dd($post->tags->pluck('id')->toArray());
        return view('posts.create')
            ->with('post', $post)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // $data=$request->all();
        $data = $request->only(['title', 'description', 'content', 'category_id', 'published_at']);
        // check if new image
        if ($request->hasFile('image')) {

            // upload it
            $image = $request->image->store('posts');

            // delete old one
            //Storage::delete($post->image); // perlu route model binding 'Post $post'
            $post->deleteImage();
            $data['image'] = $image;
        }

        // cek jika user memilih tag yang berbeda dari yang sebelumnya dalam editing
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        // update attribute
        $post->update($data);

        // flash message
        session()->flash('success', 'Post updated successfully.');

        // redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail(); // method 'firstOrFail()' akan melempar eksepsi (404) jika record tidak ada di DB

        if ($post->trashed()) {
            //Storage::delete($post->image);
            $post->deleteImage();
            $post->forceDelete();
            session()->flash('success', 'Post permanently deleted.');
        } else {
            $post->delete();
            session()->flash('success', 'Post moved to trash successfully.');
        }

        return redirect()->back();
    }

    /**
     * Display a list from deleted posts that move in trash
     *
     * @return \Illuminate\Http\Response
     */

    public function trashed()
    {
        //$trashed=Post::withTrashed()->get(); // fetch seluruh post
        //$trashed = Post::onlyTrashed()->get(); // fetch trashed post saja

        ////$trashed = Post::onlyTrashed()->get();

        //return view('posts.index')->withPosts($trashed);

        return view('posts.index')->with('posts', Post::onlyTrashed()->paginate(5));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();

        session()->flash('success', 'Post has been restored successfully.');

        return redirect()->back();
    }
}
