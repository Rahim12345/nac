<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\CurrentIssuesCategory;
use App\Models\Membership;
use App\Models\Menu;
use App\Models\Moment;
use App\Models\Subscriber;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PagesController extends Controller
{
    public function home()
    {
        return view('front.pages.home',[
            'banners'=>Banner::latest()->get(),
            'news'=>Blog::where('menu_id',8)->take(4)->get()
        ]);
    }

    public function subscribe(Request $request)
    {
        $client  = new Client();
        $arrResponse = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'secret' => env('RECAPTCHAV3_SECRET'),
                'response' => $request->token,
            ],
        ]);

        $arrResponse = json_decode($arrResponse->getBody(), true);

        if($arrResponse["success"] == '1' && $arrResponse["action"] == 'subscribe' && $arrResponse["score"] >= 0.5)
        {
            $this->validate($request, [
                'email' => 'required|email|unique:subscribers,email',
            ],[],[
                'email' => __('login.email'),
            ]);

            Subscriber::create([
                'email' => $request->email,
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'message' => __('static.subscribe_success'),
            ],Response::HTTP_OK);
        }
        else
        {
            return response()->json([
                'errors'=>[
                    'bot'=>__('static.bot')
                ]
            ], 422);
        }
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

    public function blogLoader(Request $request)
    {
        $output = '';
        if(isset($_POST["limit"], $_POST["start"], $_POST["past"], $_POST["menu_id"]))
        {
            $blogs = Blog::where('past', $request->past)
                ->where('menu_id', $request->menu_id)
                ->orderBy('id','desc')
                ->skip($request->start)
                ->take($request->limit)
                ->get();

            foreach ($blogs as $blog)
            {
                if ($request->menu_id == 4)
                {
                    $output .= '
                    <div class="box" onclick="window.location.href=\''.route('take.action.details',['slug'=>$blog->{'slug_'.app()->getLocale()}]).'\'">
                        <div class="col-lg-6 col-md-6">
                            <div class="content">
                                <h2>'.$blog->{'title_'.app()->getLocale()}.'</h2>
                                <p>'.$blog->{'intro_text_'.app()->getLocale()}.'</p>
                                <a href="javascript:(0)">Learn more <i class="fa-solid fa-circle-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="image">
                                <img src="'.($blog->cover === null ? '' : asset('files/blogs/'.$blog->cover->src)).'" alt="">
                            </div>
                        </div>
                    </div>
                    ';
                }
                elseif ($request->menu_id == 7)
                {
                    $output .= '
                        <div class="box" onclick="window.location.href=\''.route('statements.details',['slug'=>$blog->{'slug_'.app()->getLocale()}]).'\'">
                        <div class="col-lg-6 col-md-12">
                            <div class="content">
                                <h2>'.$blog->{'title_'.app()->getLocale()}.'</h2>
                                <p>'.$blog->{'intro_text_'.app()->getLocale()}.'</p>
                                <a href="javascript:(0)">Learn more <i class="fa-solid fa-circle-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="image">
                                <img src="'.($blog->cover === null ? '' : asset('files/blogs/'.$blog->cover->src)).'" alt="">
                            </div>
                        </div>
                    </div>
                    ';
                }
                elseif ($request->menu_id == 9)
                {
                    $images = '';
                    foreach ($blog->images as $image)
                    {
                        $images .= '<div class="swiper-slide image"><img src="'.asset('files/blogs/'.$image->src).'" alt=""></div>';
                    }

                    $output .= '
                        <div class="box">
                            <div class="col-lg-6 col-md-6 boxes-f">
                                <div class="content">
                                    <h2>'.$blog->{'title_'.app()->getLocale()}.'</h2>
                                    <p>'.$blog->{'intro_text_'.app()->getLocale()}.'</p>
                                    <a  onclick="window.location.href=\''.route('community.updates.details',['slug'=>$blog->{'slug_'.app()->getLocale()}]).'\'">Learn more <i class="fa-solid fa-circle-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 boxes-g">

                                <div class="swiper-container">
                                    <div class="swiper-wrapper"  onclick="window.location.href=\''.route('community.updates.details',['slug'=>$blog->{'slug_'.app()->getLocale()}]).'\'">
                                        '.$images.'
                                    </div>
                                    <div class="arrows">
                                        <div class="col-md-2 arrow">
                                            <i class="fa-solid fa-arrow-left-long"></i>
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </div>
                                        <div class="col-md-10 scrollbar">
                                            <div class="swiper-scrollbar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
                elseif ($request->menu_id == 12)
                {
                    $output .= '
                        <div class="box" onclick="window.location.href=\''.route('volunteer.details',['slug'=>$blog->{'slug_'.app()->getLocale()}]).'\'">
                            <div class="col-lg-6 col-md-6 cursor" >
                                <div class="image">
                                    <img src="'.($blog->cover === null ? '' : asset('files/blogs/'.$blog->cover->src)).'" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 cursor">
                                <div class="content">
                                    <h2>'.$blog->{'title_'.app()->getLocale()}.'</h2>
                                    <p>'.$blog->{'intro_text_'.app()->getLocale()}.'</p>
                                    <a href="'.route('volunteer.details',['slug'=>$blog->{'slug_'.app()->getLocale()}]).'">Learn more <i class="fa-solid fa-circle-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
        }

        return $output;
    }

    public function takeAction()
    {
        return view('front.pages.take-action');
    }

    public function takeActionDetails($slug)
    {
        $blog = Blog::where('menu_id',4)
            ->where(
                fn($query) => $query
                    ->orWhere('slug_az',$slug)
                    ->orWhere('slug_en',$slug)
            )
            ->firstOrFail();

        return view('front.pages.take-action-details', compact('blog'));
    }

    public function statements()
    {
        return view('front.pages.statements');
    }

    public function statementsDetails($slug)
    {
        $blog = Blog::where('menu_id',7)
            ->where(
                fn($query) => $query
                    ->orWhere('slug_az',$slug)
                    ->orWhere('slug_en',$slug)
            )
            ->firstOrFail();

        return view('front.pages.statements-details', compact('blog'));
    }

    public function communityUpdates()
    {
        return view('front.pages.community-updates');
    }

    public function communityUpdatesDetails($slug)
    {
        $blog = Blog::where('menu_id',9)
            ->where(
                fn($query) => $query
                    ->orWhere('slug_az',$slug)
                    ->orWhere('slug_en',$slug)
            )
            ->firstOrFail();

        return view('front.pages.community-updates-details', compact('blog'));
    }

    public function volunteer()
    {
        return view('front.pages.volunteer');
    }

    public function volunteerDetails($slug)
    {
        $blog = Blog::where('menu_id',12)
            ->where(
                fn($query) => $query
                    ->orWhere('slug_az',$slug)
                    ->orWhere('slug_en',$slug)
            )
            ->firstOrFail();

        return view('front.pages.volunteer-details', compact('blog'));
    }

    public function media()
    {
        return view('front.pages.media',[
            'blogs'=>Blog::where('menu_id', 8)
                ->orderBy('id','desc')
                ->paginate(12)
        ]);
    }

    public function mediaDetails($slug)
    {
        $blog = Blog::where('menu_id',8)
            ->where(
                fn($query) => $query
                    ->orWhere('slug_az',$slug)
                    ->orWhere('slug_en',$slug)
            )
            ->firstOrFail();

        $more_news  = Blog::where('id','!=',$blog->id)
            ->where('menu_id',8)
            ->take(4)->get();

        return view('front.pages.media-details', compact('blog', 'more_news'));
    }

    public function becomeMember()
    {
        return view('front.pages.become-member',[
            'memberships'=>Membership::latest()->get()
        ]);
    }

    public function Menu($slug)
    {
        $check = Menu::where('shown',1)
            ->where(
                fn($query)=> $query
                ->orWhere('slug_az',$slug)
                ->orWhere('slug_en',$slug)
            )
            ->firstOrFail();
        if ($check->parent_id != 0 && $check->parent->shown == 0)
        {
            abort(404);
        }

        if ($check->id == 1)
        {
            return $this->whoWeAre();
        }
        elseif ($check->id == 3)
        {
            return $this->currentIssues();
        }
        elseif ($check->id == 4)
        {
            return $this->takeAction();
        }
        elseif ($check->id == 7)
        {
            return $this->statements();
        }
        elseif ($check->id == 8)
        {
            return $this->media();
        }
        elseif ($check->id == 9)
        {
            return $this->communityUpdates();
        }
        elseif ($check->id == 11)
        {
            return $this->becomeMember();
        }
        elseif ($check->id == 12)
        {
            return $this->volunteer();
        }
    }
}
