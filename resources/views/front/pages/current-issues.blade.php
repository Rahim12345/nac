@extends('front.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <main id="current">
        <!-- current -->
        <section class="current ">
            <div class="bg" style="background: url({{ \App\Helpers\CurrentIssuesBanners::getOption('src') == '' ? : asset('files/current/'.\App\Helpers\CurrentIssuesBanners::getOption('src')) }});"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="content">
                            <h2></h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- current-text -->
        <section class="current-text">
            <div class="container-fluid">
                <div class="row">
                    <div class="pagination-box desktop">
                        <ul class="nav nav-tabs">
                            @foreach($issues as $issue)
                            <li class="nav-item ">
                                <a class="button nav-link {{ $loop->first ? 'active' : '' }}"   data-bs-toggle="tab" href="#{{ $issue->{'slug_'.app()->getLocale()} }}">{{ $issue->{'name_'.app()->getLocale()} }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="dropdown-box mobile ">
                        <label for="openDropdown" class="dropdown">
                            Landmines in Karabakh
                            <i class="fas fa-angle-down"></i>
                        </label>

                        <input type="checkbox" id="openDropdown" hidden>

                        <div class="dropdown-menu">
                            <ul class="nav desktop-3">
                                @foreach($issues as $issue)
                                <li class="active">
                                    <button  data-bs-toggle="tab" href="#{{ $issue->{'slug_'.app()->getLocale()} }}">{{ $issue->{'name_'.app()->getLocale()} }}</button>

                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    <div class="tab-content">
                        @foreach($issues as $issue)
                        <div class="col-lg-12 col-md-12 tab-pane {{ $loop->first ? ' active fade show' : 'fade' }}" id="{{ $issue->{'slug_'.app()->getLocale()} }}">
                            <div class="content">
                                <div>{!! $issue->{'title_'.app()->getLocale()} !!}</div>
                                {!! $issue->{'text_'.app()->getLocale()} !!}
                            </div>

                            <div class="share">
                                <span>Share:</span>
                                <ul>
                                    <li class="li active">
                                        <a class="button fb fb-share" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(env('APP_URL').'/current-issues#'.$issue->{'slug_'.app()->getLocale()}) }}">FACEBOOK</a>
                                    </li>
                                    <li class="li">
                                        <a class="button tw twitPop" href="https://twitter.com/intent/tweet?url={{ urlencode(env('APP_URL').'/current-issues#'.$issue->{'slug_'.app()->getLocale()}) }}">TWITTER</a>
                                    </li>
                                    <li class="li">
                                        <a class="button pr" href="javascript:(0)">PRINT</a>
                                    </li>
                                    <li class="li">
                                        <a class="button cl" href="javascript:(0)" onclick="copyToClipboard('{!! env('APP_URL').'/current-issues#'.$issue->{'slug_'.app()->getLocale()} !!}')">COPY LINK</a>
                                    </li>
                                </ul>
                            </div>


                        </div>
                        @endforeach
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
