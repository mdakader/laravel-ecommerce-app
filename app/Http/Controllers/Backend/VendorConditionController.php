<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VendorCondition;
use Illuminate\Http\Request;

class VendorConditionController extends Controller
{
    public function index()
    {
        $vendorConditions = VendorCondition::first();
        return view('admin.vendor-condition.index', compact('vendorConditions'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'contents' => ['required']
        ]);

        VendorCondition::updateOrCreate(
            ['id' => 1],
            [
                'contents' => $request->contents
            ]
        );

        toastr('updated successfully!', 'success', 'success');

        return redirect()->back();

    }
}
