<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'categories' => ProductCategory::all(),
            'products' => Product::latest()->take(12)->get(),
        ]);
    }
}
