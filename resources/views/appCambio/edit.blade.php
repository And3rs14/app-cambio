@extends('adminlte::page')

@section('title', 'Editar')

@section('content')
<div class="container mt-5">
    <div id="row">
    <h2 class="text-center mt-4">EDITAR VALORES DEL TIPO DE CAMBIO</h2>
    <div  class="p-5 bg-white rounded shadow-lg col-md-6 mx-auto">

    <!-- {{$errors}} -->
    <form action="/info_values/{{$info_value->id}}" method="post"> 
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">ID:</label>
            <label for="">{{$info_value->id}}</label>
            <input name="id" type="hidden" value="{{$info_value->id}}">
        </div>
        <div class="mb-3 row" >
        <label class="col-sm-2 col-form-label">Moneda</label>
        <select name="category_id" class="col-sm-10 col-form-select">
            <option disabled selected > - Seleccione la moneda - </option>
            <option value="1" @if($info_value->category_id == 1) selected  @endif>Dolar</option>
            <option value="2" @if($info_value->category_id == 2) selected  @endif>Euro</option>
        </select>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Precio Compra</label>
            <input class="col-sm-10 col-form-label" type="number" value="{{$info_value->buy_moneda}}" name="buy_moneda" step='0.01' min="0" value='0.00' placeholder='0.00' tabindex="1">
            @error('buy_moneda')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Precio Venta</label>
            <input class="col-sm-10 col-form-label" type="number" value="{{$info_value->sell_moneda}}" name="sell_moneda" step='0.01' min="0" value='0.00' placeholder='0.00' tabindex="2">
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Fecha</label>
            <input class="col-sm-10 col-form-label" type="date" value="<?php echo $date->date; ?>" name="date">
            @error('date')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="text-center ">
            <a href="/home" class="btn btn-secondary">Cancelar</a>

            <button href="/info_values" type="submit" class="btn btn-primary">Guardar</button>
        <div>
    </form>

    </div>
    
</div>
</div>


@endsection