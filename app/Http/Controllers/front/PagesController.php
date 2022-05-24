<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('front.layout.master',[
            'banners'=>Banner::latest()->get()
        ]);
    }
}
