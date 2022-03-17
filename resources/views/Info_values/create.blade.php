@extends('layouts.plantillabase');

@section('contenido')

    <h2>CREAR REGISTROS</h2>
    <form action="/Info_values" method="POST">

    <!-- <div class="mb-3">
        <label for="" class="form-label">ID</label>
        <input id="id" name="id" type="text" class="form-control" tabindex="1">
    </div> -->

    <div class="mb-3">
        <label for="" class="form-label">Fecha</label>
        <input id="id" name="id" type="datetime" class="form-control" tabindex="2">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Código</label>
        
        <input id="id" name="id" type="text" class="form-control" tabindex="3">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">CATEGORIA</label>
        <input id="id" name="id" type="text" class="form-control" tabindex="4">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">VALOR DE VENTA</label>
        <input id="id" name="id" type="text" class="form-control" tabindex="5">
    </div>

    <a href="/info_values" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-secondary" tabindex="4">Guardar</button>


    </form>
@endsection 