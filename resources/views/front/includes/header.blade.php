<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    <link rel="stylesheet icon" href="{{ asset('nac') }}/img/logo-fav.ico">
    <link rel="stylesheet" href="{{ asset('nac') }}/css/main.css">
    @toastr_css
    @yield('css')
</head>

<body >
<!-- PRELOADER SECTION -->
<div class="loader">
    <div class="preloader">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
        <div class="circle circle-3"></div>
        <div class="circle circle-4"></div>
        <div class="circle circle-5"></div>
    </div>
</div>
<!-- HEADER SECTION================= -->
<header id="top_part">
    <div class="container-fluid container-own">
        <div class="row">
            <div class="col-md-6 f2">
                <ul class="social_ul">
                    <li class="social_li">
                        <a target="_blank" href="javascript:(0)" class="social_link"><img src="{{ asset('nac') }}/img/facebook.svg" alt="Facebook"></a>
                    </li>
                    <li class="social_li">
                        <a target="_blank" href="javascript:(0)" class="social_link"><img src="{{ asset('nac') }}/img/insta.svg" alt="Instagram"></a>
                    </li>
                    <li class="social_li">
                        <a target="_blank" href="javascript:(0)" class="social_link"><img src="{{ asset('nac') }}/img/youtube.svg" alt="Youtube"></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 f1">

                <a href="https://www.paypal.com/donate/?hosted_button_id=Q8M8MCEKWKBXQ" target="_blank" class="report">DONATE</a>
            </div>

        </div>
    </div>
</header>
<header id="navbar"  class="isFixed">
    <div class="container-fluid container-own">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg">
                    <a href="{{ route('front.home') }}" class="logo">
                        <img src="{{ asset('nac') }}/img/logo.png" alt="Network of Azerbaijani Canadians">
                    </a>

                    <li class="nav-item nav_item nav_lang li_hover " id="lang_res">
                        <a class="nav-link nav_link dropdown-toggle" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">Az</a>
                        <ul class="dropdown-menu dropdown_menu" aria-labelledby="navbarDropdown">
                            <li class="dropdown_li"><a class="dropdown-item dropdown_item"
                                >Ru</a></li>
                            <li class="dropdown_li"><a class="dropdown-item dropdown_item"
                                >En</a></li>
                        </ul>
                    </li>

                    <a href="javascript:(0)" id="axtar">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <button class="navbar-toggler navbar_toggler collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <svg class="menu" width="24" height="16" viewBox="0 0 24 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24 14.6667C24 15.403 23.403 16 22.6667 16H1.33333C0.596954 16 0 15.403 0 14.6667C0 13.9303 0.596954 13.3333 1.33333 13.3333H22.6667C23.403 13.3333 24 13.9303 24 14.6667ZM24 8C24 8.73638 23.403 9.33333 22.6667 9.33333H1.33333C0.596954 9.33333 0 8.73638 0 8C0 7.26362 0.596954 6.66667 1.33333 6.66667H22.6667C23.403 6.66667 24 7.26362 24 8ZM24 1.33333C24 2.06971 23.403 2.66667 22.6667 2.66667H1.33333C0.596954 2.66667 0 2.06971 0 1.33333C0 0.596954 0.596954 0 1.33333 0H22.6667C23.403 0 24 0.596954 24 1.33333Z"
                                fill="#EC5A44"></path>
                        </svg>
                        <svg class="remove" width="19" height="19" viewBox="0 0 19 19" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <line x1="1.76777" y1="2" x2="16.9706" y2="17.2028" stroke="#EC5A44" stroke-width="2.5"
                                  stroke-linecap="round"></line>
                            <line x1="2" y1="17.2027" x2="17.2028" y2="1.99989" stroke="#EC5A44" stroke-width="2.5"
                                  stroke-linecap="round"></line>
                        </svg>
                    </button>
                    <div class="collapse navbar-collapse navbar_collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav navbar_nav me-auto mb-2 mb-lg-0">
                            @foreach($menus as $menu)
                                @if($menu->children->count() == 0 && $menu->parent_id == 0)
                                    <li class="nav-item nav_item li_hover">
                                        <a href="{{ route('front.menu',['slug'=>$menu->{'slug_'.app()->getLocale()}]) }}" class="nav-link nav_link">{{ $menu->{'menu_'.app()->getLocale()} }}</a>
                                    </li>
                                @elseif($menu->children->count() > 0 && $menu->parent_id == 0)
                                    <li class="nav-item nav_item dropdown li_hover">
                                        <a class="nav-link nav_link dropdown-toggle" id="navbarDropdown" role="button"
                                           data-bs-toggle="dropdown" aria-expanded="false">{{ $menu->{'menu_'.app()->getLocale()} }}</a>
                                        <ul class="dropdown-menu dropdown_menu" aria-labelledby="navbarDropdown">
                                            @foreach($menu->children as $sub_menu)
                                            <li class="dropdown_li">
                                                @if(filter_var($sub_menu->{'slug_'.app()->getLocale()}, FILTER_VALIDATE_URL))
                                                    <a class="dropdown-item dropdown_item" href="{{ $sub_menu->{'slug_'.app()->getLocale()} }}">{{ $sub_menu->{'menu_'.app()->getLocale()} }}</a>
                                                @else
                                                    <a class="dropdown-item dropdown_item" href="{{ route('front.menu',['slug'=>$sub_menu->{'slug_'.app()->getLocale()}]) }}">{{ $sub_menu->{'menu_'.app()->getLocale()} }}</a>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
{{--                            <li class="nav-item nav_item li_hover">--}}
{{--                                <a href="{{ route('front.who.we.are') }}" class="nav-link nav_link">--}}
{{--                                    WE ARE N.A.C </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item nav_item dropdown li_hover">--}}
{{--                                <a class="nav-link nav_link dropdown-toggle" id="navbarDropdown" role="button"--}}
{{--                                   data-bs-toggle="dropdown" aria-expanded="false">OUR ADVOCACY</a>--}}
{{--                                <ul class="dropdown-menu dropdown_menu" aria-labelledby="navbarDropdown">--}}

{{--                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item"--}}
{{--                                                               href="{{ route('front.current.issues') }}">Current issues</a></li>--}}

{{--                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item" href="take-action.html">Take action</a></li>--}}

{{--                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item" target="_blank" href="https://www.ourcommons.ca/members/">Find your representative</a></li>--}}


{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item nav_item dropdown li_hover">--}}
{{--                                <a class="nav-link nav_link dropdown-toggle" id="navbarDropdown" role="button"--}}
{{--                                   data-bs-toggle="dropdown" aria-expanded="false">Press centre</a>--}}
{{--                                <ul class="dropdown-menu dropdown_menu" aria-labelledby="navbarDropdown">--}}
{{--                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item" href="statements.html">Statements</a></li>--}}
{{--                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item"--}}
{{--                                                               href="media.html">Media</a></li>--}}
{{--                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item" href="community-updates.html">Community updates</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item nav_item dropdown li_hover">--}}
{{--                                <a class="nav-link nav_link dropdown-toggle" id="navbarDropdown" role="button"--}}
{{--                                   data-bs-toggle="dropdown" aria-expanded="false">get involved</a>--}}
{{--                                <ul class="dropdown-menu dropdown_menu" aria-labelledby="navbarDropdown">--}}
{{--                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item"--}}
{{--                                                               href="become-member.html">Become a member</a></li>--}}
{{--                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item"--}}
{{--                                                               href="volunteer.html">Volunteer at NAC</a></li>--}}
{{--                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item" target="_blank"--}}
{{--                                                               href="https://www.paypal.com/donate/?hosted_button_id=Q8M8MCEKWKBXQ">Become a supporter</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                            <li class="nav-item nav_item dropdown li_hover contact">
                                <a class="nav-link nav_link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">contact us</a>
                                <ul class="dropdown-menu dropdown_menu" aria-labelledby="navbarDropdown">
                                    <li class="dropdown_li"><a class="menu_info" href="mailto:azcanet@gmail.com">Email: azcanet@gmail.com</a></li>
                                    <li class="dropdown_li"><a class="menu_info" href="tel:+1234567890">Phone: +1234567890</a></li>
                                    <li class="dropdown_li"><a class="menu_info address" href="#">Address: 1111 Finch Avenue West, Unit 218 Toronto, ON, Canada</a></li>
                                    <ul class="social_ul">
                                        <li class="social_li">
                                            <a target="_blank" href="https://www.facebook.com/azcanet/" class="social_link"><i class="fa-brands fa-facebook"></i></a>
                                        </li>
                                        <li class="social_li">
                                            <a target="_blank" href="https://www.instagram.com/azcanet/" class="social_link"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                        <li class="social_li">
                                            <a target="_blank" href="https://www.youtube.com/c/azcanet" class="social_link"><i class="fa-brands fa-youtube"></i></a>
                                        </li>
                                    </ul>
                                </ul>
                            </li>
                            <li class="nav-item nav_item nav_lang li_hover lang_desktop">
                                <a class="nav-link nav_link ">En</a>
                                <ul class="dropdown-menu dropdown_menu" aria-labelledby="navbarDropdown">
                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item"
                                        >Az</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav_item search_part">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </li>
                        </ul>
                        <form method="get" id="search_form">
                            <input type="text" value="" name="s" class="form-control form_control" id="search"
                                   required="" >
                            <i class="fas fa-times"></i>
                            <i class="fa-solid fa-magnifying-glass" onclick="media('search.html')"></i>

                        </form>
                    </div>
                    <form  method="get" class="responsive_search search_holder" id="search_form">
                        <input type="text" class="form-control form_control" id="search" required="" name="s"
                               value="" placeholder="Search">
                        <div class="d-flex">
                            <button onclick="media('search.html')" class="btn" style="margin-right: 20px;">Search</button>
                            <button id="close_search"  class="btn">Close</button>
                        </div>
                    </form>
                </nav>
            </div>
        </div>
    </div>
</header>

@yield('content')
