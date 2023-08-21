<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserVendorReqeustController extends Controller
{
    public function index()
    {
        return view('frontend.dashboard.vendor-request.index');
    }
}
