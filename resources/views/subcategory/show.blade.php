@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">{{ $subCategory->name }}</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-6 text-capitalize text-sm-right font-weight-bold">@lang('name') :</div>
                            <div class="col-sm-6">{{ $subCategory->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 text-capitalize text-sm-right font-weight-bold">@lang('category') :</div>
                            <div class="col-sm-6">{{ $subCategory->category->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 text-capitalize text-sm-right font-weight-bold">@lang('created at') :</div>
                            <div class="col-sm-6">{{ $subCategory->created_at }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 text-capitalize text-sm-right font-weight-bold">@lang('updated at') :</div>
                            <div class="col-sm-6">{{ $subCategory->updated_at }}</div>
                        </div>

                        <div class="d-flex mt-3 justify-content-center">
                            <a class="btn btn-primary text-capitalize mx-2" href="{{ route('subcategory.edit', $subCategory->id) }}">@lang('edit')</a>
                            <button type="button" class="btn btn-danger text-capitalize mx-2" data-toggle="modal" data-target="#deleteModal">@lang('delete')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">@lang('delete sub category')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-capitalize font-weight-bold">
                    @lang('are you sure you want to delete this sub category.')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary text-capitalize" data-dismiss="modal">@lang('no')</button>
                    <button type="submit" form="destroy.form" form class="btn btn-danger text-capitalize">@lang('yes')</button>

                    <form id="destroy.form" action="{{ route('subcategory.destroy', $subCategory->id) }}" method="post">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
