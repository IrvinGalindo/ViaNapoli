 <div class="content-wrapper" id="main2"">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="adminPage.php">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Usuarios</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
         <h5> Team Via Napoli</h5> 
           <a align="right" class="nav-link"  data-toggle="modal" data-target="#agregaruser">
            <i class="fa fa-fw fa-user-plus" style="cursor: pointer" ></i></a>
         
        </div>
        <div class="card-body">
           <div class="info"></div>
          <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead >
                <tr>
                  <th>Número</th>
                  <th>Nombre(s)</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Cargo</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                   <th>Número</th>
                  <th>Nombre(s)</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Cargo</th>
                  <th></th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
              <?php
              include("config.php");
     
        $resultados = mysqli_query($conexion,"SELECT idTrabajador,nombre,paterno,materno,cargo,pass FROM trabajadores where cargo!='OPERADOR' && cargo!='INTERCAMBISTA'");

        while ($consulta = mysqli_fetch_array($resultados))
        {

         echo "<tr>"; 
                  echo "<td><center>"; echo $consulta['idTrabajador'];  
                  echo "</center></td>";
                  echo "<td><center>"; echo $consulta['nombre'];  
                  echo"</center></center></td>";
                  echo "<td><center>"; echo $consulta['paterno']; 
                  echo"</center></center></td>";
                  echo "<td><center>"; echo $consulta['materno'];  
                  echo"</center></center></td>";
                  echo "<td><center>"; echo $consulta['cargo'];  
                  echo"</center></center></td>";
                  echo "<td><center> <button type='button' class='btn btn-success' data-toggle='modal' data-target='#upduser' data-id='".$consulta['idTrabajador']."' data-nombre='".$consulta['nombre']."' data-paterno='".$consulta['paterno']."'data-materno='".$consulta['materno']."' data-cargo='".$consulta['cargo']."' data-contras='".$consulta['pass']."'> <i class='fa fa-refresh'></i></button></center></td>";
                echo " <td><center><button type='button' class='btn btn-danger' data-toggle='modal' data-id='".$consulta['idTrabajador']."' data-target='#dataDelete'> <i class='fa fa-long-arrow-up fa-trash'></i></button></center></td>";
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