<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $categories = Category::all();
        $data = DB::table('categories')->get();
        // dd($categories);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create')->with('user', Auth::user());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $result = $this->categoryService->createCategory($request, $data);
    
        if ($result) {
            return back()->with('success', 'Category created successfully!');
        } else {
            return back()->with('error', 'Category creation failed!');
        }
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $extention = $file->extension();
        //     $qid  = Category::all()->last()->id;
        //     $filename = $request->name . '.' . $extention;
        //     $request->image->move(public_path('/assets/img/category/'), $filename);
        // }
        // $data = [
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'image' => $filename ?? '',
        //     'active' => $request->active,
        // ];
        // // dd($data);
        // $cat = Category::create($data);
        // if ($cat) {
        //     return back()->with('success', 'Category ' . $cat->id . ' has been created Successfully!');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'))->with('user', Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'))->with('user', Auth::user());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
       
        $data = $request->all();
        $result = $this->categoryService->updateCategory($category, $request, $data);

        if ($result) {
            return back()->with('success', "Update Successfully!");
        } else {
            return back()->with('error', "Update Failed!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (Category::destroy($category->id)) {
            return back()->with('success', $category->id . ' has been deleted!');
        } else {
            return back()->with('error', 'Delete Failed!');
        }
    }
    public function catapi(){
        $cat = Category::all();
        return response()->json($cat);
    }
}
