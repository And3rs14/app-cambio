@extends('layouts.app')

@section('content')
    <div align="center">
    <div class="mb-3">
    <h2 >EDITAR VALORES DEL TIPO DE CAMBIO</h2>
    </div>
    <form action="/info_values/{{$info_value->id}}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="" class="form-label">ID:</label>
            <label for="">{{$info_value->id}}</label>
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Moneda</label>
        <select name="category_id">
            <option disabled selected > - Seleccione la moneda - </option>
            <option value="1" @if($info_value->category_id == 1) selected  @endif>Dolar</option>
            <option value="2" @if($info_value->category_id == 2) selected  @endif>Euro</option>
        </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Compra</label>
            <input type="number" value="{{$info_value->buy_moneda}}" name="buy_moneda" step='0.01' min="0" value='0.00' placeholder='0.00' tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Venta</label>
            <input type="number" value="{{$info_value->sell_moneda}}" name="sell_moneda" step='0.01' min="0" value='0.00' placeholder='0.00' tabindex="2">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Fecha</label>
            <input type="date" value="<?php echo $date->date; ?>" name="date">
        </div>
    
        <a href="/home" class="btn btn-secondary">Cancelar</a>

        <button href="/info_values" type="submit" class="btn btn-primary">Guardar</button>

    </form>

    </div>



@endsection