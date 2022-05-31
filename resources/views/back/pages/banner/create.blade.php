@extends('back.layout.master')

@section('title') Kateqoriya yarat @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-10 offset-md-1">
            <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
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
                    <input type="text" class="form-control @error('title_az') is-invalid  @enderror" name="title_az" id="title_az" value="{{ old('title_az') }}">
                    @error('title_az')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="title_en">Title(EN)</label>
                    <input type="text" class="form-control @error('title_en') is-invalid  @enderror" name="title_en" id="title_en" value="{{ old('title_en') }}">
                    @error('title_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="button_az">Button(AZ)</label>
                    <input type="text" class="form-control @error('button_az') is-invalid  @enderror" name="button_az" id="button_az" value="{{ old('button_az') }}">
                    @error('button_az')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="button_en">Button(EN)</label>
                    <input type="text" class="form-control @error('button_en') is-invalid  @enderror" name="button_en" id="button_en" value="{{ old('button_en') }}">
                    @error('button_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="link">Link</label>
                    <input type="text" class="form-control @error('link') is-invalid  @enderror" name="link" id="link" value="{{ old('link') }}">
                    @error('link')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label class="form-label" for="text_az">Text(AZ)</label>
                    <textarea name="text_az" id="text_az" class="form-control @error('text_az') is-invalid  @enderror" cols="30" rows="4">{{ old('text_az') }}</textarea>
                    @error('text_az')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label class="form-label" for="text_en">Text(EN)</label>
                    <textarea name="text_en" id="text_en" class="form-control @error('text_en') is-invalid  @enderror" cols="30" rows="4">{{ old('text_en') }}</textarea>
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

@endsection
