<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom CSS -->
    <link href="{!! asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') !!} " rel="stylesheet">
    <link href="{!! asset('assets/dist/css/style.min.css') !!} " rel="stylesheet">
    <link href="{!! asset('assets/libs/magnific-popup/dist/magnific-popup.css') !!} " rel="stylesheet">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper">

        @include('components.navbar.navbar')
        @include('components.sidebar.aside')

        <div class="page-wrapper bg-white">

            <div class="container-fluid">
                @yield('container')
            </div>
        </div>

    </div>


    <script src="{!! asset('assets/libs/jquery/dist/jquery.min.js') !!}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{!! asset('assets/libs/popper.js/dist/umd/popper.min.js') !!}"></script>
    <script src="{!! asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') !!}"></script>
    <script src="{!! asset('assets/extra-libs/sparkline/sparkline.js') !!}"></script>
    <!--Wave Effects -->
    <script src="{!! asset('assets/dist/js/waves.js') !!}"></script>
    <!--Menu sidebar -->
    <script src="{!! asset('assets/dist/js/sidebarmenu.js') !!}"></script>
    <!--Custom JavaScript -->
    <script src="{!! asset('assets/dist/js/custom.min.js') !!}"></script>
    <script src="{!! asset('assets/extra-libs/DataTables/datatables.min.js') !!}"></script>
    <script src="{!! asset('assets/bootstrap/js/bootstrap.min.js') !!}"></script>

    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
        $('#tabel_tugas').DataTable();
        $('#tabel_pendidikan').DataTable();
        $('#tabel_karya').DataTable();
        $('#tabel_keeluarga').DataTable();
    </script>



</body>

</html>
