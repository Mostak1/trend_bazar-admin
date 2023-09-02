@extends('admin.layouts.main')
@section('content')
    <h1 class="mt-4">Thana Management</h1>

    <hr>
    <div class="d-flex justify-content-end">
        <span>
            <i class="bi bi-plus-square" id="showFormBtn"></i>
        </span>
    </div>
    <div class="form-container">
        <?= csrf_field() ?>
        <input type="text" id="id" value="" hidden>
        <div class="form-group">
            <label class="form-label">District</label>
            <select class="form-select" name="district_id" id="district_id">
                <option value="-1">Select</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">Thana</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        <div class="form-group">
            <label class="form-label">Thana(Bangla)</label>
            <input class="form-control" type="text" name="bn_name" id="bn_name">
        </div>

        <div class="form-group">
            <label class="form-label">Website</label>
            <input class="form-control" type="text" name="url" id="url">
        </div>

        <div class="form-group my-2">
            <input type="button" class="btn btn-outline-primary" value="ADD" id="addBtn">
            <input type="button" class="btn btn-outline-danger" value="Clear" id="clearBtn">
        </div>

        <br>

    </div>
    <table id="myTable" class="display table table-striped table-hover table-sm">
        <thead>
            <tr>
                <th colspan="6" class="tablebtn">
                </th>
            </tr>
            <tr>
                <th>ID</th>
                <th>District</th>
                <th>Thana</th>
                <th>Thana(bangla)</th>
                <th>Website</th>
            </tr>
        </thead>
        <tbody id="maindata">
            @foreach ($tableData as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->d_name }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->bn_name }}</td>
                    <td>{{ $row->url }}</td>
                    <!-- Add more columns if needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable();
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
