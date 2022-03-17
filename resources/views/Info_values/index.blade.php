@extends('layouts.plantillabase');

@section('contenido')
    <a href="Info_values/create" class="btn btn-primary">CREAR</a>

    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">FECHA</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">VALOR DE VENTA</th>
                <th scope="col">VALOR DE COMPRA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Info_values as $Info_value)
                <tr>
                    <td>{{$Info_value->id}}</td>
                    <td>{{$Info_value->date}}</td>
                    <td>{{$Info_value->name}}</td>
                    <td>{{$Info_value->sell_moneda}}</td>
                    <td>{{$Info_value->buy_moneda}}</td>
                    <td>
                        <a href="btn btn-info">Editar</a>
                        <button href="btn btn-danger">Borrar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection 