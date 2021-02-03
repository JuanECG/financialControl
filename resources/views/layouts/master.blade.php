<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}"> -->
    <meta name="author" content="Juan Castro & Juan Cardona">

    @section('description')
    <title>FinanciApp</title>
    <!-- <meta name="description" content="¡Bienvenido al Videoclub!"> -->
    @show
</head>

<body>
    @include('partials.navbar')
    <div class="d-flex justify-content-center">
        <h1> @yield('content') <h1>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

</body>

</html>