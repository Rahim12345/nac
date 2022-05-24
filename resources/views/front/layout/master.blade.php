<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAC</title>
    <link rel="stylesheet" href="{{ asset('nac/css/main.css') }}">
</head>

<body>
<!-- PRELOADER SECTION -->
<div class="loader">
    <figure class="preloader">
        <div class="dot white"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </figure>
</div>
<!-- HEADER SECTION================= -->
<header id="top_part">
    <div class="container-fluid container-own">
        <div class="row">
            <div class="col-md-6 f2">
                <ul class="social_ul">
                    <li class="social_li">
                        <a target="_blank" href="{{ \App\Helpers\Options::getOption('facebook') }}" class="social_link"><img src="{{ asset('nac/img/facebook.svg') }}" alt="Facebook"></a>
                    </li>
                    <li class="social_li">
                        <a target="_blank" href="{{ \App\Helpers\Options::getOption('instagram') }}" class="social_link"><img src="{{ asset('nac/img/insta.svg') }}" alt="Instagram"></a>
                    </li>
                    <li class="social_li">
                        <a target="_blank" href="{{ \App\Helpers\Options::getOption('youtube') }}" class="social_link"><img src="{{ asset('nac/img/youtube.svg') }}" alt="Youtube"></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 f1">

                <a href="https://www.paypal.com/donate/?hosted_button_id=Q8M8MCEKWKBXQ" class="report">DONATE</a>
            </div>

        </div>
    </div>
</header>
<header id="navbar">
    <div class="container-fluid container-own">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg">
                    <a href="{{ route('front.home') }}" class="logo">
                        <img src="{{ asset('nac/img/logo.png') }}" alt="Network of Azerbaijani Canadians">
                    </a>
                    <select name="lang" id="lang_res">
                        <option value="">EN</option>
                        <option value="">AZ</option>
                    </select>
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
                            <li class="nav-item nav_item ">
                                <a href="who-we-are.html" class="nav-link nav_link">
                                    WE ARE N.A.C </a>
                            </li>
                            <li class="nav-item nav_item dropdown">
                                <a class="nav-link nav_link dropdown-toggle" id="navbarDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">OUR ADVOCACY</a>
                                <ul class="dropdown-menu dropdown_menu" aria-labelledby="navbarDropdown">

                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item"
                                                               href="current-issues.html">Current issues</a></li>

                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item" href="take-action.html">Take action</a></li>

                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item" href="find-your-representative.html">Find your representative</a></li>


                                </ul>
                            </li>
                            <li class="nav-item nav_item dropdown">
                                <a class="nav-link nav_link dropdown-toggle" id="navbarDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">Press centre</a>
                                <ul class="dropdown-menu dropdown_menu" aria-labelledby="navbarDropdown">
                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item" href="statements.html">Statements</a></li>
                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item"
                                                               href="media.html">Media</a></li>
                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item" href="community-updates.html">Community updates</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav_item dropdown">
                                <a class="nav-link nav_link dropdown-toggle" id="navbarDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">get involved</a>
                                <ul class="dropdown-menu dropdown_menu" aria-labelledby="navbarDropdown">
                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item"
                                                               href="become-member.html">Become a member</a></li>
                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item"
                                                               href="volunteer.html">Volunteer at NAC</a></li>
                                    <li class="dropdown_li"><a class="dropdown-item dropdown_item"
                                                               href="javascript:(0)">Become a supporter</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav_item dropdown">
                                <a href="contact-us.html" class="nav-link nav_link">contact us</a>
                            </li>
                            <li class="nav-item nav_item nav_lang">
                                <select name="lang" id="lang_desk" class="lang">
                                    <option value="">EN</option>
                                    <option value="">AZ</option>
                                </select>
                            </li>
                            <li class="nav-item nav_item search_part">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.2249 16.0646C12.787 19.4294 7.21303 19.4294 3.77513 16.0646C0.337222 12.6999 0.337222 7.24454 3.77513 3.87978C7.21303 0.515028 12.787 0.515028 16.2249 3.87978C19.6628 7.24454 19.6628 12.6999 16.2249 16.0646ZM16.2249 16.0646L23.205 22.8962"
                                        stroke="white" stroke-width="1.5"></path>
                                </svg>
                            </li>
                        </ul>
                        <form method="get" id="search_form">
                            <input type="text" value="" name="s" class="form-control form_control" id="search"
                                   required="">
                            <i class="fas fa-times"></i>

                        </form>
                    </div>
                    <form  method="get" class="responsive_search search_holder" id="search_form">
                        <input type="text" class="form-control form_control" id="search" required="" name="s"
                               value="" placeholder="Search">
                        <a href="javascript:(0)" id="close_search" ><i class="fas fa-times axtar_i"></i></a>
                        <button class="btn">Axtar</button>
                        <div class="results">
                            <a href="javascript:(0)">Numune1</a>
                            <a href="javascript:(0)">Numune1</a>
                            <a href="javascript:(0)">Numune1</a>
                            <a href="javascript:(0)">Numune1</a>
                            <a href="javascript:(0)">Numune1</a>
                            <a href="javascript:(0)">Numune1</a>
                        </div>
                    </form>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- MAIN SLIDER SECTION -->
<section class="slider-main-area">
    <div class="main-sliders an-si">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider-2" class="slides">
                @foreach($banners as $banner)
                <img
                    src="{{ asset('files/banners/'.$banner->src) }}"
                    alt=""
                    title="#slider-direction-3"
                />
                @endforeach
            </div>
        </div>
    </div>
</section>



<!-- ourmission SECTION -->
<section class="ourmission">
    <div id="bg-desk" class="bg" style="background: url({{ asset('nac/img/banner1.png') }});"></div>
    <div id="bg-mobile" class="bg-mobile">
        @if(\App\Helpers\Missions::getOption('src') != '')
        <img src="{{ asset('files/mission/'.\App\Helpers\Missions::getOption('src')) }}" alt="">
        @endif
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="content">
                    <span>{{ \App\Helpers\Missions::getOption('title_1_'.app()->getLocale()) }}</span>
                    <h2>{{ \App\Helpers\Missions::getOption('title_2_'.app()->getLocale()) }}</h2>
                    <p>{{ \App\Helpers\Missions::getOption('text_'.app()->getLocale()) }}</p>
                    <a class="button" href="{{ \App\Helpers\Missions::getOption('link') }}">{{ \App\Helpers\Missions::getOption('button_'.app()->getLocale()) }}<i
                            class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- involved SECTION -->
<section class="involved" >
    <div class="bg" style="background:url({{ asset('nac/img/karabagh.png') }});"></div>
    <div id="bg-mobile" class="bg-mobile">
        @if(\App\Helpers\Involves::getOption('src') != '')
        <img src="{{ asset('files/involve/'.\App\Helpers\Involves::getOption('src')) }}" alt="">
        @endif
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="content">
                    <span>{{ \App\Helpers\Involves::getOption('title_1_'.app()->getLocale()) }}</span>
                    <h2>{{ \App\Helpers\Involves::getOption('title_2_'.app()->getLocale()) }}</h2>
                    <p>{{ \App\Helpers\Involves::getOption('text_'.app()->getLocale()) }}</p>
                    <a class="button" href="{{ \App\Helpers\Involves::getOption('link') }}">{{ \App\Helpers\Involves::getOption('button_'.app()->getLocale()) }}<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- press SECTION -->

<section class="press">
    <div class="container-fluid">
        <div class="row ">
            <div class="press-banner">
                <div class="col-lg-8 col-md-8 col ff1">
                    <div class="image">
                        @if(\App\Helpers\Presses::getOption('src') != '')
                        <img src="{{ asset('files/press/'.\App\Helpers\Presses::getOption('src')) }}" alt="">
                        @endif
                        <div class="content">
                            <h2>{{ \App\Helpers\Presses::getOption('title_1_'.app()->getLocale()) }}</h2>
                            <p>{{ \App\Helpers\Presses::getOption('text_'.app()->getLocale()) }}</p>
                            <a class="button" href="{{ \App\Helpers\Presses::getOption('link') }}">{{ \App\Helpers\Presses::getOption('button_'.app()->getLocale()) }}<i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col ff2">
                    <div class="twitter">
                        <div class="title-header">
                            <h2>Lorem, ipsum dolor Twitter</h2>
                        </div>
                        <div class="box">
                            <a class="twitter-timeline"
                               href="https://twitter.com/javidation?ref_src=twsrc%5Etfw">Tweets by javidation</a>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                        <div class="title-footer">
                            <span><img src="{{ asset('nac/img/twitter.png') }}" alt=""></span>
                            <span>Lorem, ipsum dolor</span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="press-blogs ">
                <div class="press_blog col-lg-3 col-md-6">
                    <div class="imag">
                        <img src="{{ asset('nac/img/press-image1.png') }}" alt="">
                        <div class="date">
                            24 sep,2021
                        </div>
                    </div>
                    <div class="content">
                        <p>Azerbaijan asks Armenia to stop laying landmines in second case to...</p>
                    </div>

                </div>

                <div class="press_blog col-lg-3 col-md-6">
                    <div class="imag">
                        <img src="{{ asset('nac/img/press-image2.png') }}" alt="">
                        <div class="date">
                            24 sep,2021
                        </div>
                    </div>
                    <div class="content">
                        <p>George “Congratulations Azerbaijan”</p>
                    </div>
                </div>

                <div class="press_blog col-lg-3 col-md-6">
                    <div class="imag">
                        <img src="{{ asset('nac/img/press-image3.png') }}" alt="">
                        <div class="date">
                            24 sep,2021
                        </div>
                    </div>
                    <div class="content">
                        <p>Restoration of Independence in Azerbaijan</p>
                    </div>
                </div>

                <div class="press_blog col-lg-3 col-md-6">
                    <div class="imag">
                        <img src="{{ asset('nac/img/press-image1.png') }}" alt="">
                        <div class="date">
                            24 sep,2021
                        </div>
                    </div>
                    <div class="content">
                        <p>Another missile, another war crime</p>
                    </div>
                </div>
            </div>
            <div class="more">
                <a class="button" href="javascript:(0)">See more<i
                        class="fa-solid fa-arrow-right"></i></a>
            </div>


        </div>
    </div>
</section>


<!-- peoples-mission SECTION -->
<section class="peoples-mission">
    <div class="bg" style="background: url({{ asset('nac/img/peoples.png') }});"></div>
    <div id="bg-mobile" class="bg-mobile">
        @if(\App\Helpers\PMissions::getOption('src') != '')
            <img src="{{ asset('files/pmission/'.\App\Helpers\PMissions::getOption('src')) }}" alt="">
        @endif
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="content">
                    <h2>{{ \App\Helpers\PMissions::getOption('title_1_'.app()->getLocale()) }}</h2>
                    <p>{{ \App\Helpers\PMissions::getOption('text_'.app()->getLocale()) }}</p>
                    <a class="button" href="javascript:(0)">{{ \App\Helpers\PMissions::getOption('button_'.app()->getLocale()) }} <i
                            class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- subscribe SECTION -->

<section class="subscribe">
    @if(\App\Helpers\Subscribes::getOption('src') != '')
        <div class="bg" style="background: url({{ asset('files/subscribe/'.\App\Helpers\Subscribes::getOption('src')) }});"></div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="subscribe-form">
                    <h2>“{{ \App\Helpers\Subscribes::getOption('title_1_'.app()->getLocale()) }}”</h2>
                    <p>{{ \App\Helpers\Subscribes::getOption('text_'.app()->getLocale()) }}</p>
                    <form action="">
                        <input type="email" name="" placeholder="Your E-mail" required>
                        <button class="fa-solid fa-circle-arrow-right" type="submit"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- footer SECTION -->
<footer style="background: url({{ asset('nac/img/footer-bg.png') }});">
    <div class="container-fluid">
        <div class="row">
            <div class="box col-lg-3 col-md-6">
                <div class="logo-footer">
                    <a href="index.html">
                        <img src="{{ asset('nac/img/logo_white.png') }}" alt="">
                    </a>
                </div>
            </div>

            <div class="box col-lg-3 col-md-6">
                <div class="footer-menu">
                    <a href="javascript:(0)">Who we are</a>
                    <a href="javascript:(0)">Our Advocacy</a>
                    <a href="javascript:(0)">Current issues</a>
                    <a href="javascript:(0)">Take action</a>
                    <a href="javascript:(0)">Find your representative</a>
                </div>
            </div>

            <div class="box col-lg-3 col-md-6">
                <div class="footer-menu">
                    <a href="javascript:(0)">Press Centre</a>
                    <a href="javascript:(0)">Statements</a>
                    <a href="javascript:(0)">Media</a>
                    <a href="javascript:(0)">Community updates</a>
                </div>
            </div>

            <div class="box col-lg-3 col-md-6">
                <div class="footer-contact">
                    <span><a href="javascript:(0)">Contact</a></span>
                    <span>Mail: <a href="mailto:{{ \App\Helpers\Options::getOption('email') }}">{{ \App\Helpers\Options::getOption('email') }}</a></span>

                    <span>Phone: <a href="javascript:(0)">{{ \App\Helpers\Options::getOption('tel') }}</a></span>
                    <span>Address: <a href="javascript:(0)">{{ \App\Helpers\Options::getOption('unvan_'.app()->getLocale()) }}</a></span>
                    <div class="socials">
                        <ul>
                            <li>
                                <a href="{{ \App\Helpers\Options::getOption('facebook') }}">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ \App\Helpers\Options::getOption('instagram') }}">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ \App\Helpers\Options::getOption('youtube') }}">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="credit">
        <span>All rights reserved!</span>
        <span>Website by $</span>
    </div>
</footer>
<div class="overlay_search">
</div>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript"  src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script type="text/javascript"  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('nac/js/plugins/jquery.nivo.slider.js') }}"></script>
<script src="{{ asset('nac/js/plugins/jquery.nivo.slider.pack.js') }}"></script>

<script>

    $("#ensign-nivoslider-2").nivoSlider({
        effect: "random",
        slices: 15,
        dots: true,
        boxCols: 15,
        boxRows: 8,
        animSpeed: 500,
        pauseTime: 9000,
        startSlide: 0,
        directionNav: true,
        controlNavThumbs: false,
        pauseOnHover: false,
        manualAdvance: false,
    });;
</script>
<script src="{{ asset('nac/js/main.js') }}"></script>
</body>

</html>