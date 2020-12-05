            <!-- Start right Content here -->
            <!-- ============================================================== -->

                <link href='lib/main.css' rel='stylesheet' />
            <script src='lib/main.js'></script>
                <script src='lib/locales-all.js'></script>
            <script>


document.addEventListener('DOMContentLoaded', function() {
    var localeSelectorEl = document.getElementById('locale-selector');
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'today',
        center: 'title',
        right: 'dayGridMonth,timeGridDay,listMonth'
      },
      locale: 'es',
      buttonIcons: false, // show the prev/next text
      weekNumbers: true,
        businessHours: true, // display business hours      
        dayMaxEvents: true, // allow "more" link when too many events
      navLinks: true, // can click day/week names to navigate views
      dayMaxEvents: true, // allow "more" link when too many events
      events:  {
        url: '?controller=clase&method=times',
        failure: function() {
          document.getElementById('script-warning').style.display = 'inline'; // show
        }
      },
    });

            calendar.render();

           
            $(".fc-toolbar-title").addClass("h6");
    $(".fc-toolbar-title").removeClass("fc-toolbar-title")
        });

            </script>

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">
                                        <span class="badge badge-success badge-pill float-right"></span>
                                        <span></span>
                                        Bienvenido:
                                        <?php echo' '.$_SESSION['nombre'].' '.$_SESSION['apellido'] ?>
                                    </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                                        <li class="breadcrumb-item"><a href="?controller=home">Inicio</a></li>

                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->
            <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="text-center mb-2">
                                    <?php echo $_SESSION['rol']=='Instructor'? '<h4 class=" d-inline-block text-center">Mis clases</h4>' : '<h5 class=" d-inline-block text-center mr-5">Calendario de clases</h4>' ?> 
                                    <button class=" ml-5 btn btn-secondary ml-1 text-white" data-toggle="modal"
                                        data-target="#registerHour"></i><i class="fa fa-hourglass-half"></i>
                                        Nuevo horario</button>
                                        </div>
                                    <div id="calendar"></div>   
                                </div> <!-- end col -->
                                <?php if($_SESSION['rol'] !== 'Cliente'): ?>
                                <div class="col-md-5">
                                    <h5>Comentarios de clientes</h5>
                                    
                                                <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Cliente</th>
                                                                    <th>Comentario</th>                                                            </th>
                                                                </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php  $count= 1; foreach ($customers as $c): ?> 
                                                                <tr>
                                                                    <td><?php echo $count++; ?></td>
                                                                    <td><?php echo $c->nombre ?></td>
                                                                    <td><?php echo $c->descripcion ?></td>

                                                                </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                </table>
                                </div>
                                                            <?php endif; ?>
                            </div> <!-- end row -->

            </div>
                
            

  



                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->
                <footer class="footer">
                    © 2019 - 2020 Axel Gym <span class="d-none d-sm-inline-block"> - Todos los derechos reservados.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

<script src="plugins/parsleyjs/parsley.min.js"></script>
<script src="assets/js/es.js"></script> 
<script>

   
</script>
            </div>
            <!-- END wrapper -->