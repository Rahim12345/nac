@extends('back.layout.master')

@section('title') Banners @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-10 offset-md-1">
                <form action="{{ route('banner.update',$banner->id) }}" method="POST" enctype="multipart/form-data" class="mb-5">
                    @csrf
                    @method('PUT')
                        @if($banner->src != '')
                            <img src="{{ asset('files/banners/'.$banner->src) }}" alt="" style="width: 200px">
                        @endif
                    <div class="row">
                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="src">Photo</label>
                            <input type="file" class="form-control @error('src') is-invalid  @enderror" id="src" name="src">
                            @error('src')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="title_az">Title(AZ)</label>
                            <input type="text" class="form-control @error('title_az') is-invalid  @enderror" name="title_az" id="title_az" value="{{ old('title_az',$banner
->title_az) }}">
                            @error('title_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="title_en">Title(EN)</label>
                            <input type="text" class="form-control @error('title_en') is-invalid  @enderror" name="title_en" id="title_en" value="{{ old('title_en',$banner
->title_en) }}">
                            @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="text_az">Text(AZ)</label>
                            <input type="text" class="form-control @error('text_az') is-invalid  @enderror" name="text_az" id="text_az" value="{{ old('text_az',$banner
->text_az) }}">
                            @error('text_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="text_en">Text(EN)</label>
                            <input type="text" class="form-control @error('text_en') is-invalid  @enderror" name="text_en" id="text_en" value="{{ old('text_en',$banner
->text_en) }}">
                            @error('text_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="button_az">Button(AZ)</label>
                            <input type="text" class="form-control @error('button_az') is-invalid  @enderror" name="button_az" id="button_az" value="{{ old('button_az',$banner
->button_az) }}">
                            @error('button_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="button_en">Button(EN)</label>
                            <input type="text" class="form-control @error('button_en') is-invalid  @enderror" name="button_en" id="button_en" value="{{ old('button_en',$banner
->button_en) }}">
                            @error('button_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label class="form-label" for="link">Link</label>
                            <input type="text" class="form-control @error('link') is-invalid  @enderror" name="link" id="link" value="{{ old('link',$banner
->link) }}">
                            @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary float-end">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')

@endsection
