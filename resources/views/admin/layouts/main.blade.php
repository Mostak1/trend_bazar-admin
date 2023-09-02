<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>TestBD Admin</title>
    <link rel="icon" href="{{asset('assets/img/icon.png')}}" type="image/png">
    {{-- CSRF --}}
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>" id="token">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <!-- DataTable CSS -->
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.5/b-2.4.0/b-html5-2.4.0/b-print-2.4.0/r-2.5.0/datatables.min.css"
        rel="stylesheet" />
    <!-- DataTable CSS -->
    {{-- lightBox  --}}
    <link rel="stylesheet" href="{{ asset('node_modules/lightbox2/dist/css/lightbox.min.css') }}">
    <script src="{{ asset('node_modules/lightbox2/dist/js/lightbox.min.js') }}"></script>
    {{-- lightBox  --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- wao js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- animate c --}}
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  
    <link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}">
    @vite(['resources/scss/home.scss'])
    @yield('css')
</head>

<body>
    <div id="preloader"></div>
    <div id="layoutSidenav">
        @include('admin.layouts.side_nav')
        <div id="layoutSidenav_content">
            @include('admin.layouts.top_nav')
            <main>
                <div class="container-fluid mt-5 px-4">
                    @include('layouts.flash')
                    <!-- dynamic content start -->
                    @yield('content')
                    <!-- dynamic content end -->
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Test BD 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- DataTable JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.5/b-2.4.0/b-html5-2.4.0/b-print-2.4.0/r-2.5.0/datatables.min.js">
    </script>
    <!-- DataTable JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="X-CSRF-TOKEN"]').attr('content')
            }
        });
        var loader = document.getElementById('preloader');
        window.addeventListener('load', function() {
            loader.style.display = 'none';
        })
        new WOW().init();
    </script>

    <script>
        // category , subcategory, topic auto complete code 
        $(document).ready(function() {

            // show the alert
            setTimeout(function() {
                $(".alert").alert('close');
            }, 2000);
            // =========
            // for subcats as cats
            function selectscat(ob) {
                $("#subcategory_id").empty().append('<option value = "0">All');

                let html = "<option value='0'>All</option>";
                for (const key in ob) {
                    if (Object.hasOwnProperty.call(ob, key)) {
                        html += "<option value='" + key + "'>" + ob[key] + "</option>";
                    }
                }
                $("#subcategory_id").html(html);
            }
            $("#category_id").change(function() {
                // console.log( $(this).val() )
                let URL = "{{ url('subcats') }}";
                $.ajax({
                    type: "post",
                    url: URL + '/' + $(this).val(),
                    data: "data",
                    dataType: "json",
                    success: function(response) {
                        selectscat(response);
                    }
                });
            });

            // for topics as subcats
            function selecttopic(ot) {
                // $("#topic_id").html("");
                let html = "<option value='0'>All</option>";
                for (const k in ot) {
                    if (Object.hasOwnProperty.call(ot, k)) {

                        html += "<option value='" + k + "'>" + ot[k] + "</option>";
                    }
                }
                $("#topic_id").html(html);
            }
            $("#subcategory_id").on('change', function() {

                // })
                // $("#subcategory_id").change(function() {
                if ($(this).val() == "null") {
                    $("#topic_id").empty().append('<option value = "0">All');
                    return;
                }
                // console.log( $(this).val() )
                let URL = "{{ url('topics') }}";
                $.ajax({
                    type: "post",
                    url: URL + '/' + $(this).val(),
                    data: "data",
                    dataType: "json",
                    success: function(response) {
                        selecttopic(response);
                    }
                });
            });

        });

        // datatable for all tables common coad
        $(document).ready(function() {

            var table = $('#dataTable').DataTable();

            new $.fn.dataTable.Buttons(table, {
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ]
            });
            table.buttons().container().appendTo($('.tablebtn', table.table().container()));
            $('.tablebtn .dt-buttons').removeClass('flex-wrap');
            $('.tablebtn .btn').removeClass('btn-secondary').addClass('btn-outline-primary');

        });
        // district,thana,institute autocomplete common scripts
        $(document).ready(function() {

            // show the alert
            setTimeout(function() {
                $(".alert").alert('close');
            }, 2000);
            // =========
            // for district 
            function districtSellect(ob) {
                $("#district_id").empty().append('<option value = "0">All');

                let html = "<option value='0'>All</option>";
                for (const key in ob) {
                    if (Object.hasOwnProperty.call(ob, key)) {
                        html += "<option value='" + key + "'>" + ob[key] + "</option>";
                    }
                }
                $("#district_id").html(html);
            }
            $("#board_id").change(function() {
                // console.log( $(this).val() )
                let URL = "{{ url('dist') }}";
                $.ajax({
                    type: "post",
                    url: URL + '/' + $(this).val(),
                    data: "data",
                    dataType: "json",
                    success: function(response) {
                        districtSellect(response);
                    }
                });
            });

            // for thana
            function selectThana(ot) {

                let html = "<option value='0'>All</option>";
                for (const k in ot) {
                    if (Object.hasOwnProperty.call(ot, k)) {

                        html += "<option value='" + k + "'>" + ot[k] + "</option>";
                    }
                }
                $("#thana_id").html(html);
            }
            $("#district_id").on('change', function() {

                // })
                // $("#subcategory_id").change(function() {
                if ($(this).val() == "null") {
                    $("#thana_id").empty().append('<option value = "0">All');
                    return;
                }
                // console.log( $(this).val() )
                let URL = "{{ url('thana') }}";
                $.ajax({
                    type: "post",
                    url: URL + '/' + $(this).val(),
                    data: "data",
                    dataType: "json",
                    success: function(response) {
                        selectThana(response);
                    }
                });
            });
            // for institute
            function selectIns(ot) {

                let html = "<option value='0'>All</option>";
                for (const k in ot) {
                    if (Object.hasOwnProperty.call(ot, k)) {

                        html += "<option value='" + k + "'>" + ot[k] + "</option>";
                    }
                }
                $("#institute_id").html(html);
            }
            $("#thana_id").on('change', function() {

                // })
                // $("#subcategory_id").change(function() {
                if ($(this).val() == "null") {
                    $("#institute_id").empty().append('<option value = "0">All');
                    return;
                }
                // console.log( $(this).val() )
                let URL = "{{ url('ins') }}";
                $.ajax({
                    type: "post",
                    url: URL + '/' + $(this).val(),
                    data: "data",
                    dataType: "json",
                    success: function(response) {
                        selectIns(response);
                    }
                });
            });

        });
        // lightbox common script

        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    </script>
    <!-- dynamic content start-->
    @yield('script')
    <!--dynamic content end -->
</body>

</html>
