<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Amore di Pasta</title>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    @yield('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="static/img/global/favi.ico" type="image/x-icon">
</head>

<body>

<header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light ps-2">
        <div class="container-fluid ">
            <a class="navbar-brand" id="logo" href="#">Amore di Pasta</a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end text-center" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="menu.html">Menu</a>

                </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>
