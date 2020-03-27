<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Tag::first()->posts); // menampilkan array of object melalui collection
        //dd(Tag::first()->posts()); // menampilkan relationship-nya
        //dd(Tag::first()->posts()->where('published_at', now())->get()); // menampilkan collection saja
        //dd(Tag::first()->posts()->where('published_at', now())); // menampilkan relationship-nya sekarang
        //dd(Tag::first()->posts()->get()); // array of results (collection)
        //dd(Tag::first()->posts());//array of results (collection) that belongs to this Tag

        //return view('tags.index')->with('tags', Tag::all());
        return view('tags.index')->with('tags', Tag::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        //$this->validate(request()); // tidak efisien
        //$this->validate($request, [
        //    'name'=>'required|unique:tags'
        //]);


        //LEBIH AMAN MEMAKAI INI
        //$ntag = new Tag();
        Tag::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Tag created successfully.');

        /*TIDAK DISARANKAN MEMAKAI INI
        Tag::create($request->all());
        */

        //return redirect('/Tags');
        return redirect(route('tags.index'));
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
    public function edit(Tag $tag) // memakai route model binding
    {
        return view('tags.create')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name
        ]);
        //$Tag->name=$request->name;
        //$Tag->save();

        session()->flash('success', 'Tag updated successfully.');

        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        // mengecek apakah tag memiliki post atau tidak
        if ($tag->posts->count() > 0) {
            session()->flash('error', 'Tag cannot be deleted, because there are posts related to it.');
            return redirect()->back();
        }

        $tag->delete();

        session()->flash('success', 'Tag delete successfully.');

        return redirect(route('tags.index'));
    }
}
