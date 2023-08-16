<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    /** Show product details page */
    public function showProduct(string $slug){
        return view('frontend.pages.product-details');
    }
}
