@extends('back.layout.master')

@section('meta')

@endsection

@section('title') Media @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-8 offset-md-2">
                <form action="{{ route('media.text.post') }}" method="POST" enctype="multipart/form-data" class="mb-5">
                    @csrf
                    <div class="row">
                        @if(\App\Helpers\Options::getOption('media_src'))
                            <img src="{{ asset('files/media/'.\App\Helpers\Options::getOption('media_src')) }}" style="width: 100px" alt="">
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-md-12">
                            <label class="form-label" for="src">Photo</label>
                            <input type="file" class="form-control @error('src') is-invalid  @enderror" name="src" id="src">
                            @error('src')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="title_az">Title(AZ)</label>
                            <input type="text" class="form-control @error('title_az') is-invalid  @enderror" name="title_az" id="title_az" value="{{ \App\Helpers\Options::getOption('media_title_az') }}">
                            @error('title_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="title_en">Title(EN)</label>
                            <input type="text" class="form-control @error('title_en') is-invalid  @enderror" name="title_en" id="title_en" value="{{ \App\Helpers\Options::getOption('media_title_en') }}">
                            @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="text_az">Text(AZ)</label>
                            <textarea class="form-control @error('text_az') is-invalid  @enderror" name="text_az" id="text_az" cols="30" rows="4">{{ old('text_az',\App\Helpers\Options::getOption('media_text_az')) }}</textarea>
                            @error('text_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="text_en">Text(EN)</label>
                            <textarea class="form-control @error('text_en') is-invalid  @enderror" name="text_en" id="text_en" cols="30" rows="4">{{ old('text_en',\App\Helpers\Options::getOption('media_text_en')) }}</textarea>
                            @error('text_en')
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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('text_en',{
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

            CKEDITOR.replace('text_az',{
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
@endsection

