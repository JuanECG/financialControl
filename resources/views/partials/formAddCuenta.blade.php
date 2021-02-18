<form action="" method="POST">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="cantidad"><h3>Nombre:</h3></label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>

    <div class="form-group">
        <label for="tipo">
            <h3>Tipo:</h3>
        </label>
        <select class="form-control" name="tipo" id="tipo">
            <option value="cash">Efectivo</option>
            <option value="card">Tarjeta bancaria</option>
        </select>
    </div>

    <div class="form-group">
        <label for="cantidad"><h3>Saldo:</h3></label>
        <input type="number" class="form-control" id="saldo" name="saldo" required>
    </div>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
            Añadir Cuenta
        </button>
    </div>

</form>