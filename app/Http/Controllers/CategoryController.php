<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
      return view('category.index');
    }

    public function manageCategory() {
      $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::pluck('title','id')->all();
        return view('category.manageCategory',compact('categories','allCategories'));
    }

    public function addCategory(Request $request) {
      $this->validate($request, [
        'title'=>'required',
      ]);
      $input = $request->all();
      $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
      Category::create($input);

      return back()->with('success','new Category Added Successfully..!');
    }
}
