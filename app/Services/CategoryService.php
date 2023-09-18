<?php
namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    public function createCategory(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->extension();
            $qid  = Category::all()->last()->id;
            $filename = $request->name . '.' . $extention;
            $request->image->move(public_path('/assets/img/category/'), $filename);
        }
        $categoryData  = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename ?? '',
            'active' => $request->active,
        ];
        // dd($data);
        $cat = Category::create($categoryData);
        return $cat;
    }

    public function updateCategory(Category $category, Request $request)
    {
        if ($request->hasFile('image')) {
            if ($category->image) {
                $exfile = $category->image;
                $filePath = public_path('/assets/img/category/') . $exfile; // Change this to the actual path of the image you want to delete

                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
                Storage::delete($category->image);
            }
            $file = $request->file('image');
            $extention = $file->extension();
            $qid  = $category->name;
            $filename = $qid . '.' . $extention;
            $request->image->move(public_path('/assets/img/category/'), $filename);
        }
        $categorydata = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename ?? $category->image,
            'active' => $request->active,
        ];

        $catup=$category->update($categorydata);
        return $catup;
    }

    public function deleteCategory(Category $category)
    {
        // Implement the logic for deleting a category, including file handling
    }
}