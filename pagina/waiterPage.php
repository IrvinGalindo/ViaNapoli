<?php
 session_start();
if (empty($_SESSION['id_usuario'])) {
  echo "<script type = 'text/javascript'>
alert ('Autentificación necesaria'); window.location.replace('index.html')</script>";
  exit();
  } 
  include('moDTa.php');?>
<!DOCTYPE html>
<html lang = "en">

  <head>

    <meta charset = "utf-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1, shrink-to-fit = no">
    <meta name = "description" content = "">
    <meta name = "author" content = "">

    <title>Bienvenido</title>

    <!-- Bootstrap core CSS -->
    <link href = "vendor/bootstrap/css/bootstrap.min.css" rel = "stylesheet">

    <!-- Custom fonts for this template -->
    <link href = "vendor/font-awesome/css/font-awesome.min.css" rel = "stylesheet" type = "text/css">
    <link href = "https://fonts.googleapis.com/css?family = Montserrat:400,700" rel = "stylesheet" type = "text/css">
    <link href = "https://fonts.googleapis.com/css?family = Lato:400,700,400italic,700italic" rel = "stylesheet" type = "text/css">

    <!-- Plugin CSS -->
    <link href = "vendor/magnific-popup/magnific-popup.css" rel = "stylesheet" type = "text/css">

    <!-- Custom styles for this template -->
    <link href = "css/freelancer.min.css" rel = "stylesheet">
    <link href = "css/sb-admin.css" rel = "stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  </head>

  <body id = "page-top" >

    <!-- Navigation -->
     <nav class = "navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id = "mainNav">
     <a class="navbar-brand" href="waiterPage.php"><i class="material-icons" style="font-size:30px">local_pizza</i><font size="5"> Via</font><font color="red" size="5">Napoli</font></a>
    <button class = "navbar-toggler navbar-toggler-right" type = "button" data-toggle = "collapse" data-target = "#navbarResponsive" aria-controls = "navbarResponsive" aria-expanded = "false" aria-label = "Toggle navigation">
      <span class = "navbar-toggler-icon"></span>
    </button>
        <div class = "collapse navbar-collapse" id = "navbarResponsive">
          <ul class = "navbar-nav ml-auto">
            <li class = "nav-item mx-0 mx-lg-1">
              <a class = "nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-toggle = "modal" data-target = "#exampleModal" style = "cursor: pointer">
            <i class = "fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<br><br><br><br>
    <div  id  = "contenedorWa"></div>
     <!-- Logout Modal-->
    <div class = "modal fade" id = "exampleModal" tabindex = "-1" role = "dialog" aria-labelledby = "exampleModalLabel" aria-hidden = "true">
      <div class = "modal-dialog" role = "document">
        <div class = "modal-content">
          <div class = "modal-header">
            <h5 class = "modal-title" id = "exampleModalLabel">Cerrar Sessión?</h5>
            <button class = "close" type = "button" data-dismiss = "modal" aria-label = "Close">
              <span aria-hidden = "true">×</span>
            </button>
          </div>
          <div class = "modal-body">Seleccione "Logout" si usted esta listo para cerrar sessión.</div>
          <div class = "modal-footer">
            <button class = "btn btn-secondary" type = "button" data-dismiss = "modal">Cancel</button>
            <a class = "btn btn-primary" href = "logout.php">Logout</a>
          </div>
        </div>
      </div>
    <script src = "vendor/jquery/jquery.min.js"></script>
    <script src = "vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src = "vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src = "vendor/chart.js/Chart.min.js"></script>
    <script src = "vendor/datatables/jquery.dataTables.js"></script>
    <script src = "vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src = "js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src = "js/sb-admin-datatables.min.js"></script>
    <script src = "js/sb-admin-charts.min.js"></script>
    

    <!-- Bootstrap core JavaScript -->

    <script src = "vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src = "js/jqBootstrapValidation.js"></script>
    <script src = "js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src = "js/freelancer.min.js"></script>
    <script src="js/app.js"></script>

  </body>

</html>
