<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->active()->inStock()->latest()->paginate(12);
        return view('products.index', compact('products'));
    }

    // BONUS: demo N+1 vs eager loading
    public function demoEager()
    {
        DB::enableQueryLog();
        foreach (Product::take(10)->get() as $p) { $p->category->name; }
        $lazy = count(DB::getQueryLog());

        DB::flushQueryLog();
        foreach (Product::with('category')->take(10)->get() as $p) { $p->category->name; }
        $eager = count(DB::getQueryLog());

        return response()->json([
            'tanpa_eager_loading' => "$lazy query (masalah N+1)",
            'dengan_eager_loading' => "$eager query",
        ]);
    }
}