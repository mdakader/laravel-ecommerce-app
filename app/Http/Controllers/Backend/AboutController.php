<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $content = About::first();
        return view('admin.about.index', compact('content'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'contents' => ['required']
        ]);

        About::updateOrCreate(
            ['id' => 1],
            [
                'contents' => $request->contents
            ]
        );

        toastr('updated successfully!', 'success', 'success');

        return redirect()->back();

    }
}
