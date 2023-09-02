@extends('admin.layouts.main')
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ url('user') }}" class="btn btn-outline-primary">
            <i class="fa-solid fa-angles-left fa-beat-fade"></i> Back</a>
    </div>
    <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <label class="form-label">Role</label>
            <input class="form-control" value="{{ $user->role ?? '' }}" type="text" name="role" id="role">
        </div>
        <div class="form-group my-2">
            <input type="submit" class="btn btn-outline-primary" value="Update" id="addBtn">
        </div>
    </form>
@endsection
