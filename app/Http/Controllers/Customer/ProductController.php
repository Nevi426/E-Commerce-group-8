<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    // List all products + search + filter
    public function index(Request $request)
    {
        $query = Product::with(['images','store','category'])->where('stock','>',0);

        if ($request->filled('q')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%'.$request->q.'%')
                  ->orWhere('description', 'like', '%'.$request->q.'%');
            });
        }

        if ($request->filled('category')) {
            $query->where('product_category_id', $request->category);
        }

        $products = $query->orderByDesc('created_at')->paginate(12)->withQueryString();
        $categories = ProductCategory::all();

        return view('customer.products.index', compact('products','categories'));
    }

    // Product detail by slug
    public function show($slug)
    {
        $product = Product::with(['images','store','category','reviews'])
                    ->where('slug', $slug)
                    ->firstOrFail();

        return view('customer.products.show', compact('product'));
    }

    // Products by category
    public function category($id)
    {
        $category = ProductCategory::findOrFail($id);

        $products = Product::with(['images','store','category'])
                    ->where('product_category_id', $id)
                    ->where('stock', '>', 0)
                    ->orderByDesc('created_at')
                    ->get();

        return view('customer.products.category', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
