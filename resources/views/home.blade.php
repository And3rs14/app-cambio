@extends('adminlte::page')

@section('title', 'Home')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    
@endsection


@section('content_header')
<h1 class="bg-primary text-white text-center">VALORES DEL TIPO DE CAMBIO (SOLES S/.)</h1>
@stop


@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card"> -->
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

                
            <!-- </div> -->
            <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                </div>
        </div>
    </div>
</div>


<div class="mt-8 bg-white dark:bg-white-800 overflow-hidden shadow sm:rounded-lg">

            <div class="container" >

            <div class="card-header">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="info_values/create" class="btn" style="Color:white ; background:#9c27b0;">CREAR</a>
                <a class="btn btn-warning" href="{{url('/info_values/chart')}}" style="Color:white ; background: #ff9800">Gráfica</a>
                <a onclick="ExportarDatos(event.target)" data-href="/ExportarDatos" id="export" class="btn btn-info">Exportar a CSV<a>
                <a href="{{ route('/exportarExcel')}}" class="btn btn-success">Exportar Excel</a>
                </div>
            
            </div>
            
            

                <div class="car-body">
                    <div class="col-xs-6">
                        <table id="info_values" class="table table-striped" >
                            <thead class="bg-primary text-white">
                                <th>ID</th>
                                <th>Moneda</th>
                                <th>Precio compra</th>
                                <th>Precio Venta</th>
                                <th>Fecha</th>
                                <th>Usuario</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($info_values as $info_value)
                                    <tr>

                                        <td>{{$info_value->id}}</td>
                                        <td>{{$info_value->category}}</td>
                                        <td>{{$info_value->buy_moneda}}</td>
                                        <td>{{$info_value->sell_moneda}}</td>
                                        <td>{{$info_value->date}}</td>
                                        <td>{{$info_value->user}}</td>
                                        <td>
                                            <form action="{{ route ('info_values.destroy', $info_value->id)}}" method="POST">
                                            <a href="info_values/{{$info_value->id}}/edit" class="btn btn-info">Editar</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        @section('js')
                            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
                            <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

                            <script>
                                $(document).ready(function() {
                                    $('#info_values').DataTable({
                                        "lengthMenu": [[5,10,50,-1],[5,10,50,"All"]]
                                    });
                                } );
                                
                            </script>
                        @endsection

                        
                    </div>
                </div>

            </div>
            
            </div>

    <script>
        function ExportarDatos(_this){
            let _url = $(_this).data('href');
            window.location.href = _url;
        }
    </script>

@endsection
