<<<<<<< HEAD
<?php
 session_start();
if(!isset($_SESSION['usuario'])) {
  echo "<script type='text/javascript'>
  alert ('Autentificación necesaria'); window.location.replace('index.html')</script>";
  exit();
  }else{
    echo "HOlaa".$_SESSION['usuario'];
  } ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("moAF.php");
        include("moDF.php"); 
        include("moAU.php"); 
        include("pruebaClase.php");
   ?>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Irvin Galindo Becerra">
  <title>Bienvenido</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="adminPage.php"><i class="material-icons" style="font-size:30px">local_pizza</i><font size="5"> Via</font><font color="red" size="5"> Napoli</font></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
          <a class="nav-link" id="inicio">
            <i class="fa fa-fw fa-file" ></i>
            <span class="nav-link-text">Inicio</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuarios">
          <a class="nav-link" id ="usuarios">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Usuarios</span>
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
  
    <div id="contenedor">
    <div class="content-wrapper" id ="main" >
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="adminPage.php">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Mesas</li>
      </ol>
      <!-- Icon Cards-->
      <div align="right" class="mr-1" ><a data-toggle='modal' data-target='#agregarfolder' data-padre="/"  href="" style="cursor: pointer;"><font size="6"><i class="fa fa-fw fa-plus-circle"></i></font></a></div><br>
     

          <?php
          include ("config.php");
           $resultados = mysqli_query($conexion,"SELECT nombre,color FROM folders where padre='/' order by nombre");
            if (mysqli_num_rows($resultados)>0) {
              echo " <div class='row'>";
           while ($consulta = mysqli_fetch_array($resultados))
             {
               echo "
                <div class='col-xl-3 col-sm-6 mb-3'>
                  <div class='card text-white bg-".$consulta['color']." o-hidden h-100'>
                      <div>
                        <a href='' data-target='#dfolder' data-toggle='modal' data-id='".$consulta['nombre']."' data-padre='/' style='cursor: pointer'><font color='white'><i class='fa fa-fw fa-trash'></font></i></a>
                      </div>
                    <div class='card-body'>
                        <div class='card-body-icon'>
                          <i class='fa fa-fw fa-folder-open'></i>
                        </div>
                      <div class='mr-5'>".$consulta['nombre']."</div>
                    </div>
                    <a class='card-footer text-white clearfix small z-1' href='sFo.php?p=".$consulta['nombre']."'>
                      <span class='float-left'>Ver contenido</span>
                      <span class='float-right'>
                        <i class='fa fa-angle-right'></i>
                      </span>
                    </a>
                  </div>
                </div>";
      }
      echo "
      </div>";
      }else
        echo "
        <div class='alert alert-info' role='alert'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <p align='center'>
            Sin folders
          </p>
        </div>";
    ?>
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
            <a class="btn btn-primary" href="logout.php">Logout</a>
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
   <script src="js/app.js"></script>
</body>

</html>
=======

<?php
 session_start();
if (empty($_SESSION['id_usuario'])) {
  echo "<script type='text/javascript'>
alert ('Autentificación necesaria'); window.location.replace('index.html')</script>";
  exit();
  } ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("moAF.php");
        include("moDF.php"); 
        include("moAU.php"); 
        include("pruebaClase.php");
   ?>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Irvin Galindo Becerra">
  <title>Bienvenido</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="adminPage.php"><i class="material-icons" style="font-size:30px">local_pizza</i><font size="5"> Via</font><font color="red" size="5"> Napoli</font></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
          <a class="nav-link" id="inicio">
            <i class="fa fa-fw fa-file" ></i>
            <span class="nav-link-text">Inicio</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuarios">
          <a class="nav-link" id ="usuarios">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Usuarios</span>
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
  
    <div id="contenedor">
    <div class="content-wrapper" id ="main" >
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="adminPage.php">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Mesas</li>
      </ol>
      <!-- Icon Cards-->
      <div align="right" class="mr-1" ><a data-toggle='modal' data-target='#agregarfolder' data-padre="/"  href="" style="cursor: pointer;"><font size="6"><i class="fa fa-fw fa-plus-circle"></i></font></a></div><br>
     

          <?php
          include ("config.php");
          $stmt = $pdo->prepare("SELECT id_mesa FROM mesa");
          //ejecutamos el query haciendo que pdo reemplace las variables.
          $stmt->execute();
          $mesas = $stmt -> fetchAll();
     
          //obtenemos los resultado
          if (isset($mesas)) {
            echo " <div class='row'>";
            foreach ($mesas as $mesa) {
              echo "
                <div class='col-xl-3 col-sm-6 mb-3'>
                  <div class='card text-white bg-success o-hidden h-150'>
                      <div>
                        <a href='' data-target='#dfolder' data-toggle='modal' data-id='".$mesa['id_mesa']."' data-padre='/' style='cursor: pointer'><font color='white'><i class='fa fa-fw fa-trash'></font></i></a>
                      </div>
                    <div class='card-body'>
                        <div class='card-body-icon'>
                          <i class='fa fa-fw fa-cutlery'></i>
                        </div>
                      <div class='mr-5'>".$mesa['id_mesa']."</div>
                    </div>
                    <a class='card-footer text-white clearfix small z-1' href='sFo.php?p=".$mesa['id_mesa']."'>
                      <span class='float-left'>Ver contenido</span>
                      <span class='float-right'>
                        <i class='fa fa-angle-right'></i>
                      </span>
                    </a>
                  </div>
                </div>";
      }
      echo "
      </div>";
      }else
        echo "
        <div class='alert alert-info' role='alert'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <p align='center'>
            Sin folders
          </p>
        </div>";
    ?>
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
            <a class="btn btn-primary" href="logout.php">Logout</a>
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
   <script src="js/app.js"></script>
</body>

</html>
>>>>>>> 718cfcc362c0d487aab55a62156a4e6c25a2c596
