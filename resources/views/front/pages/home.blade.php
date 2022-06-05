@extends('front.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <main id="home">
        <!-- MAIN SLIDER SECTION -->
        <section class="main-slider">
            <div class="container-fluid">
                <div class="row">
                    <div class="swiper-container">
                        <div class="swiper-wrapper" >
                            @foreach($banners as $banner)
                            <div class="swiper-slide image" style="background: url('{!! asset('files/banners/'.$banner->src) !!}');">
                                <div class="title">
                                    <h1>{!! $banner->{'title_'.app()->getLocale()} !!}</h1>
                                    <span>{!! $banner->{'text_'.app()->getLocale()} !!}</span>
                                    <a class="button" href="{!! $banner->link !!}">{!! $banner->{'button_'.app()->getLocale()} !!}<i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                            @endforeach
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
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <!-- ourmission SECTION -->
        <section class="ourmission">
            <div id="bg-desk" class="bg" style="background: url({{ \App\Helpers\Missions::getOption('src') == '' ? '' : asset('files/mission/'.\App\Helpers\Missions::getOption('src')) }});"></div>
            <div id="bg-mobile" class="bg-mobile">
                @if(\App\Helpers\Missions::getOption('src_mobile') != '')
                <img src="{{ asset('files/mission/'.\App\Helpers\Missions::getOption('src_mobile')) }}" alt="">
                @endif
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="content">
                            <span>{!! \App\Helpers\Missions::getOption('title_1_'.app()->getLocale()) !!}</span>
                            <h2>{!! \App\Helpers\Missions::getOption('title_2_'.app()->getLocale()) !!}</h2>
                            <p>{!! \App\Helpers\Missions::getOption('text_'.app()->getLocale()) !!}</p>
                            <a class="button" href="{!! \App\Helpers\Missions::getOption('link') !!}">{!! \App\Helpers\Missions::getOption('button_'.app()->getLocale()) !!}<i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- involved SECTION -->
        <section class="involved" >
            <div class="bg" style="background:url({{ \App\Helpers\Involves::getOption('src') == '' ? '' : asset('files/involve/'.\App\Helpers\Involves::getOption('src')) }});"></div>
            <div id="bg-mobile" class="bg-mobile">
                @if(\App\Helpers\Involves::getOption('src_mobile') != '')
                <img src="{{ asset('files/involve/'.\App\Helpers\Involves::getOption('src_mobile')) }}" alt="">
                @endif
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="content">
                            <span>{!! \App\Helpers\Involves::getOption('title_1_'.app()->getLocale()) !!}</span>
                            <h2>{!! \App\Helpers\Involves::getOption('title_2_'.app()->getLocale()) !!}</h2>
                            <p>{!! \App\Helpers\Involves::getOption('text_'.app()->getLocale()) !!}</p>
                            <a class="button" href="{!! \App\Helpers\Involves::getOption('link') !!}">{!! \App\Helpers\Involves::getOption('button_'.app()->getLocale()) !!}<i class="fa-solid fa-arrow-right"></i></a>
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
                        <div class="col-lg-9 col-md-8 col ff1">
                            <div class="image">
                                @if(\App\Helpers\Presses::getOption('src') != '')
                                    <img src="{{ asset('files/press/'.\App\Helpers\Presses::getOption('src')) }}" alt="">
                                @endif
                                <div class="content">
                                    <h2>{!! \App\Helpers\Presses::getOption('title_1_'.app()->getLocale()) !!}</h2>
                                    <p>{!! \App\Helpers\Presses::getOption('text_'.app()->getLocale()) !!}</p>
                                    <a class="button " href="{!! \App\Helpers\Presses::getOption('link') !!}">{!! \App\Helpers\Presses::getOption('button_'.app()->getLocale()) !!}<i
                                            class="fa-solid fa-arrow-right "></i></a>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col ff2">
                            <div class="twitter">
                                <div class="title-header">
                                    <h2>Lorem, ipsum dolor Twitter</h2>
                                </div>
                                <div class="box">
                                    <a class="twitter-timeline" href="https://twitter.com/azcanet?ref_src=twsrc%5Etfw">Tweets by azcanet</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="press-blogs swiper-container">

                        <div class="swiper-wrapper">
                            @foreach($news as $blog)
                            <div class="press_blog swiper-slide col-lg-3 col-md-6 col-sm-6" onclick="media('media.html')">
                                <div class="imag">
                                    <img src="{{ $blog->cover === null ? '' : asset('files/blogs/'.$blog->cover->src) }}" alt="">
                                    <div class="date">
                                        {{ Carbon\Carbon::parse($blog->created_at)->format('j  M, Y') }}
                                    </div>
                                </div>
                                <div class="content">
                                    <p>{!! mb_strlen($blog->{'title_'.app()->getLocale()}) > 60 ? mb_substr($blog->{'title_'.app()->getLocale()},0,60).'...' : $blog->{'title_'.app()->getLocale()} !!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="more ">
                        <a class="button" href="media.html">See more<i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>


                </div>
            </div>
        </section>

        <!-- peoples-mission SECTION -->
        <section class="peoples-mission">
            <div class="bg" style="background: url({{ \App\Helpers\PMissions::getOption('src') == '' ? '' : asset('files/pmission/'.\App\Helpers\PMissions::getOption('src')) }});"></div>
            <div id="bg-mobile" class="bg-mobile">
                @if(\App\Helpers\PMissions::getOption('src_mobile') != '')
                    <img src="{{ asset('files/pmission/'.\App\Helpers\PMissions::getOption('src_mobile')) }}" alt="">
                @endif
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="content">
                            <h2>{!! \App\Helpers\PMissions::getOption('title_1_'.app()->getLocale()) !!}</h2>
                            <p>{!! \App\Helpers\PMissions::getOption('text_'.app()->getLocale()) !!}</p>
                            <a class="button" href="{!! \App\Helpers\PMissions::getOption('link') !!}">{!! \App\Helpers\PMissions::getOption('button_'.app()->getLocale()) !!}<i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')

@endsection
