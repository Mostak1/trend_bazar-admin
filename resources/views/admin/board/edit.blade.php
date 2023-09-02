@extends('admin.layouts.main')
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('board.index') }}" class="btn btn-outline-primary">
            <i class="fa-solid fa-angles-left fa-beat-fade"></i> Back</a>
    </div>
    <form action="{{ route('board.update', $board->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        @include('admin.board.form')
        <div class="form-group my-2">
            <input type="submit" class="btn btn-outline-primary" value="Update" id="addBtn">
        </div>
    </form>
@endsection
