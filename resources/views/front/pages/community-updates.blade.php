@extends('front.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <!-- COMUNITY SECTION================= -->
    <main id="community">
        <!-- community -->
        <section class="community">
            <div class="bg" style="background: url({{ asset('files/pages-banners/'.\App\Helpers\Options::getOption('community_banner_src')) }});"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="content">
                            <h2>{!! \App\Helpers\Options::getOption('community_banner_title_'.app()->getLocale()) !!}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- community blogs -->
        <section class="community-blogs">
            <div class="container-fluid">
                <div class="row">
                    <div  id="load_data"></div>
                    <div class="more">
                        <a class="button" href="javascript:(0)" id="loadMore">Load more<i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@section('js')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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
            var menu_id     = 9;
            $('#pastBtn').click(function () {
                limit       = 5;
                start       = 0;
                action      = 'inactive';
                past        = 1;
                menu_id     = 9;
                $('#load_data').html('');
                load_blog(limit, start, past, menu_id);
                $('#loadMore').css('display','block');
            });

            $('#currentBtn').click(function () {
                limit       = 5;
                start       = 0;
                action      = 'inactive';
                past        = 0;
                menu_id     = 9;
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
