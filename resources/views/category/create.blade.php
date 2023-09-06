@extends('admin.layouts.main')
@section('content')
    <div class="card card-hover shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h4 class="m-0 font-weight-bold text-info"> Adding Category</h4>
            <a href="{{ url('category') }}" class="btn btn-info  btn-sm" title="Back to Class List">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <div class="card-body mt-1">
            {{ Form::open(['route' => 'category.store', 'class' => 'user', 'enctype' => 'multipart/form-data']) }}

            {{-- @include('partial.flash')
            @include('partial.error') --}}

            <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <label for="name" class="form-label">Name :</label>
                    {!! Form::text('name', null, [
                        'required',
                        'class' => 'form-control form-control-profile',
                        'id' => 'name',
                        'placeholder' => 'Name',
                    ]) !!}
                </div>
                <div class="col-sm-4">
                    <label for="active" class="form-label">Set Sector:</label>
                    {!! Form::select('active', [1 => 'Active', 2 => 'Deactive'], null, [
                        'required',
                        'class' => 'form-control form-control-profile',
                        'id' => 'active',
                        'max' => '4',
                        'min' => '0',
                        'placeholder' => 'Active Field',
                    ]) !!}
                </div>
               
            </div>

            <div class="form-group mt-3 row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="description" class="form-label">Description:</label>
                    {!! Form::textarea('description', null, [
                        'required',
                        'class' => 'form-control form-control-profile',
                        'id' => 'description',
                        'rows' => '3',
                        'placeholder' => 'Description',
                    ]) !!}
                </div>
                
            </div>

            <div class="form-group">
                {!! Form::submit('Add Category', ['class' => 'my-3 btn btn-info']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
