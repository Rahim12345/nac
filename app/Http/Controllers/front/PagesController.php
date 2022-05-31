<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CurrentIssuesCategory;
use App\Models\Menu;
use App\Models\Moment;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('front.pages.home',[
            'banners'=>Banner::latest()->get()
        ]);
    }

    public function whoWeAre()
    {
        return view('front.pages.who',[
            'banners'=>Banner::latest()->get(),
            'moments'=>Moment::latest()->get(),
        ]);
    }

    public function currentIssues()
    {
        return view('front.pages.current-issues',[
            'issues'=>CurrentIssuesCategory::latest()->get(),
        ]);
    }

    public function Menu($slug)
    {
        $check = Menu::where('slug_az',$slug)
            ->orWhere('slug_en',$slug)
            ->firstOrFail();
        if ($check->id == 1)
        {
            return $this->whoWeAre();
        }
        elseif ($check->id == 3)
        {
            return $this->currentIssues();
        }
    }
}
