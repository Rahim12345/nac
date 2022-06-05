@extends('front.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <!-- MEDIA DETAILS================= -->
    <main id="mediadetails">
        <!-- media details SECTION -->
        <section class="mediadetails">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($blog->images as $image)
                    <div class="swiper-slide bg" >
                        <img src="{{ asset('files/blogs/'.$image->src) }}" alt="">
                        <div class="date">
                            Published on {{ Carbon\Carbon::parse($blog->created_at)->format('j  M, Y') }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </section>

        <!-- media details text SECTION -->
        <section class="mediadetails-text">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="content">
                            {!! $blog->{'text_'.app()->getLocale()} !!}
                        </div>
                        @include('front.includes.share')
                    </div>
                </div>
            </div>
        </section>
    </main>

    <main id="main-global">
        <!-- media gallery SECTION -->
        <section class="media-gallery mediadetails-gallery" >
            <div class="container-fluid">
                <div class="row">
                    <div class="title">More News</div>
                    <div class="media-blogs swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($more_news as $item)
                            <div class="media_box col-lg-3 col-md-6 swiper-slide "  onclick="window.location.href='{!! route('media.details',['slug'=>$item->{'slug_'.app()->getLocale()}]) !!}'">
                                <div class="imag">
                                    <img src="{{ $item->cover === null ? '' : asset('files/blogs/'.$item->cover->src) }}" alt="">
                                    <div class="date">
                                        {{ Carbon\Carbon::parse($item->created_at)->format('j  M, Y') }}
                                    </div>
                                </div>
                                <div class="content">
                                    <p>{!! mb_strlen($item->{'title_'.app()->getLocale()}) > 60 ? mb_substr($item->{'title_'.app()->getLocale()},0,60).'...' : $item->{'title_'.app()->getLocale()} !!}</p>
                                </div>

                            </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.fb-share').click(function(e) {
                e.preventDefault();
                window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
                return false;
            });
        });

        $('.twitPop').click(function(event) {
            var width  = 575,
                height = 400,
                left   = ($(window).width()  - width)  / 2,
                top    = ($(window).height() - height) / 2,
                url    = this.href,
                opts   = 'status=1' +
                    ',width='  + width  +
                    ',height=' + height +
                    ',top='    + top    +
                    ',left='   + left;
            window.open(url, 'twitter', opts);
            return false;
        });

        function copyToClipboard(text) {
            var sampleTextarea = document.createElement("textarea");
            document.body.appendChild(sampleTextarea);
            sampleTextarea.value = text;
            sampleTextarea.select();
            document.execCommand("copy");
            document.body.removeChild(sampleTextarea);
            toastr.success(text,'Copied');
        }
    </script>
@endsection
