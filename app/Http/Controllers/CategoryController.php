<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category as Category;

class CategoryController extends Controller
{
    //
    public function index() {
      $categories = Category::all();

    }
}