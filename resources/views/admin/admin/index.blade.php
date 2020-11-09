@extends("theme.$theme.layout")

@section('titulo')
    Dashboard   
@endsection

@section("styles")
<link href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>       

@endsection


@section('scripts')
<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
@endsection

@section('contenido')
<div class="content-wrapper" style="min-height: 543px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h5>EMPLEADOS</h5>

                <p>Listar empleados</p>
              </div>
              <div class="icon">
                <i class="fas fa-motorcycle"></i>
              </div>
            <a href="{{route('empleado')}}" class="small-box-footer">Listar empleados <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h5>CLIENTES<sup style="font-size: 20px"></sup></h5>

                <p>Listar clientes</p>
              </div>
              <div class="icon">
                <i class="fas fa-handshake"></i>
              </div>
              <a href="{{route('cliente')}}" class="small-box-footer">Listar clientes <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h5>PRESTAMOS</h5>

                <p>Listar prestamos</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill-alt"></i>
              </div>
              <a href="{{route('prestamo')}}" class="small-box-footer">Listar prestamos<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h5>RUTAS</h5>

                <p>Listar rutas</p>
              </div>
              <div class="icon">
                <i class="fas fa-route"></i>
              </div>
              <a href="{{route('pago')}}" class="small-box-footer">Listar rutas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable ui-sortable">

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu float-right" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour"><ul class="list-unstyled"><li class="show"><div class="datepicker"><div class="datepicker-days" style=""><table class="table table-sm"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">October 2020</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="09/27/2020" class="day old weekend">27</td><td data-action="selectDay" data-day="09/28/2020" class="day old">28</td><td data-action="selectDay" data-day="09/29/2020" class="day old">29</td><td data-action="selectDay" data-day="09/30/2020" class="day old">30</td><td data-action="selectDay" data-day="10/01/2020" class="day">1</td><td data-action="selectDay" data-day="10/02/2020" class="day">2</td><td data-action="selectDay" data-day="10/03/2020" class="day weekend">3</td></tr><tr><td data-action="selectDay" data-day="10/04/2020" class="day weekend">4</td><td data-action="selectDay" data-day="10/05/2020" class="day">5</td><td data-action="selectDay" data-day="10/06/2020" class="day">6</td><td data-action="selectDay" data-day="10/07/2020" class="day">7</td><td data-action="selectDay" data-day="10/08/2020" class="day">8</td><td data-action="selectDay" data-day="10/09/2020" class="day">9</td><td data-action="selectDay" data-day="10/10/2020" class="day weekend">10</td></tr><tr><td data-action="selectDay" data-day="10/11/2020" class="day weekend">11</td><td data-action="selectDay" data-day="10/12/2020" class="day">12</td><td data-action="selectDay" data-day="10/13/2020" class="day">13</td><td data-action="selectDay" data-day="10/14/2020" class="day">14</td><td data-action="selectDay" data-day="10/15/2020" class="day">15</td><td data-action="selectDay" data-day="10/16/2020" class="day">16</td><td data-action="selectDay" data-day="10/17/2020" class="day active today weekend">17</td></tr><tr><td data-action="selectDay" data-day="10/18/2020" class="day weekend">18</td><td data-action="selectDay" data-day="10/19/2020" class="day">19</td><td data-action="selectDay" data-day="10/20/2020" class="day">20</td><td data-action="selectDay" data-day="10/21/2020" class="day">21</td><td data-action="selectDay" data-day="10/22/2020" class="day">22</td><td data-action="selectDay" data-day="10/23/2020" class="day">23</td><td data-action="selectDay" data-day="10/24/2020" class="day weekend">24</td></tr><tr><td data-action="selectDay" data-day="10/25/2020" class="day weekend">25</td><td data-action="selectDay" data-day="10/26/2020" class="day">26</td><td data-action="selectDay" data-day="10/27/2020" class="day">27</td><td data-action="selectDay" data-day="10/28/2020" class="day">28</td><td data-action="selectDay" data-day="10/29/2020" class="day">29</td><td data-action="selectDay" data-day="10/30/2020" class="day">30</td><td data-action="selectDay" data-day="10/31/2020" class="day weekend">31</td></tr><tr><td data-action="selectDay" data-day="11/01/2020" class="day new weekend">1</td><td data-action="selectDay" data-day="11/02/2020" class="day new">2</td><td data-action="selectDay" data-day="11/03/2020" class="day new">3</td><td data-action="selectDay" data-day="11/04/2020" class="day new">4</td><td data-action="selectDay" data-day="11/05/2020" class="day new">5</td><td data-action="selectDay" data-day="11/06/2020" class="day new">6</td><td data-action="selectDay" data-day="11/07/2020" class="day new weekend">7</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2020</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month active">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year active">2020</span><span data-action="selectYear" class="year">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade active" data-selection="2016">2010</span><span data-action="selectDecade" class="decade" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 

@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}" type="text/javascript"></script>

<script>
  $(document).ready(function() {

         fill_datatable();   

          function fill_datatable(periodo1 = '', zona1 = '' )
         {
          var datatable = $('#tablero').DataTable({
              language: idioma_espanol,
              lengthMenu: [ -1],
              processing: true,
              serverSide: true,
              
                  
          ajax:{
                url:"{{ route('tablero')}}",
                data:{periodo1:periodo1, zona1:zona1}
              },
              columns: [
                {
                    data:'Ciclo',
                    name:'Ciclo'
                },
                {
                    data:'Periodo',
                    name:'Periodo'
                },
                {
                  data:'nombreu'
                 
                },
                {
                  data:'Usuario'
                 
                },
                {
                    data:'idDivision',
                    name:'idDivision'
                },
                {
                    data:'Asignados',
                    name:'Asignados'
                },
                {
                    data:'Pendientes',
                    name:'Pendientes'
                },
                {
                    data:'Ejecutadas',
                    name:'Ejecutadas'
                },
                 {
                    data:'Altos',
                    name:'Altos'
                },
                {
                    data:'Bajos',
                    name:'Bajos'
                },
                {
                    data:'Negativo',
                    name:'Negativo'
                },
                {
                    data:'Consumo_cero',
                    name:'Consumo_cero'
                },
                {
                    data:'Normales',
                    name:'Normales'
                },
                {
                    data:'Causados',
                    name:'Causados'
                },
                
                {
                    data:'inicio',
                    name:'inicio'
                },
                {
                    data:'Final',
                    name:'Final'
                }

              ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
  
            
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
  
            
           asignadas = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
            pendientes = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
            ejecutadas = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            altos = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
            bajos = api
                .column( 9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
            negativo = api
                .column( 10, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
            consumo_cero = api
                .column( 11, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
            normales = api
                .column( 12, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
            causados = api
                .column( 13, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );    
            
                      
                     
  
            
            $( api.column( 5 ).footer() ).html(
                asignadas 
            );
            $( api.column( 6 ).footer() ).html(
                pendientes 
            );
            $( api.column( 7 ).footer() ).html(
                ejecutadas 
            );
            $( api.column( 8 ).footer() ).html(
                altos 
            );
            $( api.column( 9 ).footer() ).html(
                bajos 
            );
            $( api.column( 10 ).footer() ).html(
                negativo 
            );
            $( api.column( 11 ).footer() ).html(
                consumo_cero 
            );
            $( api.column( 12 ).footer() ).html(
                normales 
            );
            $( api.column( 13 ).footer() ).html(
                causados 
            );
                
                
                
           
        },
              //Botones----------------------------------------------------------------------
        "dom":'Bfrtip',
               buttons: [
                   {

               extend:'copyHtml5',
               titleAttr: 'Copy',
               className: "btn btn-info"


                  },
                  {

               extend:'excelHtml5',
               titleAttr: 'Excel',
               className: "btn btn-success"


                  },
                   {

               extend:'csvHtml5',
               titleAttr: 'csv',
               className: "btn btn-warning"


                  },
                  {

               extend:'pdfHtml5',
               titleAttr: 'pdf',
               className: "btn btn-primary"


                  }
               ]
             });
}    

    
        
      $('#buscar').click(function(){

       var periodo1 = $('#periodo1').val();
       var zona1 = $('#zona1').val();

        if(periodo1 != '' && zona1 != ''){

            $('#tablero').DataTable().destroy();
            fill_datatable(periodo1, zona1);

        }else{
        
             swal({
            title: 'Debes digitar periodo y zona',
            icon: 'warning',
            buttons:{
                cancel: "Cerrar"
                
                    }
              })
        }
        
    });        

      $('#reset').click(function(){
        $('#zona1').val('');
        $('#periodo1').val('');
        $('#tablero').DataTable().destroy();
        fill_datatable();
      });
});

 

   var idioma_espanol =
                 {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
                } ;
                
           
  
         
  </script>
  


@endsection
