      <?php
          include ("config.php");
          session_start();
          $idUs  =  $_SESSION['id_usuario'];
          $stmt  =  $pdo->prepare("SELECT id_mesa FROM mesa m, usuario u WHERE m.id_usuario = u.id_usuario AND m.id_usuario  =  '$idUs'");
          //ejecutamos el query haciendo que pdo reemplace las variables.
          $stmt -> execute();
          $mesas  =  $stmt -> fetchAll();
                   
          echo "
          <div class = 'container-fluid'>
              <ol class = 'breadcrumb'>
                <li class = 'breadcrumb-item active'>Mesero: ". $_SESSION['nombre'] ."</li>
              </ol> ";
          //obtenemos los resultado
          if (isset($mesas)) {
            echo " <div class = 'row'>";
            foreach ($mesas as $mesa) {
              echo "
                <div class = 'col-xl-4 col-sm-6 mb-3'>
                  <div class = 'card text-white bg-success o-hidden h-150'>
                    <a href = '' data-target = '#dmesa' data-toggle = 'modal' data-id = '".$mesa['id_mesa']."' style = 'cursor: pointer'><font color = 'white'>
                        <div class = 'card-body'>
                          <div class = 'card-body-icon col-xl-5 col-sm-6 mb-3' alt  =  'Imagen'>
                            <i class = 'fa fa-fw fa-cutlery'></i>
                            <br><br><br>
                          </div>
                          <div class = 'mr-5'>".$mesa['id_mesa']."</div>
                        </div>
                      </font>
                    </a>
                    <a class = 'card-footer text-white clearfix small z-1' href = 'sFo.php?p = ".$mesa['id_mesa']."'>
                      <span class = 'float-left'>Ver contenido</span>
                      <span class = 'float-right'>
                        <i class = 'fa fa-angle-right'></i>
                      </span>
                    </a>
                  </div>
                </div>";
      }
      echo "
      </div>";
      }else
        echo "
        <div class = 'alert alert-info' role = 'alert'>
          <button type = 'button' class = 'close' data-dismiss = 'alert'>&times;</button>
          <p align = 'center'>
            Sin folders
          </p>
        </div>";
    ?>
    </div>