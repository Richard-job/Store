@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-capitalize font-weight-bold">@lang('admin users')</div>

                    <div class="card-body">
                        @isset($users)

                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <th class="px-3 text-capitalize">@lang('first name')</th>
                                        <th class="px-3 text-capitalize">@lang('last name')</th>
                                        <th class="px-3 text-capitalize">@lang('e-mail address')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u)
                                        <tr>
                                            <td class="px-3">{{ $u->first_name }}</td>
                                            <td class="px-3">{{ $u->last_name }}</td>
                                            <td class="px-3">{{ $u->email }}</td>
                                            <td class="px-3"><a class="btn btn-primary  text-capitalize" href="{{ route('user.show', $u->id) }}">@lang('see details')</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $users->links() }}
                            </div>
                        @else
                            <div class="text-center text-capitalize">
                                there are not records to show
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
