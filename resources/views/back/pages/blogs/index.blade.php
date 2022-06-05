@extends('back.layout.master')

@section('title') Blogs @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">
            <div class="mb-3 col-md-8 offset-md-2">
                <a href="{{ route('blog.create',['menu_id'=>$menu_id]) }}" class="btn btn-primary w-100">Add</a>
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Title(AZ)</th>
                        <th>Title(EN)</th>
                        @if($menu_id == 4)
                            <th>Past</th>
                        @endif
                        <th>Action</th>
                    </tr>
                    </thead>
                    @foreach($blogs as $item)
                        <tr>
                            <td data-label="Photo">
                                <img src="{{ $item->cover === null ? '' : asset('files/blogs/'.$item->cover->src) }}" style="width: 100px" class="empty-img" alt="">
                            </td>
                            <td data-label="Title(AZ)">{{ $item->title_az }}</td>
                            <td data-label="Title(EN)">{{ $item->title_en }}</td>
                            @if($menu_id == 4)
                                <td>{!! $item->past == 0 ? '<a href="'.route('blog.past',['menu_id'=>$menu_id,'id'=>$item->id]).'" class="btn btn-danger"><i class="fa fa-times"></i></a>' : '<a href="'.route('blog.past',['menu_id'=>$menu_id,'id'=>$item->id]).'" class="btn btn-primary"><i class="fa fa-check"></i></a>' !!}</td>
                            @endif
                            <td data-label="Action">
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('blog.edit',['menu_id'=>$menu_id,'id'=>$item->id]) }}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                    <form action="{{ route('blog.destroy',$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('You are sure you want to delete it?')"><i class="fa fa-times"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')

@endsection
