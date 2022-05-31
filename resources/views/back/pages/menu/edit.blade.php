@extends('back.layout.master')

@section('title') Menus @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-10 offset-md-1">
                <a href="{{ route('menu.index') }}" class="btn btn-primary w-100">All</a>
            <form action="{{ route('menu.update',$menu->id) }}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            @method('PUT')
            <div class="row mt-3">
                <div class="form-group mb-3 col-md-4">
                    @if($menu->src != '')
                        <img src="{{ asset('files/menus/'.$menu->src) }}" alt="" style="width: 200px">
                    @endif
                </div>
                <div class="form-group mb-3 col-md-4">

                </div>
                <div class="form-group mb-3 col-md-4">

                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="src">Banner</label>
                    <input type="file" class="form-control @error('src') is-invalid  @enderror" id="src" name="src">
                    @error('src')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="link">Parent</label>
                    <select name="menu_id" id="menu_id" class="form-control @error('link') is-invalid  @enderror">
                        @foreach($parents as $item)
                            <option value="{{ $item['id'] }}" {{ $item['id'] == old('menu_id',$menu->getParent ? $menu->getParent->id : 0) ? 'selected' : '' }}>{{ $item['menu_en'] }}</option>
                        @endforeach
                    </select>
                    @error('menu_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="menu_az">Menu(AZ)</label>
                    <input type="text" class="form-control @error('menu_az') is-invalid  @enderror" name="menu_az" id="menu_az" value="{{ old('menu_az',$menu->menu_az) }}">
                    @error('menu_az')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="menu_en">Menu(EN)</label>
                    <input type="text" class="form-control @error('menu_en') is-invalid  @enderror" name="menu_en" id="menu_en" value="{{ old('menu_en',$menu->menu_en) }}">
                    @error('menu_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="title_az">Title(AZ)</label>
                    <input type="text" class="form-control @error('title_az') is-invalid  @enderror" name="title_az" id="title_az" value="{{ old('title_az',$menu->title_az) }}">
                    @error('title_az')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="title_en">Title(EN)</label>
                    <input type="text" class="form-control @error('title_en') is-invalid  @enderror" name="title_en" id="title_en" value="{{ old('title_en',$menu->title_en) }}">
                    @error('title_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="button_az">Button(AZ)</label>
                    <input type="text" class="form-control @error('button_az') is-invalid  @enderror" name="button_az" id="button_az" value="{{ old('button_az',$menu->button_az) }}">
                    @error('button_az')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="button_en">Button(EN)</label>
                    <input type="text" class="form-control @error('button_en') is-invalid  @enderror" name="button_en" id="button_en" value="{{ old('button_en',$menu->button_en) }}">
                    @error('button_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="link">Link</label>
                    <input type="text" class="form-control @error('link') is-invalid  @enderror" name="link" id="link" value="{{ old('link',$menu->link) }}">
                    @error('link')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label class="form-label" for="text_az">Text(AZ)</label>
                    <textarea name="text_az" id="text_az" class="form-control @error('text_az') is-invalid  @enderror" cols="30" rows="4">{{ old('text_az',$menu->text_az) }}</textarea>
                    @error('text_az')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label class="form-label" for="text_en">Text(EN)</label>
                    <textarea name="text_en" id="text_en" class="form-control @error('text_en') is-invalid  @enderror" cols="30" rows="4">{{ old('text_en',$menu->text_en) }}</textarea>
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

@endsection
