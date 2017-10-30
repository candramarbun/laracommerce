<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Response;

class ProductController extends Controller
{
    public function createProduct() {
      $categories = Category::where('parent_id', '=', 0)->pluck('title','id')->all();
      $allCategories = Category::pluck('title','id')->all();
      return view('product.create',compact('categories','allCategories'));
    }

    public function dropdownCat(Request $request) {

      if($request->ajax()){
    		$childs = Category::where('parent_id',$request->product_cat)->pluck("title","id")->all();
    		$data = view('product.ajax-select',compact('childs'))->render();
    		return response()->json(['options'=>$data]);
    	}
    }
}
