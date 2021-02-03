<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Bootstrap Navbar with Material Tabs and Search</title>
    <!-- <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}"> -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet' href='https://firebasestorage.googleapis.com/v0/b/personal-1c08e.appspot.com/o/ic_menu.css?alt=media&token=d3e0e883-baca-49e2-8e0d-4c43d1ca59c2'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat'>
    <link rel="stylesheet" href="{{asset('css/styleNavbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/styleMenu.css')}}">


</head>

<body>
    <!-- partial:index.partial.html -->
    <nav id="sidebar">
        <div id="dismiss">
            <i class="glyphicon glyphicon-arrow-left"></i>
        </div>

        <div class="sidebar-header">
            <h3>Bootstrap Sidebar</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Dummy Heading</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li><a href="#">Home 1</a></li>
                    <li><a href="#">Home 2</a></li>
                    <li><a href="#">Home 3</a></li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li><a href="#">Page 1</a></li>
                    <li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
            <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
        </ul>
    </nav>
    <navbar>
        <div class="navbar nav navbar-fixed-top navbar-inverse">
            <div class="container-fluid">
                <div class="v-flex">
                    <div class="navbar-body">
                        <div class="navbar-start">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Open Sidebar</span>
                            </button>
                            <div class="hamburger-menu" id="">
                                <div class="ic_menu">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                            <img class="logo" src="https://firebasestorage.googleapis.com/v0/b/personal-1c08e.appspot.com/o/logo.svg?alt=media&token=7a322d4e-6088-4647-975a-0f36107a5547">
                        </div>
                        <div class="search">
                            <input type="text" class="search-textbox" placeholder="Buscar">
                            <a class="ico-btn search-btn"><i class="material-icons ic_search">&#xE8B6;</i></a>
                            <a class="ico-btn clear-btn"><i class="material-icons ic_clear">&#xE14C;</i></a>
                        </div>
                        <div class="navbar-end">
                            <a style="text-transform: uppercase">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-fixed-top navbar-inverse tabs paper-shadow-bottom-z-2">
            <div class="container-fluid">
                <ul class="navbar-body list-inline">
                    <li class="active"><a class="active">Diario</a></li>
                    <li><a>Semanal</a></li>
                    <li><a>Mensual</a></li>
                    <li><a>Total</a></li>
                </ul>
                <div class="tab-highlighter"></div>
            </div>
        </div>
        <!--2 navbar for pushing 1 above after scrolling (Not Implemented yet.)-->
        <!-- Dark Overlay element -->
    </navbar>
    <div class="overlay"></div>
    <!-- partial -->
    <!-- <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src="{{asset('js/scriptNavbar.js')}}"></script>
    <script src="{{asset('js/scriptMenu.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // $("#sidebar").mCustomScrollbar({
            //     theme: "minimal"
            // });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').fadeOut();
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').fadeIn();
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>


</body>

</html>