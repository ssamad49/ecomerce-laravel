<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFromRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
{
      return view('admin.category.index');

}
public function create()
{
  return view('admin.category.create');
}
public function store(CategoryFromRequest $request)
{
       $validatedData = $request->validated();

      $category =new Category;

      $category->name = $validatedData['name'];
      $category->slug = Str::slug($validatedData['name']);
      $category->description = $validatedData['description'];

      if($request->hasFile('image')){
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $fillename = time().'.'.$ext;
        $file->move('uploads/category/',$fillename);
        $category->image = $fillename;
      }


      $category->meta_title = $validatedData['meta_title'];
      $category->meta_keyword = $validatedData['meta_keyword'];
      $category->meta_description = $validatedData['meta_description'];
      $category->status = $request->status == true ? '1':'0';

      $category->save();

      return redirect('admin/category')->with('message','category Add Successfully');

}

      public function edit(Category $category){

          return view('admin.category.edit', compact('category'));
      }
      public function update(CategoryFromRequest $request ,$category)

      {
         $validatedData = $request->validated();

        $category = Category::findOrFail($category);

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['name']);
        $category->description = $validatedData['description'];

        if($request->hasFile('image')){
          $path = 'uploads/category/'.$category->image;
          if(File::exists($path)){
            File::delete($path);
          }

          $file = $request->file('image');
          $ext = $file->getClientOriginalExtension();
          $fillename = time().'.'.$ext;
          $file->move('uploads/category/',$fillename);
          $category->image = $fillename;
        }


        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1':'0';

        $category->update();

        return redirect('admin/category')->with('message','category Updated Successfully');
      }

}
