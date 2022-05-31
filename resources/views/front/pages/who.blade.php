@extends('front.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <!-- WHOWEARE SECTION================= -->
    <main id="whoweare">
        <!-- WHO WE ARE -->
        <section class="who-we-are top ">
            <div class="container">
                <div class="row">
                    <div class="video-about">
                        <div class="col-lg-6 col-md-12">
                            <div class="image ">
                                <a data-fancybox="gallery" class="fancybox" href="https://www.youtube.com/embed/ZJ0mTcAb_W4">
                                    @if(\App\Helpers\Whos::getOption('section_one_src'))
                                    <img src="{{ asset('files/who/'.\App\Helpers\Whos::getOption('section_one_src')) }}" alt="">
                                    @endif
                                    <i class="fa-solid fa-circle-play"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="content">
                                <h2>
                                    {!! \App\Helpers\Whos::getOption('section_one_title_1_'.app()->getLocale()) !!}
                                </h2>
                                <p>
                                    {!! \App\Helpers\Whos::getOption('section_one_text_'.app()->getLocale()) !!}
                                </p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </section>

        <section class="statistics ">
            <div class="container-fluid">
                <div class="row">
                    <div class="statistic ">
                        <div class="">
                            <div class="box color1">
                                <div>
                                    <span class="counter">{!! \App\Helpers\Whos::getOption('members') !!} </span><span>+</span>
                                </div>
                                <p>members</p>
                            </div>
                        </div>

                        <div class="">
                            <div class="box color2">
                                <span class="counter">{!! \App\Helpers\Whos::getOption('events') !!}</span>
                                <p>Organized events</p>
                            </div>
                        </div>

                        <div class="">
                            <div class="box color3">
                                <span class="counter">{!! \App\Helpers\Whos::getOption('parliament') !!}</span>
                                <p>Parliament members</p>
                            </div>
                        </div>

                        <div class="">
                            <div class="box color4">
                                <div>
                                    <span class="counter">{!! \App\Helpers\Whos::getOption('programs') !!}</span><span>+</span>
                                </div>

                                <p>programs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our-story SECTION -->
        <section class="our-story " style="background: url({{ asset('nac/img/ourstory-bg.jpg') }});">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="content">
                            <h2>{!! \App\Helpers\Whos::getOption('section_two_title_1_'.app()->getLocale()) !!}</h2>
                            <p>{!! \App\Helpers\Whos::getOption('section_two_text_'.app()->getLocale()) !!}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="image">
                            @if(\App\Helpers\Whos::getOption('section_two_src'))
                            <img src="{{ asset('files/who/'.\App\Helpers\Whos::getOption('section_two_src')) }}" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our-vision SECTION -->
        <section class="our-vision " style="background: url({{ asset('nac/img/ourvision-bg.jpg') }});">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-6 col-md-6">
                        <div class="image">
                            @if(\App\Helpers\Whos::getOption('section_two_src'))
                                <img src="{{ asset('files/who/'.\App\Helpers\Whos::getOption('section_three_src')) }}" alt="">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="content">
                            <h2>{!! \App\Helpers\Whos::getOption('section_three_title_1_'.app()->getLocale()) !!}</h2>
                            <p>{!! \App\Helpers\Whos::getOption('section_three_text_'.app()->getLocale()) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our-mission SECTION -->
        <section class="our-mission " style="background: url({{ asset('nac/img/ourmission-bg.jpg') }});">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="content">
                            <h2>{!! \App\Helpers\Whos::getOption('section_four_title_1_'.app()->getLocale()) !!}</h2>
                            <p>{!! \App\Helpers\Whos::getOption('section_four_text_'.app()->getLocale()) !!}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="image">
                            @if(\App\Helpers\Whos::getOption('section_two_src'))
                                <img src="{{ asset('files/who/'.\App\Helpers\Whos::getOption('section_four_src')) }}" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- images carousel SECTION -->
        <section id="images_carousel " class="images_carousel">
            <div class="container-fluid">
                <div class="title">Some moments of N.A.C.</div>
                <div class="carousel">
                    <div class="items owl-carousel ">

                        @foreach($moments->chunk(2) as $chunk)
                        <div class="item">
                            <div class="inside_item">
                                @foreach($chunk as $moment)
                                <a data-fancybox="gallery" class="fancybox" href="{{ asset('files/who/'.$moment->src) }}" rel="gallery01">
                                    <img src="{{ asset('files/who/'.$moment->src) }}" alt="Some Moments">
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>

        <!-- flag part SECTION -->
        <section id="flag_part " class="flag_part">
            <div class="title">{{ \App\Helpers\Whos::getOption('title_1_'.app()->getLocale()) }}</div>
            <div class="text">
                <p>
                    {{ \App\Helpers\Whos::getOption('text_'.app()->getLocale()) }}
                </p>
            </div>
            <div class="wrapper">
                <a href="javascript:(0)" class="box blue " style="background-image: url({{ \App\Helpers\Whos::getOption('photo_1') == '' ? '' : asset('files/who/'.\App\Helpers\Whos::getOption('photo_1')) }});">
                    <div class="text">
                        {!! \App\Helpers\Whos::getOption('photo_1_text_'.app()->getLocale()) !!}
                    </div>
                </a>
                <a href="javascript:(0)" class="box red " style="background-image: url({{ \App\Helpers\Whos::getOption('photo_2') == '' ? '' : asset('files/who/'.\App\Helpers\Whos::getOption('photo_2')) }});">
                    <div class="text">
                        {!! \App\Helpers\Whos::getOption('photo_2_text_'.app()->getLocale()) !!}
                    </div>
                </a>
                <a href="javascript:(0)" class="box green " style="background-image: url({{ \App\Helpers\Whos::getOption('photo_3') == '' ? '' : asset('files/who/'.\App\Helpers\Whos::getOption('photo_3')) }});">
                    <div class="text">
                        {!! \App\Helpers\Whos::getOption('photo_3_text_'.app()->getLocale()) !!}
                    </div>
                </a>
            </div>
        </section>
    </main>

@endsection

@section('js')

@endsection
