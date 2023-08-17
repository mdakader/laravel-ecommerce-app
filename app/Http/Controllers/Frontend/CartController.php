<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    /** Add to cart */
    public function addToCart(Request $request)
    {

        $product = Product::findOrFail($request->product_id);
        $variants = [];

        $variantTotalAmount = 0;
        if ($request->has('variants_items')) {
            foreach ($request->variants_items as $item_id) {
                $variantItem = ProductVariantItem::find($item_id);
                $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                $variants[$variantItem->productVariant->price]['price'] = $variantItem->price;
                $variantTotalAmount += $variantItem->price;
            }
        }


        /**  Check discount  */

        $productPrice = 0;

        if (checkDiscount($product)) {
            $productPrice = ($product->offer_price + $variantTotalAmount);
        } else {
            $productPrice = ($product->price + $variantTotalAmount);
        }

        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product->name;
        $cartData['qty'] = $product->qty;
        $cartData['price'] = $productPrice;
        $cartData['weight'] = 10;
        $cartData['options']['variants'] = $variants;
        $cartData['options']['image'] = $product->thumb_image;
        $cartData['options']['slug'] = $product->slug;

        Cart::add($cartData);

        return response(['status' => 'success', 'message' => 'Added to cart successfully!']);

    }
}
