 <div class="content-wrapper" id="mainUs">
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
           
           <div align="right" class="mr-1"><a data-toggle = "modal" data-target = "#agregaruser">
           <i class="fa fa-fw fa-user-plus" style="cursor: pointer" ></i></a></div>
         
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
     
         //preparamos nuestra declaracion
         $stmt  =  $pdo->prepare("SELECT id_usuario, nombre, pwd, tipo, fecha_inicio FROM usuario");
         //ejecutamos el query haciendo que pdo reemplace las variables.
         $stmt -> execute();
         //obtenemos los resultado
        $resultado  =  $stmt -> fetchAll();       

        
        foreach($resultado as $usuario)
        {

         echo "<tr>
                  <td><center>".$usuario['id_usuario']."  
                  </center></td>
                  <td><center>".$usuario['nombre']."  
                  </center></td>
                  <td><center>".$usuario['tipo']."
                  </center></td>
                  <td><center>".$usuario['pwd']."  
                  </center></td>
                  <td><center>".$usuario['fecha_inicio']."  
                  </center></td>
                  <td><center> <button type='button' class='btn btn-success' data-toggle='modal' data-target='#upduser' data-id='".$usuario['idTrabajador']."' data-nombre='".$usuario['nombre']."' data-paterno='".$usuario['paterno']."'data-materno='".$usuario['materno']."' data-cargo='".$usuario['cargo']."' data-contras='".$usuario['pass']."'> <i class='fa fa-refresh'></i></button></center></td>
                <td><center><button type='button' class='btn btn-danger' data-toggle='modal' data-id='".$usuario['idTrabajador']."' data-target='#dataDelete'> <i class='fa fa-long-arrow-up fa-trash'></i></button></center></td>
                </tr>";
           }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card-footer small text-muted">Ultima actualización hace un minuto aprox.</div>
      </div>
    </div>