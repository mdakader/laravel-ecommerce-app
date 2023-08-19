<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendProductController extends Controller
{
    /** Show Product Shop Page */
    public function productsIndex(Request $request){
        if($request->has('category')) {
            $category = Category::where('slug', $request->category)->firstOrFail();
            $products = Product::where([
                'category_id' => $category->id,
                'status' => 1,
                'is_approved' => 1
            ])->paginate(2);
        }
        $categories = Category::where(['status' => 1])->get();
        $products = Product::where(['status' => 1, 'is_approved' => 1])->orderBy('id', 'DESC')->paginate(12);
        return view('frontend.pages.product', compact('categories','products' ));
    }
    /** Show product details page */
    public function showProduct(string $slug){
        $product = Product::with(['vendor', 'category', 'productImageGalleries', 'variants', 'brand'])->where('slug', $slug)->where('status', 1)->first();
        return view('frontend.pages.product-details', compact('product'));
    }

    public function chageListView(Request $request)
    {
        Session::put('product_list_style', $request->style);
    }
}
