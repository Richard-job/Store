@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-capitalize font-weight-bold">@lang('sub categories')</div>

                    <div class="card-body">
                        @if($subCategories->count() === 0)
                            <div class="text-center text-capitalize">
                                there are not records to show
                            </div>
                        @else

                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <th class="px-3 text-capitalize">@lang('name')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subCategories as $s)
                                        <tr>
                                            <td class="px-3">{{ $s->name }}</td>
                                            <td class="px-3"><a class="btn btn-primary  text-capitalize" href="{{ route('subcategory.show', $s->id) }}">@lang('see details')</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $subCategories->links() }}
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
