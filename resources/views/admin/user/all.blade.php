@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Users Management</h1>

    <hr>
    {{-- <div class="d-flex justify-content-end">
        <span>
            <i class="bi bi-plus-square" id="showFormBtn"></i>
        </span>
    </div> --}}
    {{-- <div class="form-container">
        @csrf
        <input type="hidden" id="id" value="">
        <div class="form-group">
            <label class="form-label">Name</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <input class="form-control" type="email" name="email" id="email">
        </div>
        <div class="form-group">
            <label class="form-label">Mobile</label>
            <input class="form-control" type="text" name="mobile" id="mobile">
        </div>
        <div class="form-group">
            <label class="form-label">Role</label>
            <input class="form-control" type="text" name="role" id="role">
        </div>

        <div class="form-group my-2">
            <input type="button" class="btn btn-outline-primary" value="ADD" id="addBtn">
            <input type="button" class="btn btn-outline-danger" value="Clear" id="clearBtn">
        </div>

        <br>

    </div> --}}
    <table class="table table-striped table-hover table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody id="maindata">
            @foreach ($user as $row)
                <tr class="{{ $row->deleted_at ? 'bg-warning' : '' }}">
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->role }}</td>
                    <td>
                        <a href="{{ url('user/edit', $row->id) }}" class="btn btn-outline-primary">EDIT</a>
                    </td>
                    <td>

                        @if ($row->deleted_at)
                            {{-- restore --}}
                            <form onsubmit="return confirm('Are you sure?')" action="{{ route('user.restore', $row->id) }}"
                                method="post">
                                @csrf
                                <input type="submit" class="btn btn-success" name="delete" value="Restore">
                            </form>
                            {{-- restore END --}}
                        @else
                            <form action="{{ route('user.destroy', $row->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" onsubmit="return confirm('Are You Sure to Delete?')"
                                    class="btn btn-outline-danger" name="delete" value="Delete">
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <img src="" height="200px" alt="">
@endsection

@section('script')
@endsection
