<nav id="sidebar">
    <div id="dismiss">
        <i class="glyphicon glyphicon-arrow-left"></i>
    </div>
    <!-- #DD1919 -->
    <img src="{{URL::asset('/images/logo.png')}}" alt="logo" height="50">
    <div class="sidebar-header">
        <h3>!Bienvenido {{Auth::user()->name}}!</h3>
    </div>

    <ul class="list-unstyled components">
        <p>Administra tus ingresos...</p>
        <li class="active" id="transfer">
            <a href="{{url('/trans/day')}}">
                <span class="material-icons">
                    account_balance
                </span>
                Transferencias
            </a>
        </li>
        <li id ="stats">
            <a href="{{url('/stats')}}">
                <span class="material-icons">
                    insert_chart_outlined
                </span>
                Estadísticas
            </a>
        </li>
        <li id="me">
            <a href="{{url('/me')}}">
                <span class="material-icons">
                    account_box
                </span>
                Cuenta
            </a>
        </li>
        <li>
            <form action="{{ url('/logout') }}" id="myform" method="POST" style="display:inline">
            {{ csrf_field() }}
                <a href="#" onclick="document.getElementById('myform').submit()">
                    <span class="material-icons">
                        logout
                    </span>
                    Logout
                </a>
            </form>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li><a href="about" class="download">Sobre nosotros</a></li>
        <li><a href="Contacto" class="article">Contáctanos</a></li>
    </ul>
</nav>
<navbar>
    <div class="navbar nav navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
            <div class="v-flex">
                <div class="navbar-body">
                    <div class="navbar-start">
                        <div class="hamburger-menu" id="sidebarCollapse">
                            <div class="ic_menu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <img src="{{URL::asset('/images/logo.png')}}" alt="profile Pic" height="50">
                    </div>
                    <div class="search">
                        <input type="text" class="search-textbox" placeholder="Buscar Registros">
                        <a class="ico-btn search-btn"><i class="material-icons ic_search">&#xE8B6;</i></a>
                        <a class="ico-btn clear-btn"><i class="material-icons ic_clear">&#xE14C;</i></a>
                    </div>

                    <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                        {{ csrf_field() }}

                        <div class="navbar-end">
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                <a>Logout</a>
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-fixed-top navbar-inverse tabs paper-shadow-bottom-z-2" >
        <div class="container-fluid" id="opt">
            <ul class="navbar-body list-inline">
                <li id="dL" ><a id="dA"  href="{{url('/trans/day')}}">Diario</a></li>
                <li id="mL" ><a id="mA"  href="{{url('/trans/month')}}">Mensual</a></li>
                <li id="yL"><a id="yA"  href="{{url('/trans/year')}}">Anual</a></li>
                <li id="tL"><a id="tA" href="{{url('/trans/total')}}">Total</a></li>
            </ul>
            <div class="tab-highlighter"></div>
        </div>
    </div>
</navbar>