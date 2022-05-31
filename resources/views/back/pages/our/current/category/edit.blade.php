@extends('back.layout.master')

@section('meta')

@endsection

@section('title') Category @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-8 offset-md-2">
                <form action="{{ route('current-issues-category.update',$currentIssuesCategory->id) }}" method="POST" enctype="multipart/form-data" class="mb-5">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="name_az">Name(AZ)</label>
                            <input type="text" class="form-control @error('name_az') is-invalid  @enderror" id="name_az" name="name_az" value="{{ old('name_az',$currentIssuesCategory->name_az) }}">
                            @error('name_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="name_en">Name(EN)</label>
                            <input type="text" class="form-control @error('name_en') is-invalid  @enderror" id="name_en" name="name_en" value="{{ old('name_en',$currentIssuesCategory->name_en) }}">
                            @error('name_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="title_az">Title(AZ)</label>
                            <input type="text" class="form-control @error('title_az') is-invalid  @enderror" id="title_az" name="title_az" value="{{ old('title_az',$currentIssuesCategory->title_az) }}">
                            @error('title_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="title_en">Title(EN)</label>
                            <input type="text" class="form-control @error('title_en') is-invalid  @enderror" id="title_en" name="title_en" value="{{ old('title_en',$currentIssuesCategory->title_en) }}">
                            @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="text_az">Text(AZ)</label>
                            <textarea name="text_az" id="text_az" class="form-control @error('text_az') is-invalid  @enderror" cols="30" rows="4">{{ old('text_az',$currentIssuesCategory->text_az) }}</textarea>
                            @error('text_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="text_en">Text(EN)</label>
                            <textarea name="text_en" id="text_en" class="form-control @error('text_en') is-invalid  @enderror" cols="30" rows="4">{{ old('text_en',$currentIssuesCategory->text_en) }}</textarea>
                            @error('text_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <a href="{{ route('current-issues-category.index') }}" class="btn btn-primary float-start">ADD</a>
                        <button class="btn btn-primary float-end">EDIT</button>
                    </div>
                </form>
                <hr>
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                    <tr>
                        <th>Name(AZ)</th>
                        <th>Name(EN)</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $item)
                    <tr>
                        <td data-label="Name(AZ)">{{ $item->name_az }}</td>
                        <td data-label="Name(EN)">{{ $item->name_en }}</td>
                        <td data-label="ACTION">
                            <div class="btn-list flex-nowrap">
                                <a href="{{ route('current-issues-category.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('current-issues-category.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('You are sure you want to delete it?')"><i class="fa fa-times"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
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

