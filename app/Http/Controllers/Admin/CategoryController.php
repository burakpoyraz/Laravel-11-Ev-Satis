<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::select("id", "title")->get();

       return view('admin.category_add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $this->bilgileriAl($request, $category);

        return redirect()->route('admincategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category,$id)
    {
        $category=Category::find($id);
        $allcategories = Category::select("id", "title")->get();

        return view('admin.category_edit', ['category'=>$category, 'allcategories'=>$allcategories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category,$id)
    {
        $category=Category::find($id);
        $this->bilgileriAl($request, $category);

        return redirect()->route('admincategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category,$id)
    {
        Category::destroy($id);

        return redirect()->route('admincategory');
    }

    /**
     * @param Request $request
     * @param $category
     * @return void
     */
    public function bilgileriAl(Request $request, $category): void
    {
        $category->parentid = $request->input('parentid');
        $category->title = $request->input('title');
        $category->keywords = $request->input('keywords');
        $category->description = $request->input('description');
        $category->slug = $request->input('slug');
        $category->status = $request->input('status');
        $category->save();
    }
}
