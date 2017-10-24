<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //==============Category===================
    public function IndexCategory() {
      return view('category.index');
    }
}
