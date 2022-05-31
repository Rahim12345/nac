@extends('back.layout.master')

@section('title') Menus @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">
            <div class="mb-3 col-md-8 offset-md-2">
                <a href="{{ route('menu.create') }}" class="btn btn-primary w-100">Add</a>
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                    <tr>
                        <th>Banner</th>
                        <th>Menu(AZ)</th>
                        <th>Menu(EN)</th>
                    </tr>
                    </thead>
                    @foreach($menus as $item)
                        @if($item->parent_id == 0)
                        <tr>
                            <td data-label="Banner" style="width: 25%"><img src="{{ $item->src === null ? '' : asset('files/menus/'.$item->src) }}" class="empty-img w-50" alt=""></td>
                            <td data-label="Menu(AZ)">
                                <p>{{ $item->menu_az }}</p>
                                @if($item->children->count() > 0)
                                @foreach($item->children as $submenu)
                                    <p><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-{{ $submenu->menu_az }}</p>
                                @endforeach
                                @endif
                            </td>
                            <td data-label="Menu(EN)">
                                <p>
                                    {{ $item->menu_en }}
                                    @if($item->default == 0)
                                    <a href="{{ route('menu.deleter',$item->id) }}" class="mb-3 float-end btn btn-danger btn-sm" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};"><i class="fa fa-times"></i></a>
                                    @endif
                                    <a href="{{ route('menu.edit',$item->id) }}" class="mb-3 float-end btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
                                </p>
                                @if($item->children->count() > 0)
                                @foreach($item->children as $submenu)
                                    <p><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-{{ $submenu->menu_en }}
                                        @if($submenu->default == 0)
                                        <a href="{{ route('menu.deleter',$submenu->id) }}" class="mb-3 float-end btn btn-danger btn-sm" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};"><i class="fa fa-times"></i></a>
                                        @endif
                                        <a href="{{ route('menu.edit',$submenu->id) }}" class="mb-3 float-end btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
                                    </p>
                                @endforeach
                                @endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')
{{--    <script type="text/javascript">--}}
{{--        var elems = document.getElementsByClassName('confirmation');--}}
{{--        var confirmIt = function (e) {--}}
{{--            if (!confirm('Are you sure?')) e.preventDefault();--}}
{{--        };--}}
{{--        for (var i = 0, l = elems.length; i < l; i++) {--}}
{{--            elems[i].addEventListener('click', confirmIt, false);--}}
{{--        }--}}
{{--    </script>--}}
@endsection
