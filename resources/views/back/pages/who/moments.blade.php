@extends('back.layout.master')

@section('meta')

@endsection

@section('title') Who - some moments @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-8 offset-md-2">
                <form action="{{ route('moment.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
                    @csrf
                    <div class="row">
                        <div class="form-group mb-3 col-md-12">
                            <label class="form-label" for="src">Photo</label>
                            <input type="file" class="form-control @error('src') is-invalid  @enderror" id="src" name="src">
                            @error('src')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary float-end">ADD</button>
                    </div>
                </form>
                <hr>
                <table class="table">
                    @foreach($moments as $moment)
                    <tr>
                        <td><img src="{{ asset('files/who/'.$moment->src) }}" style="width: 100px" alt=""></td>
                        <td>
                            <div class="btn-list flex-nowrap">
                                <form action="{{ route('moment.destroy',$moment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('You are sure you want to delete it?')"><i class="fa fa-times"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')

@endsection

