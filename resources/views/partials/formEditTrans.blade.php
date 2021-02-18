<form action="" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <input type="hidden" id="t_id" name="t_id" value="{{$trans['id']}}">
    
    <div class="form-group">
        <label for="tipo">
            <h3>Tipo:</h3>
        </label>
        <select class="form-control" name="tipo" id="tipo">
            @if ($trans['tipo'] == 'Ingreso')
            <option selected>Ingreso</option>
            <option>Egreso</option>
            @else
            <option selected>Egreso</option>
            <option>Ingreso</option>            
            @endif
        </select>
    </div>

    <div class="form-group">
        <label for="cantidad"><h3>Cantidad:</h3></label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{$trans['cantidad']}}" required>
    </div>

    <div class="form-group">
        <label for="dec"><h3>Descripción: </h3></label>
        <textarea name="desc" id="desc" class="form-control" rows="3" required>{{$trans['desc']}}</textarea>
    </div>

    <div class="form-group">
        <label for="tipo">
            <h3>Cuenta:</h3>
        </label>
        <select id="cuenta" class="form-control" name="cuenta" >
            @foreach( $cuentas as $key => $cuenta )
            @if ($trans['cuenta_id'] == $cuenta['id'])
            <option selected value="{{$cuenta['id']}}" >{{$cuenta['nombre']}}</option>
            @else
            <option value="{{$cuenta['id']}}">{{$cuenta['nombre']}}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="fecha">
            <h3>Fecha de transacción</h3>
        </label>
        <input class="form-control" type="date" id="fecha" name="fecha" value="{{$trans['fecha']}}" required>
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
            Editar Transferencia
        </button>
    </div>

</form>