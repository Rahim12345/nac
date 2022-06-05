@extends('back.layout.master')

@section('title') Membership @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">
            <div class="mb-3 col-md-8 offset-md-2">
                <div class="row">
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label" for="membership_options">Membership options</label>
                        <input type="text" class="form-control otherFields @error('membership_options') is-invalid  @enderror" name="membership_options" id="membership_options" value="{{ \App\Helpers\Options::getOption('become_member_membership_options') }}">
                        @error('membership_options')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-label" for="additional_questions">Additional questions</label>
                        <textarea class="form-control otherFields @error('additional_questions') is-invalid  @enderror" name="additional_questions" id="additional_questions" cols="30" rows="4">{{ \App\Helpers\Options::getOption('become_member_additional_questions') }}</textarea>
                        @error('additional_questions')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <a href="{{ route('membership.create') }}" class="btn btn-primary w-100">Add</a>
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                    <tr>
                        <th>Title(AZ)</th>
                        <th>Title(EN)</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @foreach($memberships as $item)
                        <tr>
                            <td data-label="Title(AZ)">{{ $item->option_title_az }}</td>
                            <td data-label="Title(EN)">{{ $item->option_title_en }}</td>
                            <td data-label="Action">
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('membership.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('membership.destroy',$item->id) }}" method="POST">
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
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.otherFields').on("input", function() {
                let membership_options      = $('#membership_options').val();
                let additional_questions    = $('#additional_questions').val();
                $.ajax({
                    type    : 'POST',
                    url     : '{!! route('membership.other.fields') !!}',
                    data    : { membership_options: membership_options, additional_questions : additional_questions}
                });
            });
        });
    </script>
@endsection
