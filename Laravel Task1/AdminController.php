<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function index()
    {
        return view('admin');
    }
    function category()
    {
        $categories = Category::all();
        return view('category')->with('categories', $categories);
    }
}