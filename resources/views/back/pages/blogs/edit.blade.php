@extends('back.layout.master')

@section('title') Blogs @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-10 offset-md-1">
                <a href="{{ route('blog.list',['menu_id'=>$menu_id]) }}" class="btn btn-primary w-100">ALL</a>
                <form action="{{ route('blog.update',$id) }}" method="POST" enctype="multipart/form-data" class="mb-5">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="menu_id" value="{{ $menu_id }}">
                    @if($blog->images->count())
                        <div class="row mt-3">
                            @foreach($blog->images as $image)
                                @if($image->src)
                                <div class="col-md-1 me-4">
                                    <img src="{{ asset('files/blogs/'.$image->src) }}" style="width: 100px;height: 100px" alt="">
                                    <a href="{{ route('blog.image.deleter',['id'=>$image->id]) }}" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};" class="btn btn-danger btn-sm float-end" style="position: absolute;"><i class="fa fa-times"></i></a>
                                    <div class="form-check">
                                        <input class="form-check-input isCover" type="radio" name="is_cover" data-id="{{ $image->id }}" id="is_cover_{{ $loop->iteration }}" {{ $image->is_cover ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_cover_{{ $loop->iteration }}">
                                            Cover
                                        </label>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        @if($menu_id  == 8 || $menu_id  == 9)
                            <div class="form-group mb-3 col-md-12">
                                <label class="form-label" for="src">Photo</label>
                                <input type="file" class="form-control @error('src') is-invalid  @enderror" id="src" name="src[]" multiple="multiple">
                                @error('src')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @else
                            <div class="form-group mb-3 col-md-12">
                                <label class="form-label" for="src">Photo</label>
                                <input type="file" class="form-control @error('src') is-invalid  @enderror" id="src" name="src">
                                @error('src')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif

                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="title_az">Title(AZ)</label>
                            <input type="text" class="form-control @error('title_az') is-invalid  @enderror" name="title_az" id="title_az" value="{{ old('title_az',$blog->title_az) }}">
                            @error('title_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="title_en">Title(EN)</label>
                            <input type="text" class="form-control @error('title_en') is-invalid  @enderror" name="title_en" id="title_en" value="{{ old('title_en',$blog->title_en) }}">
                            @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="intro_text_az">Intro(AZ)</label>
                            <textarea class="form-control @error('intro_text_az') is-invalid  @enderror" name="intro_text_az" id="intro_text_az" cols="30" rows="4">{{ old('intro_text_az',$blog->intro_text_az) }}</textarea>
                            @error('intro_text_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="intro_text_en">Intro(EN)</label>
                            <textarea class="form-control @error('intro_text_en') is-invalid  @enderror" name="intro_text_en" id="intro_text_en" cols="30" rows="4">{{ old('intro_text_en',$blog->intro_text_en) }}</textarea>
                            @error('intro_text_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="text_az">Text(AZ)</label>
                            <textarea name="text_az" id="text_az" class="form-control @error('text_az') is-invalid  @enderror" cols="30" rows="4">{{ old('text_az',$blog->text_az) }}</textarea>
                            @error('text_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="text_en">Text(EN)</label>
                            <textarea name="text_en" id="text_en" class="form-control @error('text_en') is-invalid  @enderror" cols="30" rows="4">{{ old('text_en',$blog->text_en) }}</textarea>
                            @error('text_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary float-end">EDIT</button>
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

            $('.isCover').change(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let id = $(this).attr('data-id');
                $.ajax({
                    type : 'POST',
                    data : { id : id },
                    url  : '{!! route('blog.is_cover') !!}',
                    success : function (response) {
                        toastr.success('Cover changed');
                    },
                    error : function (myErrors) {
                        $.each(myErrors.responseJSON.errors, function (key, value) {
                            toastr.error(value);
                        });
                    }
                });
            });
        });
    </script>
@endsection
