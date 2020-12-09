@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-capitalize font-weight-bold">@lang('categories')</div>

                    <div class="card-body">
                        @if($categories->count() === 0)
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
                                    @foreach ($categories as $c)
                                        <tr>
                                            <td class="px-3">{{ $c->name }}</td>
                                            <td class="px-3"><a class="btn btn-primary text-capitalize" href="{{ route('category.show', $c->id) }}">@lang('see details')</a></td>
                                            <td class="px-3"><a class="btn btn-primary text-capitalize" href="{{ route('category.subcategory.index', $c->id) }}">@lang('see sub categories')</a></td>
                                            <td class="px-3"><a class="btn btn-primary text-capitalize" href="{{ route('category.subcategory.create', $c->id) }}">@lang('new sub category')</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $categories->links() }}
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
