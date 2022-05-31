@extends('back.layout.master')

@section('meta')

@endsection

@section('title') Banner @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-8 offset-md-2">
                <form action="{{ route('current-issues-banner.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
                    @csrf
                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            @if(\App\Helpers\CurrentIssuesBanners::getOption('src') != '')
                                <img src="{{ asset('files/current/'.\App\Helpers\CurrentIssuesBanners::getOption('src')) }}" alt="" style="width: 200px">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-md-12">
                            <label class="form-label" for="src">Photo</label>
                            <input type="file" class="form-control @error('src') is-invalid  @enderror" id="src" name="src">
                            @error('src')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary float-end">ADD</button>
                    </div>
                </form>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')

@endsection

