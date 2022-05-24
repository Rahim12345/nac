@extends('back.layout.master')

@section('title') Banners @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">
            <div class="mb-3 col-md-8 offset-md-2">
                <a href="{{ route('banner.create') }}" class="btn btn-primary w-100">Add</a>
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Title(AZ)</th>
                        <th>Title(EN)</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @foreach($banners as $item)
                        <tr>
                            <td data-label="Photo"><img src="{{ $item->src === null ? '' : asset('files/banners/'.$item->src) }}" class="empty-img w-25" alt=""></td>
                            <td data-label="Title(AZ)">{{ $item->title_az }}</td>
                            <td data-label="Title(EN)">{{ $item->title_en }}</td>
                            <td data-label="Action">
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('banner.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('banner.destroy',$item->id) }}" method="POST">
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
