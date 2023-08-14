<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(ProductVariantDataTable $dataTable, string $productId)
    {
        $product = Product::findOrFail($productId);
        return $dataTable->render('admin.product.product-variant.index', compact('product'));
    }

    public function create(string $productId)
    {
        $product = Product::findOrFail($productId);
        return view('admin.product.product-variant.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product' => ['integer', 'required'],
            'name' => ['required', 'max:200'],
            'status' => ['required']
        ]);

        $varinat = new ProductVariant();
        $varinat->product_id = $request->product;
        $varinat->name = $request->name;
        $varinat->status = $request->status;
        $varinat->save();

        toastr('Created Successfully!', 'success', 'success');

        return redirect()->route('admin.products-variant.index', ['productId' => $request->product]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        return view('admin.product.product-variant.edit', compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'status' => ['required']
        ]);

        $varinat = ProductVariant::findOrFail($id);
        $varinat->name = $request->name;
        $varinat->status = $request->status;
        $varinat->save();

        toastr('Updated Successfully!', 'success', 'success');

        return redirect()->route('admin.products-variant.index', ['productId' => $varinat->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        $variant->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);

    }


    public function changeStatus(Request $request)
    {
        $varinat = ProductVariant::findOrFail($request->id);
        $varinat->status = $request->status == 'true' ? 1 : 0;
        $varinat->save();

        return response(['message' => 'Status has been updated!']);
    }
}
