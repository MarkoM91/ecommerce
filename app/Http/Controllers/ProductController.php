<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch the 4 latest products for New Arrivals
      $featuredProducts = Product::latest()->take(4)->get();



        // Pass both variables to the view
        return view('welcome', compact('featuredProducts'));
    }
}
