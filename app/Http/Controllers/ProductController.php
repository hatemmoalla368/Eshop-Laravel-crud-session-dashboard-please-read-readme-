<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(Request $request)
{
    // Fetch all categories
    $categories = Category::all();

    // Get search parameters
    $searchTerm = $request->input('search');
    $category = $request->input('category');

    // Query to search products
    $products = Product::query();

    if ($searchTerm) {
        $products = $products->where('name', 'LIKE', '%' . $searchTerm . '%');
    }

    if ($category) {
        $products = $products->where('category_id', $category);
    }

    $products = $products->get();

    return view('search_results', compact('categories', 'products'));
}


}
