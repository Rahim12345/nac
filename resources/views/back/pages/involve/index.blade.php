@extends('back.layout.master')

@section('meta')

@endsection

@section('title') Involve @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-10 offset-md-1">
                <form action="{{ route('involve.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
                    @csrf

                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            @if(\App\Helpers\Involves::getOption('src') != '')
                                <img src="{{ asset('files/involve/'.\App\Helpers\Involves::getOption('src')) }}" alt="" style="width: 200px">
                            @endif
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            @if(\App\Helpers\Involves::getOption('src_mobile') != '')
                                <img src="{{ asset('files/involve/'.\App\Helpers\Involves::getOption('src_mobile')) }}" alt="" style="width: 200px">
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="src">Photo(destkop)</label>
                            <input type="file" class="form-control @error('src') is-invalid  @enderror" id="src" name="src">
                            @error('src')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="src_mobile">Photo(mobile)</label>
                            <input type="file" class="form-control @error('src_mobile') is-invalid  @enderror" id="src_mobile" name="src_mobile">
                            @error('src_mobile')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="title_1_az">Title 1(AZ)</label>
                            <input type="text" class="form-control @error('title_1_az') is-invalid  @enderror" name="title_1_az" id="title_1_az" value="{{ old('title_1_az',\App\Helpers\Involves::getOption('title_1_az')) }}">
                            @error('title_1_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="title_1_en">Title 1(EN)</label>
                            <input type="text" class="form-control @error('title_1_en') is-invalid  @enderror" name="title_1_en" id="title_1_en" value="{{ old('title_1_en',\App\Helpers\Involves::getOption('title_1_en')) }}">
                            @error('title_1_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="title_2_az">Title 2(AZ)</label>
                            <input type="text" class="form-control @error('title_2_az') is-invalid  @enderror" name="title_2_az" id="title_2_az" value="{{ old('title_2_az',\App\Helpers\Involves::getOption('title_2_az')) }}">
                            @error('title_2_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="title_2_en">Title 2(EN)</label>
                            <input type="text" class="form-control @error('title_2_en') is-invalid  @enderror" name="title_2_en" id="title_en" value="{{ old('title_2_en',\App\Helpers\Involves::getOption('title_2_en')) }}">
                            @error('title_2_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="button_az">Button(AZ)</label>
                            <input type="text" class="form-control @error('button_az') is-invalid  @enderror" name="button_az" id="button_az" value="{{ old('button_az',\App\Helpers\Involves::getOption('button_az')) }}">
                            @error('button_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="button_en">Button(EN)</label>
                            <input type="text" class="form-control @error('button_en') is-invalid  @enderror" name="button_en" id="button_en" value="{{ old('button_en',\App\Helpers\Involves::getOption('button_en')) }}">
                            @error('button_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label class="form-label" for="link">Link</label>
                            <input type="text" class="form-control @error('link') is-invalid  @enderror" name="link" id="link" value="{{ old('link',\App\Helpers\Involves::getOption('link')) }}">
                            @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="text_az">Text(AZ)</label>
                            <textarea name="text_az" id="text_az" class="form-control @error('text_az') is-invalid  @enderror" cols="30" rows="4">{{ old('text_az',\App\Helpers\Involves::getOption('text_az')) }}</textarea>
                            @error('text_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="text_en">Text(EN)</label>
                            <textarea name="text_en" id="text_en" class="form-control @error('text_en') is-invalid  @enderror" cols="30" rows="4">{{ old('text_en',\App\Helpers\Involves::getOption('text_en')) }}</textarea>
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
        });
    </script>
@endsection

