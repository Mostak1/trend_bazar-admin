@extends('admin.layouts.main')
@section('content')
    <div class="card card-hover shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h4 class="m-0 font-weight-bold text-info">List of Classes</h4>
            <div class="">
                <a class="btn btn-sm btn-info" href="{{ url('category/create') }}">
                    <i class="fa-solid fa-plus"></i>
                    Add
                </a>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body mt-4">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th colspan="5" class="tablebtn">
                            </th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Active</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Sector</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->active == 1)
                                        Academic
                                    @elseif ($category->active == 2)
                                        Skill Development
                                    @elseif ($category->active == 3)
                                        Competitive Exam
                                    @endif


                                </td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->price }}Tk</td>
                                <td> <img class="img-fluid" src="{{asset('assets/img/category')}}/{{ $category->image }}" alt="{{ $category->image }}"></td>
                                <td class="skip d-flex justify-content-center">
                                    {!! Form::open(['method' => 'delete', 'route' => ['category.destroy', $category->id], 'id' => 'deleteform']) !!}
                                    <a href="javascript:void(0)" class="btn btn-danger  btn-sm" title="Delete"
                                        onclick="event.preventDefault();if (!confirm('Are you sure?')) return; document.getElementById('deleteform').submit();">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                    {!! Form::close() !!}
                                    &nbsp;
                                    <a href="{{ url('category/' . $category->id . '/edit') }}" class="btn btn-info  btn-sm"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    &nbsp;
                                    <a href="{{ url('category/' . $category->id) }}" class="btn btn-info  btn-sm"
                                        title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
