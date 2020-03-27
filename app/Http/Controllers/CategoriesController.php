<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Category::first()->posts); // menampilkan array of object melalui collection
        //dd(Category::first()->posts()); // menampilkan relationship-nya
        //dd(Category::first()->posts()->where('published_at', now())->get()); // menampilkan collection saja
        //dd(Category::first()->posts()->where('published_at', now())); // menampilkan relationship-nya sekarang
        //dd(Category::first()->posts()->get()); // array of results (collection)
        //dd(Category::first()->posts());//array of results (collection) that belongs to this category

        //return view('categories.index')->with('categories', Category::all());
        return view('categories.index')->with('categories', Category::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        //$this->validate(request()); // tidak efisien
        //$this->validate($request, [
        //    'name'=>'required|unique:categories'
        //]);


        //LEBIH AMAN MEMAKAI INI
        //$ncategory = new Category();
        Category::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Category created successfully.');

        /*TIDAK DISARANKAN MEMAKAI INI
        Category::create($request->all());
        */

        //return redirect('/categories');
        return redirect(route('categories.index'));
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
    public function edit(Category $category) // memakai route model binding
    {
        return view('categories.create')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name
        ]);
        //$category->name=$request->name;
        //$category->save();

        session()->flash('success', 'Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // mengecek apakah category memiliki post atau tidak
        if ($category->posts->count() > 0) {
            session()->flash('error', 'Category cannot be deleted, because there are posts related to it.');
            return redirect()->back();
        }

        $category->delete();

        session()->flash('success', 'Category delete successfully.');

        return redirect(route('categories.index'));
    }
}
