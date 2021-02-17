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
        <div class="col-md-5 col-xl-3">
            <div class="card bg-c-{{$cuenta['tipo']}} order-card">
                <div class="card-block">
                    <div class="content">
                        <h6 class="m-b-20">{{$cuenta['tipo']}}</h6>
                        <div class="content" style="width: 100px;">
                            <form method="POST" action="">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" id="c_id" name="c_id" value="{{$cuenta['id']}}">
                                <button class="btn del">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>

                            <button class="btn edit" data-toggle="modal" data-target="#form{{$cuenta['id']}}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                            @include('partials.modalEditCuenta')
                        </div>
                    </div>
                    <h2 class="text-right">
                        @if ($cuenta['tipo'] === 'cash')
                        <i class="fa fa-money f-left"></i>
                        @else
                        <i class="fa fa-credit-card f-left"></i>
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
                <div class="card-block" data-toggle="modal" data-target="#formC">
                    Agregar cuenta <i class="fa fa-plus"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="formC" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Añadir Transferencia</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('partials.formAddCuenta')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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