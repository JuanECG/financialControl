<form action="" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <input type="hidden" id="c_id" name="c_id" value="{{$cuenta['id']}}">

    <div class="form-group">
        <label for="cantidad"><h3>Nombre:</h3></label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cuenta['nombre']}}" required>
    </div>

    <div class="form-group">
        <label for="tipo">
            <h3>Tipo:</h3>
        </label>
        <select class="form-control" name="tipo" id="tipo">
            @if ($cuenta['tipo'] == 'cash')
            <option selected value="cash">Efectivo</option>
            <option value="card">Tarjeta bancaria</option>
            @else
            <option value="card" selected>Tarjeta bancaria</option>
            <option value="cash">Efectivo</option>               
            @endif
            <!-- <option value="cash">Efectivo</option>
            <option value="card">Tarjeta bancaria</option> -->
        </select>
    </div>

    <div class="form-group">
        <label for="cantidad"><h3>Saldo:</h3></label>
        <input type="number" class="form-control" id="saldo" name="saldo" value="{{$cuenta['saldo']}}" required>
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
            Editar Cuenta
        </button>
    </div>

</form>