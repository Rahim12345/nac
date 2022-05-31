@extends('back.layout.master')

@section('meta')

@endsection

@section('title') Who - statistics @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-10 offset-md-1">
                <form action="{{ route('back.statistics.post') }}" method="POST" enctype="multipart/form-data" class="mb-5">
                    @csrf
                    <div class="row">
                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="members">Members</label>
                            <input type="text" class="form-control @error('members') is-invalid  @enderror" name="members" id="members" value="{{ old('members',\App\Helpers\Whos::getOption('members')) }}">
                            @error('members')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="events">Organized events</label>
                            <input type="text" class="form-control @error('events') is-invalid  @enderror" name="events" id="events" value="{{ old('events',\App\Helpers\Whos::getOption('events')) }}">
                            @error('events')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="members">Parliament members</label>
                            <input type="text" class="form-control @error('parliament') is-invalid  @enderror" name="parliament" id="parliament" value="{{ old('parliament',\App\Helpers\Whos::getOption('parliament')) }}">
                            @error('parliament')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="form-label" for="members">Programs</label>
                            <input type="text" class="form-control @error('programs') is-invalid  @enderror" name="programs" id="programs" value="{{ old('programs',\App\Helpers\Whos::getOption('programs')) }}">
                            @error('programs')
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

