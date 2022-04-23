@extends('adminlte::page')

@section('title', 'Gráfica')

@section('content')

<!-- <?php echo json_encode($info_values); ?> -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script src="https://code.highcharts.com/modules/data.js"></script>


<figure class="highcharts-figure">
  <div id="container">


  </div>
  <div id="master-container">


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
    //type: 'spline',
    style: {
      position: 'absolute'
    },
    zoomType: 'x',
    
    
       
  },
  title:{
      text: 'Tipo de cambio de soles'
  },
  subtitle:{},
  xAxis: {
    type: 'datetime',
    crosshair: true,
  },
  yAxis: {
      title:{
          text: 'Valores'
      },
      maxZoom: 0.1,
      crosshair: true
  },
  legend: {
    layout: 'horizontal',
    
  },
  plotOptions: {
    series: {
            marker: {
                enabled: true,
                lineWidth: 1,
                lineColor: null,
                radius: 2,
                symbol: 'circle' ,
            }
        }
  },
  tooltip: {
   
    headerFormat: '<b> {series.name} </b> <br/>{point.x:%A %B %e %Y}<br/>',
    pointFormat: '<span style="color:{point.color}">\u25CF</span>'+ '<b>1 PEN = {point.y} {series.name}</b><br>',
    crosshairs: true,

  },
  series: [{
      name:'USD Venta',
      data: dolar_venta,
      tooltip: {
        valueSuffix: ' $'
      },
      
  },{
      name:'USD Compra',
      data: dolar_compra,
      tooltip: {
        valueSuffix: ' $'
      }
  },{
      name:'EUR Venta',
      data: euro_venta,
      tooltip: {
        valueSuffix: ' €'
      }
  },{
      name:'EUR Compra',
      data: euro_compra,
      tooltip: {
        valueSuffix: ' €'
      }
  }],
  

});

</script>



@endsection