<?php
 session_start();
if (empty($_SESSION['idTrabajador'])) {
  echo "<script type='text/javascript'>
alert ('Autentificación necesaria'); window.location.replace('index.html')</script>";
  exit();
  } ?>
<!DOCTYPE html>
<html lang="en">
<?php include("moAU.php");
      include("moDU.php");
      include("moUPU.php");?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Irvin Omar Galindo Becerra">
  <title>Usuario</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="http://flex-coah.com"><i class="fa fa-fw fa-road"></i><font size="5"> Flex</font><font color="red" size="5">Coah</font></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
          <a class="nav-link" href="adminPage.php">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Inicio</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuarios">
          <a class="nav-link" href="sUs.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Usuarios</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="tableAuth.php">
            <i class="fa fa-fw fa-eye"></i>
            <span class="nav-link-text">Entradas</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">
                <?php
                 include 'config.php';
    
                $qry = "SELECT count(*) as numero FROM auth WHERE hora<curtime() and fecha=curdate()";
              $rg=mysqli_query($conexion,$qry);
            if(mysqli_num_rows($rg)>0)
              {        
            $numero=mysqli_fetch_array($rg);
           echo $numero['numero'];
         }
                ?>
              </span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Nuevas alertas:</h6>
            <div class="dropdown-divider"></div>
              <?php
              include("config.php");

              $rg=mysqli_query($conexion,"SELECT concat(t.nombre,' ',t.paterno,' ',t.materno) as nombre,DATE_FORMAT(a.hora,'%H:%i') as hora,idTrabajador from trabajadores t,auth a where t.idTrabajador=a.numTrabajador and a.hora<curtime() and 
                a.fecha=curdate() order by hora desc limit 5");

                if (mysqli_num_rows($rg)>0) {
               while ($consulta=mysqli_fetch_array($rg)) {
                   
              echo "<span class='text-success'>
                <strong>
                  <i class='fa fa-fw fa-user'></i>".$consulta['idTrabajador']."</strong>
              </span>
              <span class='small float-right text-muted'>".$consulta['hora']."&nbsp;&nbsp;</span>
              <div class='dropdown-message small'>&nbsp;&nbsp;&nbsp;".$consulta['nombre']."</div>
              <div class='dropdown-divider'></div>
              ";
            }
              }
              ?>  
            
            <a class="dropdown-item small" href="tableAuth.php"><center>Ver todos</center></a>
          </div>    
        </li> 

        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="adminPage.php">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Entradas</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
         <h5> Entradas del día</h5> 
        </div>
        <div class="card-body">
           <div class="info"></div>
          <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead >
                <tr>
                  <th><center>N° de trabajador</center></th>
                  <th><center>Nombre</center></th>
                  <th><center>Hora</center></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                   <th><center>N° de trabajador</center></th>
                  <th><center>Nombre</center></th>
                  <th><center>Hora</center></th>
                </tr>
              </tfoot>
              <tbody>
              <?php
              include("config.php");
     
        $resultados = mysqli_query($conexion,"SELECT concat(t.nombre,' ',t.paterno,' ',t.materno) as nombre,DATE_FORMAT(a.hora,'%H:%i') as hora,idTrabajador from trabajadores t,auth a where t.idTrabajador=a.numTrabajador and a.hora<curtime() and 
                a.fecha=curdate()");

        while ($consulta = mysqli_fetch_array($resultados))
        {

         echo "<tr>"; 
                  echo "<td><center>"; echo $consulta['idTrabajador'];  
                  echo "</center></td>";
                  echo "<td><center>"; echo $consulta['nombre'];  
                  echo"</center></center></td>";
                  echo "<td><center>"; echo $consulta['hora']; 
                  echo"</center></center></td>";
                echo "</tr>";
           }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card-footer small text-muted">Ultima actualización hace un minuto aprox.</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cerrar Sessión?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccione "Logout" si usted esta listo para cerrar sessión.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
  <script src="js/app.js"></script>
</body>

</html>
