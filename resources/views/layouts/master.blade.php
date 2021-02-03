<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Juan Castro & Juan Cardona">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet' href='https://firebasestorage.googleapis.com/v0/b/personal-1c08e.appspot.com/o/ic_menu.css?alt=media&token=d3e0e883-baca-49e2-8e0d-4c43d1ca59c2'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat'>

    <link rel="stylesheet" href="{{asset('css/styleNavbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/styleMenu.css')}}">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">


    @section('description')
    <title>Financiapp</title>
    <meta name="description" content="¡Bienvenido al Financiapp!">
    @show
</head>

<body>
    @include('partials.navbar')
    
    <div class="d-flex justify-content-center">
        <h1> @yield('content') <h1>
    </div>
    <div class="overlay"></div>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Navbar script -->
    <script src="{{asset('js/scriptNavbar.js')}}"></script>
    <!-- Menu script -->
    <script src="{{asset('js/scriptMenu.js')}}"></script>
    @yield('script')
    
</body>

</html>