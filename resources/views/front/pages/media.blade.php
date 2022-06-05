@extends('front.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <!-- MEDIA SECTION================= -->
    <main id="media">
        <!-- media -->
        <section class="media">
            <div class="container-fluid">
                <div class="row">
                    <div class="video-about">
                        <div class="col-lg-6 col-md-12">
                            <div class="image">
                                @if(\App\Helpers\Options::getOption('media_src'))
                                <img src="{{ asset('files/media/'.\App\Helpers\Options::getOption('media_src')) }}" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="content">
                                <h2>
                                    {{ \App\Helpers\Options::getOption('media_title_az') }}
                                </h2>
                                {!! \App\Helpers\Options::getOption('media_text_az') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <main id="main-global">
    <section class="media-gallery">
        <div class="container-fluid">
            <div class="row">
                <div class="media-blogs">
                    @foreach($blogs as $blog)
                    <div class="media_box col-xl-3 col-lg-4 col-md-6 " onclick="window.location.href='{!! route('media.details',['slug'=>$blog->{'slug_'.app()->getLocale()}]) !!}'">
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
                {!! $blogs->onEachSide(0)->links('vendor.pagination.custom') !!}
            </div>
        </div>
    </section>
    </main>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            function activator(id)
            {
                $('.activator').removeClass("active");
                $('#'+id).addClass("active");
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var limit       = 5;
            var start       = 0;
            var action      = 'inactive';
            var past        = 0;
            var menu_id     = 8;
            $('#pastBtn').click(function () {
                limit       = 5;
                start       = 0;
                action      = 'inactive';
                past        = 1;
                menu_id     = 8;
                $('#load_data').html('');
                load_blog(limit, start, past, menu_id);
                $('#loadMore').css('display','block');
            });

            $('#currentBtn').click(function () {
                limit       = 5;
                start       = 0;
                action      = 'inactive';
                past        = 0;
                menu_id     = 8;
                $('#load_data').html('');
                load_blog(limit, start, past, menu_id);
                $('#loadMore').css('display','block');
            });

            function load_blog(limit, start, past, menu_id)
            {
                $.ajax({
                    url:'{!! route('blog.loader') !!}',
                    method:"POST",
                    data:{limit:limit, start:start, past:past, menu_id:menu_id},
                    cache:false,
                    success:function(data)
                    {
                        $('#load_data').append(data);
                        if(data == '')
                        {
                            action = 'active';
                            $('#loadMore').css('display', 'none');
                        }
                        else
                        {
                            action = "inactive";
                        }
                    }
                });
            }

            if(action == 'inactive')
            {
                action = 'active';
                load_blog(limit, start, past, menu_id);
            }

            $('#loadMore').click(function () {
                if(action == 'inactive')
                {
                    action = 'active';
                    start = start + limit;
                    setTimeout(function(){
                        load_blog(limit, start, past, menu_id);
                    }, 1000);
                }
            });


        });
    </script>
@endsection
