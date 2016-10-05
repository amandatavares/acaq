<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category as Category;

class CategoryController extends Controller
{
    public function index($id) {
        $category = Category::find($id);
        return view('categories')
            ->with('category', $category);
    }


    public function index1() {
        $categories = Category::all();
        return view('perguntas.categories')
            ->with('categories', $categories);
    }
}
