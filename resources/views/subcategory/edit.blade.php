@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">{{ $subCategory->name }}</div>

                    <div class="card-body">

                        <form method="POST" id="update.form" action="{{ route('subcategory.update', $subCategory->id) }}">
                            @csrf
                            @method('patch')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right text-capitalize">@lang('name') :</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $subCategory->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0 justify-content-md-center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary text-capitalize mx-2" data-toggle="modal" data-target="#updateModal">
                                        @lang('edit')
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">@lang('update sub category')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-capitalize font-weight-bold">
                    @lang('are you sure you want to update this sub category.')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary text-capitalize" data-dismiss="modal">@lang('no')</button>
                    <button type="submit" id="update.form" form="update.form" form class="btn btn-danger text-capitalize">@lang('yes')</button>
                </div>
            </div>
        </div>
    </div>
@endsection
