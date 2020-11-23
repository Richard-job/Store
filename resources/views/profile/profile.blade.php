@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold text-capitalize">@lang('Profile')</div>

                    <div class="card-body">
                        <form method="POST" id="update.form" action="{{ route('profile.update') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="first_name" class="text-capitalize col-md-4 col-form-label text-md-right">@lang('first name') :</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="text-capitalize col-md-4 col-form-label text-md-right">@lang('last name') :</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="text-capitalize col-md-4 col-form-label text-md-right">@lang('e-mail address') :</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="text-capitalize col-md-4 col-form-label text-md-right">@lang('phone number') :</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone" autofocus>

                                    @error('phone')
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

                <div class="card mt-4">
                    <div class="card-header text-center font-weight-bold text-capitalize">@lang('password')</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="old_password" class="text-capitalize col-md-4 col-form-label text-md-right">@lang('old password') :</label>

                                <div class="col-md-6">
                                    <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="old_password">

                                    @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="text-capitalize col-md-4 col-form-label text-md-right">@lang('password') :</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="text-capitalize col-md-4 col-form-label text-md-right">@lang('confirm password') :</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0 justify-content-md-center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary text-capitalize mx-2" data-toggle="modal" data-target="#updatePasswordModal">
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
                    <h5 class="modal-title text-capitalize">@lang('update data')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-capitalize font-weight-bold">
                    @lang('are you sure you want to update your data.')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary text-capitalize" data-dismiss="modal">@lang('no')</button>
                    <button type="submit" id="update.form" form="update.form" form class="btn btn-danger text-capitalize">@lang('yes')</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update password Modal -->
    <div class="modal fade" id="updatePasswordModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize">@lang('update password')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-capitalize font-weight-bold">
                    @lang('are you sure you want to update your password.')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary text-capitalize" data-dismiss="modal">@lang('no')</button>
                    <button type="submit" id="update.form" form="update.form" form class="btn btn-danger text-capitalize">@lang('yes')</button>
                </div>
            </div>
        </div>
    </div>
@endsection

