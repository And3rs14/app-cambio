@extends('adminlte::page')

@section('content')

<!-- <?php echo json_encode($info_values); ?> -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
  <div id="container">


  </div>
  <p class="highcharts-description">
    This chart shows how data labels can be added to the data series. This
    can increase readability and comprehension for small datasets.
  </p>
</figure>

<script type="text/javascript">

    var info_values = <?php echo json_encode($info_values) ?>;

    //new date('2012.08.10').getTime()
    //fecha = new Date(info_values[2][1]['date'].replace("-g","/"));
    var fecha;

    var dolar_venta = [];
    var dolar_compra = [];

    var euro_venta = [];
    var euro_compra = [];
    
    for (let i = 0; i < info_values[1].length; i++) {

        dolar_venta[i] = [];
        dolar_compra[i] = [];
        fecha = new Date(info_values[1][i]['date'].replace("-g","/"));
        
        dolar_venta[i][0] = fecha.getTime();
        dolar_venta[i][1] = info_values[1][i]['sell_moneda'];

        dolar_compra[i][0] = fecha.getTime();
        dolar_compra[i][1] = info_values[1][i]['buy_moneda'];
        
    }

    for (let i = 0; i < info_values[2].length; i++) {

        euro_venta[i] = [];
        euro_compra[i] = [];
        fecha = new Date(info_values[2][i]['date'].replace("-g","/"));

        euro_venta[i][0] = fecha.getTime();
        euro_venta[i][1] = info_values[2][i]['sell_moneda'];

        euro_compra[i][0] = fecha.getTime();
        euro_compra[i][1] = info_values[2][i]['buy_moneda'];

    }


    
    //let fecha = new Date('2022-04-15')
    
    //console.log(info_values[2].length);
    console.log(dolar_venta[1][0]);
    console.log(fecha.getTime());
    console.log(dolar_venta);
    console.log(dolar_compra);
    console.log(info_values[1]);
    
Highcharts.chart('container', {
  chart: {
    marginBottom: 120,
          reflow: false,
          marginLeft: 50,
          marginRight: 20,
          style: {
            position: 'absolute'
          }
  },
  title:{
      text: 'Tipo de cambio de soles'
  },
  subtitle:{},
  xAxis: {
    type: 'datetime'
  },
  yAxis: {
      title:{
          text: 'Valores'
      },
      maxZoom: 0.1
  },
  legend: {
    layout: 'horizontal',
    
  },
  plotOptions: {
      series: {
          allowPointSelect: true
      }
  },
  series: [{
      name:'USD to PEN Venta',
      data: dolar_venta
  },{
      name:'USD to PEN Compra',
      data: dolar_compra
  },{
      name:'EUR to PEN Venta',
      data: euro_venta
  },{
      name:'EUR to PEN Compra',
      data: euro_compra
  }],
  reponsive: {

  },

});

</script>


@endsection