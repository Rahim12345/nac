@extends('back.layout.master')

@section('meta')

@endsection

@section('title') Subscribe @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-10 offset-md-1">
                <form action="{{ route('subscribe.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
                    @csrf
                    @if(\App\Helpers\Subscribes::getOption('src') != '')
                        <img src="{{ asset('files/subscribe/'.\App\Helpers\Subscribes::getOption('src')) }}" alt="" style="width: 200px">
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
                            <label class="form-label" for="title_1_az">Title(AZ)</label>
                            <input type="text" class="form-control @error('title_1_az') is-invalid  @enderror" name="title_1_az" id="title_1_az" value="{{ old('title_1_az',\App\Helpers\Subscribes::getOption('title_1_az')) }}">
                            @error('title_1_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="title_1_en">Title(EN)</label>
                            <input type="text" class="form-control @error('title_1_en') is-invalid  @enderror" name="title_1_en" id="title_1_en" value="{{ old('title_1_en',\App\Helpers\Subscribes::getOption('title_1_en')) }}">
                            @error('title_1_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="text_az">Text(AZ)</label>
                            <input type="text" class="form-control @error('text_az') is-invalid  @enderror" name="text_az" id="text_az" value="{{ old('text_az',\App\Helpers\Subscribes::getOption('text_az')) }}">
                            @error('text_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="text_en">Text(EN)</label>
                            <input type="text" class="form-control @error('text_en') is-invalid  @enderror" name="text_en" id="text_en" value="{{ old('text_en',\App\Helpers\Subscribes::getOption('text_en')) }}">
                            @error('text_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="button_az">Button(AZ)</label>
                            <input type="text" class="form-control @error('button_az') is-invalid  @enderror" name="button_az" id="button_az" value="{{ old('button_az',\App\Helpers\Subscribes::getOption('button_az')) }}">
                            @error('button_az')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="button_en">Button(EN)</label>
                            <input type="text" class="form-control @error('button_en') is-invalid  @enderror" name="button_en" id="button_en" value="{{ old('button_en',\App\Helpers\Subscribes::getOption('button_en')) }}">
                            @error('button_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-md-8">
                            <label class="form-label" for="link">Link</label>
                            <input type="text" class="form-control @error('link') is-invalid  @enderror" name="link" id="link" value="{{ old('link',\App\Helpers\Subscribes::getOption('link')) }}">
                            @error('link')
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

