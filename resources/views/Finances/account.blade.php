@extends('layouts.master')

@section('description')
<title>Cuenta</title>
<meta name="description" content="Administración de cuenta">
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/account.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <h1>Mis cuentas</h1>
    <hr>
    <br>
    <div class="row">
        @foreach( $cuentas as $key => $cuenta )
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-{{$cuenta['tipo']}} order-card">
                <div class="card-block">
                    <h6 class="m-b-20">{{$cuenta['tipo']}}</h6>
                    <h2 class="text-right">
                        @if ($cuenta['tipo'] === 'cash')
                        <i class="fa fa-money f-left"></i>
                        @else
                        <i class="fa fa-cart-plus f-left"></i>
                        @endif
                        <span>{{$cuenta['nombre']}}</span>
                    </h2>
                    <h2 class="m-b-0">${{$cuenta['saldo']}}<span class="f-right">{{$cuenta['fecha_ingreso']}}</span></h2>
                </div>
            </div>
        </div>

        @endforeach
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    Agregar cuenta <i class="fa fa-plus"></i>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $("#transfer, #stats").removeClass("active");
        $("#me").addClass("active");
        document.getElementById("opt").style.display = 'none';        

    });
</script>
@stop