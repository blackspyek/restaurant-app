<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Amore di Pasta</title>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


    @livewireStyles
    @yield('home-css')
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css"
        rel="stylesheet"
    />
    <link rel="shortcut icon" href="static/img/global/favi.ico" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('build/assets/img/global/favi.png') }}" type="image/x-icon">
</head>

<body>

<header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light ps-2 nav-main">
        <div class="container-fluid ">
            <a class="navbar-brand" id="logo" href="{{route('homePage')}}">Amore di Pasta</a>
            <button
                data-mdb-collapse-init
                class="navbar-toggler"
                type="button"
                data-mdb-target="#navbarToggleExternalContent"
                aria-controls="navbarToggleExternalContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>


        </div>
        <div class="collapse nav-content" id="navbarToggleExternalContent">
            <div class="d-flex nav-style-layout">
                @yield("nav")
            </div>
        </div>
    </nav>

</header>

<main>
    @yield('content')
</main>

<footer class="text-center">
    <p id="f_txt">@AmorediPasta</p>
</footer>

<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@livewireScripts
@yield('jss')
</body>

</html>
