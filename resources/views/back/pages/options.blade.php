@extends('back.layout.master')

@section('meta')

@endsection

@section('title') Options @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">
            <div class="mb-3 col-md-8 offset-md-2">
                <form action="{{ route('option.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="unvan">Address(AZ *** EN)</label>
                        <input type="text" class="form-control @error('unvan') is-invalid  @enderror" id="unvan" name="unvan" value="{{ old('unvan',$unvan_az.'***'.$unvan_en) }}">
                        @error('unvan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="facebook">Facebook</label>
                        <input type="text" class="form-control @error('facebook') is-invalid  @enderror" id="facebook" name="facebook" value="{{ old('facebook',$facebook) }}">
                        @error('facebook')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

            <div class="form-group mb-3">
                        <label class="form-label" for="twitter">Twitter</label>
                        <input type="text" class="form-control @error('twitter') is-invalid  @enderror" id="twitter" name="twitter" value="{{ old('twitter',$twitter) }}">
                        @error('twitter')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            <div class="form-group mb-3">
                        <label class="form-label" for="youtube">YouTube</label>
                        <input type="text" class="form-control @error('youtube') is-invalid  @enderror" id="youtube" name="youtube" value="{{ old('youtube',$youtube) }}">
                        @error('youtube')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="instagram">Instagram</label>
                        <input type="text" class="form-control @error('instagram') is-invalid  @enderror" id="instagram" name="instagram" value="{{ old('instagram',$instagram) }}">
                        @error('instagram')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            <div class="form-group mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid  @enderror" id="email" name="email" value="{{ old('email',$email) }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            <div class="form-group mb-3">
                        <label class="form-label" for="tel">Telefon</label>
                        <input type="text" class="form-control @error('tel') is-invalid  @enderror" id="tel" name="tel" value="{{ old('tel',$tel) }}">
                        @error('tel')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary float-end" type="submit">ADD</button>
                    </div>
                </form>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')

@endsection

