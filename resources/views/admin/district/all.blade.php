@extends('admin.layouts.main')
@section('content')
    <h1 class="mt-4">District Management</h1>

    <hr>
    <div class="d-flex justify-content-end">
        <span>

        </span>
    </div>
    <div class="">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            <i class="bi bi-plus-square" id="showFormBtn">Add</i>
        </button>

    </div>

    <table id="myTable" class="table table-striped table-hover table-sm">
        <thead>
            <tr>
                <th colspan="5" class="tablebtn">
                </th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Board</th>
                <th>District</th>
                <th>District(Bangla)</th>
                <th>Latitude</th>
                <th>longitude</th>
                <th>Website</th>
                <th colspan="2">Operations</th>

            </tr>
        </thead>
        <tbody id="maindata">
            @foreach ($dis as $row)
                <tr class="{{ $row->deleted_at ? 'bg-warning' : '' }}">
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->board->name }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->bn_name }}</td>
                    <td>{{ $row->lat }}</td>
                    <td>{{ $row->lon }}</td>
                    <td>
                        {{-- <a href="{{ $row->url }}" target="_blank">{{ $row->url }}</a> --}}
                        <a class="nav-link text-danger"
                            href="{{ Str::startsWith($row->url, ['http://', 'https://']) ? $row->url : 'http://' . $row->url }}"
                            target="_blank">{{ $row->url }}</a>

                    </td>

                    <td>
                        <a href="{{ route('board.edit', $row->id) }}" class="btn btn-outline-primary">EDIT</a>
                    </td>
                    <td>
                        @if ($row->deleted_at)
                            {{-- restore --}}
                            <form onsubmit="return confirm('Are you sure?')"
                                action="{{ route('district.restore', $row->id) }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-success" name="delete" value="Restore">
                            </form>
                            {{-- restore END --}}
                        @else
                            <form action="{{ route('district.destroy', $row->id) }}" method="post">
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
        {{-- {{ $board->links() }} --}}
    </table>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            var table = $('#myTable').DataTable({
                // Specify the number of columns and their order here
                columns: [
                    null, // ID column (first column in the table)
                    null, // Board column
                    null, // District column
                    null, // District (Bangla) column
                    null, // Latitude column
                    null, // Longitude column
                    null, // Website column
                    {
                        orderable: false
                    }, // Operations column (disable sorting for the operations column)
                    {
                        orderable: false
                    }, // Operations column (disable sorting for the operations column)
                ],
                // Optional: Customize other DataTables options as needed
            });




            new $.fn.dataTable.Buttons(table, {
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ]
            });
            table.buttons().container().appendTo($('.tablebtn', table.table().container()));
            $('.tablebtn .dt-buttons').removeClass('flex-wrap');
            $('.tablebtn .btn').removeClass('btn-secondary').addClass('btn-outline-primary');

        });
    </script>
@endsection

{{-- <!-- Modal add --> --}}
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Board</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('district.store') }}" method="post">
                    @csrf
                    @include('admin.district.form')
                    <div class="form-group my-2">
                        <input type="submit" class="btn btn-outline-primary" value="ADD" id="addBtn">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
