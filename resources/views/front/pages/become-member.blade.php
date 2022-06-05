@extends('front.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <main id="become">
        <!-- become-member SECTION -->
        <section class="become-banner">
            <div class="bg" style="background: url({{ asset('files/pages-banners/'.\App\Helpers\Options::getOption('statements_banner_src')) }});"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="content">
                            <h2>{!! \App\Helpers\Options::getOption('become_a_member_banner_title_'.app()->getLocale()) !!}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- become-member SECTION -->
        <section class="become-text">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="content">
                            {!! \App\Helpers\Options::getOption('become_member_text_'.app()->getLocale()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- accordions SECTION -->
        <section class="accordions">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h2>{{ \App\Helpers\Options::getOption('become_member_membership_options') }}</h2>
                        <div class="accordion">
                            @foreach($memberships as $membership)
                            @if($loop->first)
                            <div class="accordion-item">
                                <button id="accordion-button-1" aria-expanded="true">
                                    <span class="accordion-title">{{ $membership->{'option_title_'.app()->getLocale()} }}</span>
                                    <span class="icon" aria-hidden="true"> </span>
                                </button>
                                <div class="accordion-content">
                                    <p>{{ $membership->{'option_text_'.app()->getLocale()} }}</p>
                                </div>
                            </div>
                            @else
                            <div class="accordion-item">
                                <button id="accordion-button-2" aria-expanded="false">
                                    <span class="accordion-title">{{ $membership->{'option_title_'.app()->getLocale()} }}</span>
                                    <span class="icon" aria-hidden="true"> </span>
                                </button>
                                <div class="accordion-content">
                                    <p>{{ $membership->{'option_text_'.app()->getLocale()} }}</p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- become-call SECTION -->

        <section class="become-call">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="call">
                            <span>{{ \App\Helpers\Options::getOption('become_member_additional_questions') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')

@endsection
