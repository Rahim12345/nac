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
                <form action="{{ route('back.page.banner.post') }}" method="POST" enctype="multipart/form-data" class="mb-5">
                    @csrf
                    <input type="hidden" name="key" value="{{ $key }}">
                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            @if(\App\Helpers\Options::getOption($key.'_src') != '')
                                <img src="{{ asset('files/pages-banners/'.\App\Helpers\Options::getOption($key.'_src')) }}" alt="" style="width: 200px">
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

                        @if(request()->segment(3) != 'statements_banner')
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="title_az">Title(AZ)</label>
                            <textarea class="form-control @error('title_az') is-invalid  @enderror" name="title_az" id="title_az" cols="30" rows="4">{{ old('title_az',\App\Helpers\Options::getOption($key.'_title_az')) }}</textarea>
                            @error('title_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="title_en">Title(EN)</label>
                            <textarea class="form-control @error('title_en') is-invalid  @enderror" name="title_en" id="title_en" cols="30" rows="4">{{ old('title_en',\App\Helpers\Options::getOption($key.'_title_en')) }}</textarea>
                            @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
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
    @if(request()->segment(3) != 'statements_banner')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('title_az',{
                language: '{{ app()->getLocale() }}',
                filebrowserImageBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Images&_token={!! csrf_token() !!}',
                filebrowserBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Files',
                filebrowserUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Files&_token={!! csrf_token() !!}',
                toolbarGroups :[
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                    { name: 'insert' },
                    { name: 'forms' },
                    { name: 'styles' },
                    { name: 'colors' },
                    { name: 'tools'}
                ],
            });

            CKEDITOR.replace('title_en',{
                language: '{{ app()->getLocale() }}',
                filebrowserImageBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Images&_token={!! csrf_token() !!}',
                filebrowserBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Files',
                filebrowserUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Files&_token={!! csrf_token() !!}',
                toolbarGroups :[
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                    { name: 'insert' },
                    { name: 'forms' },
                    { name: 'styles' },
                    { name: 'colors' },
                    { name: 'tools'}
                ],
            });
        });
    </script>
    @endif
@endsection

