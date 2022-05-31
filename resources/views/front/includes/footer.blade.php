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
                    <a href="">Who we are</a>
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
                    <span>Mail: <a href="javascript:(0)">info@azcanet.ca</a></span>

                    <span>Phone: <a href="javascript:(0)">1234567890</a></span>
                    <span>Address: <a href="javascript:(0)">1111 Finch Avenue West, <br> Unit 218 Toronto, ON,
                                Canada </a></span>
                    <div class="socials">
                        <ul>
                            <li>
                                <a href="javascript:(0)">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:(0)">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:(0)">
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
@toastr_js
@toastr_render
@yield('js')
</body>
</html>
