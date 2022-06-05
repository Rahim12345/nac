@extends('front.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <main id="take-action-details">
        <!-- Take action details SECTION -->
        <section class="takedetails">
            <div class="bg" style="background: url({{ asset('files/pages-banners/'.\App\Helpers\Options::getOption('take_action_banner_src')) }});"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="content">
                            <h2>{!! \App\Helpers\Options::getOption('take_action_banner_title_'.app()->getLocale()) !!}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- takedetails-text SECTION -->
        <section class="takedetails-text">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="content">
                            <div>{!! $blog->{'title_'.app()->getLocale()} !!}</div>

                            {!! $blog->{'text_'.app()->getLocale()} !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')

@endsection
