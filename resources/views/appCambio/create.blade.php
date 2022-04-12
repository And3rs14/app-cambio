@extends('layouts.app')

@section('content')
    <div align="center">
    <div class="mb-3">
    <h2 >INGRESAR TIPO DE CAMBIO</h2>
    </div>
    <form action="/info_values" method="post">
        @csrf
        <div class="mb-3">
        <label for="" class="form-label">Moneda</label>
        <select name="category_id">
            <option disabled selected> - Seleccione la moneda - </option>
            <option value="1" >Dolar</option>
            <option value="2">Euro</option>
        </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Compra</label>
            <input type="number" name="buy_moneda" step='0.01' min="0" value='0.00' placeholder='0.00' tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Venta</label>
            <input type="number" name="sell_moneda" step='0.01' min="0" value='0.00' placeholder='0.00' tabindex="2">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Fecha</label>
            <input type="date" name="date">
        </div>
    
        <a href="/home" class="btn btn-secondary">Cancelar</a>

        <button href="/info_values" type="submit" class="btn btn-primary">Guardar</button>

    </form>

    </div>



@endsection