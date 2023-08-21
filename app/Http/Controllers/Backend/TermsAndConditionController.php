<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TermsAndCondition;
use Illuminate\Http\Request;

class TermsAndConditionController extends Controller
{
    public function index()
    {
        $content = TermsAndCondition::first();
        return view('admin.terms.index', compact('content'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'contents' => ['required']
        ]);

        TermsAndCondition::updateOrCreate(
            ['id' => 1],
            [
                'contents' => $request->contents
            ]
        );

        toastr('updated successfully!', 'success', 'success');

        return redirect()->back();

    }
}
