@extends('layouts.master')

@section('description')
<title>Transferencias</title>
<meta name="description" content="Resumen de Transferencias">
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/transfer.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
@endsection


@section('content')
<div class="container">
    <h1>Mis transferencias</h1>
    <hr>
    <br>
</div>
<div class="container trans">
    @foreach( $transacciones as $key => $trans )
    <div class="col-md-12 col-xl-5">
        <div class="card bg-c-{{$trans['tipo']}}">
            <div class="card-block">
                <h5 class="m-b-20"><strong>cuenta: </strong>{{$trans['nombre']}}</h5>
                <div class="content">
                    <p style="font-size: 20px; color:black"><strong>Descripción: </strong> {{$trans['desc']}}</p>
                    @if ($trans['tipo'] === 'Ingreso')
                    <i class="fa fa-reply f-right"> {{$trans['tipo']}}</i>
                    @else
                    <i class="fa fa-share f-right"> {{$trans['tipo']}}</i>
                    @endif
                </div>

                <h2 class="m-b-0">${{$trans['cantidad']}}<span class="f-right">{{$trans['fecha']}}</span></h2>
            </div>
        </div>
    </div>
    @endforeach
 

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Añadir Transferencia</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('partials.formAddTrans')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('script')

<script type="text/javascript">
    $(document).ready(function() {
        $("#stats, #me").removeClass("active");
        $("#transfer").addClass("active");
        
        var filter = "{{$type}}";
        // 0 = day, 1= month, 2=year, 3= total
        console.log(filter);
        //removing active class
        // $("#dL, #dA, #mL, #mA, #yL, #yA, #tL, #tA").removeClass("active");

        // adding active class
        if (filter==='0'){ 
            $("#dL").addClass("active");              
            $('.tab-highlighter').css({
            'left':  $("#dA").closest('li').offset().left,
            'width':  $("#dA").closest('li').outerWidth()
            });               
        }
        else if(filter==='1'){
            $("#mL, #mA").addClass("active");       
            $('.tab-highlighter').css({
            'left':  $("#mA").closest('li').offset().left,
            'width':  $("#yA").closest('li').outerWidth()
            });    
        }
        else if(filter==='2'){
            $("#yL, #yA").addClass("active");   
            $('.tab-highlighter').css({
            'left':  $("#yA").closest('li').offset().left,
            'width':  $("#tA").closest('li').outerWidth()
            });   
        }
        else if(filter==='3'){
            $("#tL, #tA").addClass("active");      
            $('.tab-highlighter').css({
            'left':  $("#tA").closest('li').offset().left,
            'width':  $("#tL").closest('li').outerWidth()
            });      
        }
        
    });
</script>

@stop