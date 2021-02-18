<form action="" method="POST">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="tipo">
            <h3>Tipo:</h3>
        </label>
        <select class="form-control" name="tipo" id="tipo">
            <option>Ingreso</option>
            <option>Egreso</option>
        </select>
    </div>

    <div class="form-group">
        <label for="cantidad"><h3>Cantidad:</h3></label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
    </div>

    <div class="form-group">
        <label for="dec"><h3>Descripción: </h3></label>
        <textarea name="desc" id="desc" class="form-control" rows="3" required></textarea>
    </div>

    <div class="form-group">
        <label for="tipo">
            <h3>Cuenta:</h3>
        </label>
        <select id="cuenta" class="form-control" name="cuenta" required>
            @foreach( $cuentas as $key => $cuenta )
            <option value="{{$cuenta['id']}}">{{$cuenta['nombre']}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="fecha">
            <h3>Fecha de transacción</h3>
        </label>
        <input class="form-control" type="date" id="fecha" name="fecha" required>
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
            Añadir Transferencia
        </button>
    </div>

</form>