@extends('admin.layouts.main')
@section('content')
    <div class="card card-hover shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h4 class="m-0 font-weight-bold text-info">Update Class</h4>
            <a href="{{ url('category') }}" class="btn btn-info  btn-sm" title="Back to Class">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($category, [
                'method' => 'put',
                'enctype' => 'multipart/form-data',
                'class' => 'user',
                'route' => ['category.update', $category->id],
            ]) !!}
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
                    {!! Form::select('active', [1 => 'Academic', 2 => ' Skill Development', 3 => 'Competitive Exam'], null, [
                        'required',
                        'class' => 'form-control form-control-profile',
                        'id' => 'active',
                        'max' => '4',
                        'min' => '0',
                        'placeholder' => 'Active Field',
                    ]) !!}
                </div>
                <div class="col-sm-4">
                    <label for="image" class="form-label">Input Image:</label>
                        {!! Form::file('image', ['class' => 'form-control', 'id' => 'image', 'title' => 'Category Picture']) !!}
                    
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
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="price" class="form-label">Price:</label>
                    {!! Form::number('price', null, [
                        'required',
                        'class' => 'form-control form-control-profile',
                        'id' => 'price',
                    
                        'placeholder' => 'Price',
                    ]) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::submit('Update Class', ['class' => 'mt-3 btn btn-info btn-profile btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
