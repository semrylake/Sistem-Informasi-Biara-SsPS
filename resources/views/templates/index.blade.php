<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">

    <link href="{{ asset('assets/agency/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <title>Home</title>
    <link href="{{ asset('assets/agency/css/agency.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/agency/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


</head>

<body id="page-top" class="bg-light">

    @include('components.navbar.navbarIndex')

    @yield('container')

    <!-- Footer -->
    <footer class="footer bg-secondary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <span class="copyright text-white">Copyright &copy; {{ date('Y') }}</span>
                </div>
            </div>
        </div>
    </footer>




    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/agency/js/agency.min.js') }}"></script>
    <script>
        var mycarousel =  document.querySelector('#carouselExampleDark')
        var carousel =  new bootstrap.Carousel(mycarousel, {
            interval: 3000,
            wrap: false
        })
    </script>

</body>

</html>
