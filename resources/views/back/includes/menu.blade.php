<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ route('back.dashboard') }}">
                <img src="{{ asset('back/logo/logo.jpg') }}" width="110" height="32" alt="{{ auth()->user()->name }}" class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown d-none d-md-flex me-3"></div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" id="nav-avatar" style="background-image: url({{ asset('avatars/'.auth()->user()->avatar) }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div id="top-name">{{ mb_substr(explode(' ',auth()->user()->name)[0],0,16) }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('back.profile') }}" class="dropdown-item">{{ __('static.profile') }}</a>
                    <a href="{{ route('logout') }}" class="dropdown-item">{{ __('static.logout') }}</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('option.index') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><circle cx="12" cy="12" r="3" /></svg>
                    </span>
                            <span class="nav-link-title">
                      {{ __('static.settings') }}
                    </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="6" x2="20" y2="6" /><line x1="4" y1="12" x2="20" y2="12" /><line x1="4" y1="18" x2="20" y2="18" /></svg>
                            </span>
                            <span class="nav-link-title">
                              {{ __('static.menus') }}
                                @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'product.create')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 9 12 15 18 9" /></svg>
                                @endif
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="{{ route('menu.index') }}" >
                                        Menu Editing
                                    </a>
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                            Home
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('banner.index') }}" class="dropdown-item">Banner</a>
                                            <a href="{{ route('mission.index') }}" class="dropdown-item">Mission</a>
                                            <a href="{{ route('involve.index') }}" class="dropdown-item">Involve</a>
                                            <a href="{{ route('press.index') }}" class="dropdown-item">Press</a>
                                            <a href="{{ route('pmission.index') }}" class="dropdown-item">People Mission</a>
                                            <a href="{{ route('subscribe.index') }}" class="dropdown-item">Subscribe</a>
                                        </div>
                                    </div>

                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                            WE ARE N.A.C
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('back.who',['section'=>'section_one']) }}" class="dropdown-item">Who we are</a>
                                            <a href="{{ route('back.who',['section'=>'section_two']) }}" class="dropdown-item">Our-story SECTION</a>
                                            <a href="{{ route('back.who',['section'=>'section_three']) }}" class="dropdown-item">Our-vision SECTION</a>
                                            <a href="{{ route('back.who',['section'=>'section_four']) }}" class="dropdown-item">Our-mission SECTION</a>
                                            <a href="{{ route('back.statistics') }}" class="dropdown-item">Statistics SECTION</a>
                                            <a href="{{ route('moment.index') }}" class="dropdown-item">Some moments of N.A.C.</a>
                                            <a href="{{ route('back.flag.part') }}" class="dropdown-item">Flag part SECTION</a>
                                        </div>
                                    </div>

                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                                            OUR ADVOCACY
                                        </a>
                                        <div class="dropdown-menu">
                                            <div class="dropdown-menu-columns">
                                                <div class="dropdown-menu-column">
                                                    <a class="dropdown-item" href="javascript: void(0)" >
                                                        <b>Current Issues</b>
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('current-issues-banner.index') }}" >
                                                        Banner
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('current-issues-category.index') }}" >
                                                        Categories
                                                    </a>
                                                </div>
                                                <div class="dropdown-menu-column">
                                                    <a class="dropdown-item" href="javascript: void(0)" >
                                                        <b>Take action</b>
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('back.page.banner',['key'=>'take_action_banner']) }}" >
                                                        Banner
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('blog.index',['id'=>4]) }}" >
                                                        Add Articles
                                                    </a>
                                                </div>
                                                <div class="dropdown-menu-column">
                                                    <a class="dropdown-item" href="javascript: void(0)" >
                                                        <b>Find your representative</b>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                                            PRESS CENTRE
                                        </a>
                                        <div class="dropdown-menu">
                                            <div class="dropdown-menu-columns">
                                                <div class="dropdown-menu-column">
                                                    <a class="dropdown-item" href="javascript: void(0)" >
                                                        <b>Statements</b>
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('back.page.banner',['key'=>'statements_banner']) }}" >
                                                        Banner
                                                    </a>

                                                </div>
                                                <div class="dropdown-menu-column">
                                                    <a class="dropdown-item" href="javascript: void(0)" >
                                                        <b>Media</b>
                                                    </a>


                                                </div>
                                                <div class="dropdown-menu-column">
                                                    <a class="dropdown-item" href="javascript: void(0)" >
                                                        <b>Community updates</b>
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('back.page.banner',['key'=>'community_banner']) }}" >
                                                        Banner
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                                            GET INVOLVED
                                        </a>
                                        <div class="dropdown-menu">
                                            <div class="dropdown-menu-columns">
                                                <div class="dropdown-menu-column">
                                                    <a class="dropdown-item" href="javascript: void(0)" >
                                                        <b>Become a member</b>
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('back.page.banner',['key'=>'become_a_member_banner']) }}" >
                                                        Banner
                                                    </a>

                                                </div>
                                                <div class="dropdown-menu-column">
                                                    <a class="dropdown-item" href="javascript: void(0)" >
                                                        <b>Volunteer at NAC</b>
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('back.page.banner',['key'=>'volunteer_banner']) }}" >
                                                        Banner
                                                    </a>
                                                </div>
                                                <div class="dropdown-menu-column">
                                                    <a class="dropdown-item" href="javascript: void(0)" >
                                                        <b>Become a supporter</b>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last"></div>
            </div>
        </div>
    </div>
</div>
