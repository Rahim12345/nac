<!-- footer SECTION -->
<footer style="background: url('{!! asset('nac') !!}/img/footer-bg.png');">
    <div class="container-fluid">
        <div class="row">
            <div class="box col-lg-3 col-md-6">
                <div class="logo-footer">
                    <a href="{{ route('front.home') }}">
                        <img src="{{ asset('nac') }}/img/logo_white.png" alt="">
                    </a>
                </div>
            </div>

            <div class="box col-lg-3 col-md-6">
                <div class="footer-menu">
                    @foreach($menus as $menu)
                        @if($menu->id == 1)
                            <a href="{{ $menu->{'slug_'.app()->getLocale()} }}">{{ $menu->{'menu_'.app()->getLocale()} }}</a>
                        @elseif($menu->id == 2)
                            <a href="javascript:(0)">{{ $menu->{'menu_'.app()->getLocale()} }}</a>
                            @foreach($menu->children as $sub_menu)
                                @if($sub_menu->shown)
                                @if(filter_var($sub_menu->{'slug_'.app()->getLocale()}, FILTER_VALIDATE_URL))
                                    <a href="{{ $sub_menu->{'slug_'.app()->getLocale()} }}">{{ $sub_menu->{'menu_'.app()->getLocale()} }}</a>
                                @else
                                    <a href="{{ route('front.menu',['slug'=>$sub_menu->{'slug_'.app()->getLocale()}]) }}">{{ $sub_menu->{'menu_'.app()->getLocale()} }}</a>
                                @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="box col-lg-3 col-md-6">
                <div class="footer-menu">
                    @foreach($menus as $menu)
                        @if($menu->id == 6)
                            <a href="javascript:(0)">{{ $menu->{'menu_'.app()->getLocale()} }}</a>
                            @foreach($menu->children as $sub_menu)
                                @if($sub_menu->shown)
                                @if(filter_var($sub_menu->{'slug_'.app()->getLocale()}, FILTER_VALIDATE_URL))
                                    <a href="{{ $sub_menu->{'slug_'.app()->getLocale()} }}">{{ $sub_menu->{'menu_'.app()->getLocale()} }}</a>
                                @else
                                    <a href="{{ route('front.menu',['slug'=>$sub_menu->{'slug_'.app()->getLocale()}]) }}">{{ $sub_menu->{'menu_'.app()->getLocale()} }}</a>
                                @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="box col-lg-3 col-md-6">
                <div class="footer-contact">
                    <span><a href="javascript:(0)">Contact</a></span>
                    <span>Mail: <a href="mailto:{{ \App\Helpers\Options::getOption('email') }}">{{ \App\Helpers\Options::getOption('email') }}</a></span>

                    <span>Phone: <a href="tel:{{ \App\Helpers\Options::getOption('tel') }}">{{ \App\Helpers\Options::getOption('tel') }}</a></span>
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
        <span>Website by <a href="https://shamans.az" target="_blank" ><img {{ asset('nac') }}//img/shamans-footer.png" alt=""></a></span>
    </div>
</footer>
</main>

<div class="overlay_search">
</div>

<section id="scroll_top">
    <svg width="29" height="17" viewBox="0 0 29 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M25.4558 16.9706L28.2842 14.1421L16.9706 2.82847L14.1421 4.57764e-05L14.1421 0L11.3137 2.82843L11.3137 2.82847L0 14.1422L2.82843 16.9706L14.1421 5.6569L25.4558 16.9706Z" fill="white"></path>
    </svg>
</section>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript"  src="{{ asset('nac') }}/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script type="text/javascript"  src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript"  src="{{ asset('nac') }}/js/main.js"></script>
<script async src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHAV3_SITEKEY') }}"></script>
<script type="text/javascript"  src="{{ asset('front/js/subscribe.js') }}"></script>
@toastr_js
@toastr_render
@yield('js')
</body>
</html>
