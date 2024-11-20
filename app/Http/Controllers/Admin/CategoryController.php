<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class CategoryController extends Controller
{

    public static function getParentsTree($category, $title)

    {
        if ($category->parentid == 0) {
            return $title;
        }
        $parent = Category::find($category->parentid);
        $title = $parent->title . " > " . $title;


        return self::getParentsTree($parent, $title);

    }

    /**
     * Display a listing of the resource.
     */


    public function index()
    {


        if (Category::count() == 0) {
            Artisan::call('db:seed', ['--class' => 'CategorySeeder']);
        }

        $categories = Category::where('parentid', '!=', 0)->with('children')->get();

        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::select("id", "title")->where("parentid", 0)->get();


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
    public function edit(Category $category, $id)
    {
        $category = Category::find($id);
        $allcategories = Category::select("id", "title")->where("parentid", 0)->get();

        return view('admin.category_edit', ['category' => $category, 'allcategories' => $allcategories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category, $id)
    {
        $category = Category::find($id);
        $this->bilgileriAl($request, $category);

        return redirect()->route('admincategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, $id)
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
        $category->keywords = $request->input('keywords')==""?$category->title . " ilanları":$request->input('keywords');
        $category->description = $request->input('description')==""?$category->title . " açıklaması":$request->input('description');;
        $category->slug = $request->input('slug') == ""
            ? Str::slug($category->title)
            : $request->input('slug');
        $category->status = $request->input('status');
        $category->save();
    }
}
