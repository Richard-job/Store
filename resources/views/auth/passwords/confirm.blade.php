@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center font-weight-bold text-capitalize">@lang('confirm password')</div>

                <div class="card-body">
                    @lang('Please confirm your password before continuing.')

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="text-capitalize col-md-4 col-form-label text-md-right">@lang('password') :</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-md-center">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="text-capitalize btn btn-primary">
                                    @lang('confirm password')
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="text-capitalize btn btn-link" href="{{ route('password.request') }}">
                                        @lang('forgot your password?')
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
