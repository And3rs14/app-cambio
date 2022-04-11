@extends('layouts.app')

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
                <div class="row d-flex justify-content-center">
                    <div class="col-xs-6">
                        <table class="table table-striped table-white mt-5 " style="text-align:center">
                            <thead>
                                <th>ID</th>
                                <th>Moneda</th>
                                <th>Precio compra</th>
                                <th>Precio Venta</th>
                                <th>Fecha</th>
                            </thead>
                            <tbody>
                                @foreach($info_values as $info_value)
                                    <tr>

                                        <td>{{$info_value->id}}</td>
                                        <td>{{$info_value->name}}</td>
                                        <td>{{$info_value->buy_moneda}}</td>
                                        <td>{{$info_value->sell_moneda}}</td>
                                        <td>{{$info_value->date}}</td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end">
                            {!! $info_values->links() !!}
                        </div>
                        
                    </div>
                </div>

            </div>
            
            </div>


@endsection
