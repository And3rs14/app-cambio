@extends('adminlte::page')

@section('title', 'Crear')

@section('content')
<h2 class="text-center mt-4">INGRESAR TIPO DE CAMBIO DE SOLES (S/.)</h2>

    <div  class="p-5 bg-white rounded shadow-lg col-md-6 mx-auto " >
    
    
    <!-- Para visualizar todos los errores -->
    <!-- <div class="mb-3 row">
    <span class="text-danger">
        <strong>{{$errors}} </strong>
    </span>
    </div> -->
    
    <form action="/info_values" method="post" >
        @csrf
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Moneda</label>
            
                <select name="category_id" class="col-sm-10 col-form-select">
                    <option disabled selected> - Seleccione la moneda - </option>
                    <option value="1" @if(old('category_id') == 1) selected @endif >Dolar</option>
                    <option value="2" @if(old('category_id') == 2) selected @endif >Euro</option>
                </select>
            
            @error('category_id')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Precio Compra</label>
            <input type="number" name="buy_moneda" class="col-sm-10 col-form-label" step='0.01' min="0" value="{{old('buy_moneda')}}" placeholder='0.00' tabindex="1">
            @error('buy_moneda')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Precio Venta</label>
            <input type="number" name="sell_moneda" class="col-sm-10 col-form-label" step='0.01' min="0" value="{{old('sell_moneda')}}" placeholder='0.00' tabindex="2">
            @error('sell_moneda')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label"  >Fecha</label>
            <input type="date" class="col-sm-10 col-form-label"  name="date" value="{{old('date')}}">
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




@endsection